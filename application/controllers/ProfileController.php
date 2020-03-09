<?php
    include('../../system/classes/Validator.php');

    class ProfileController extends Framework{

        use Validator;

        public $profileModel;

        public function __construct(){
            if(!$this->getSession('userId')){
                 $this->redirect('AccountController/loginForm');
            }
            $this -> helper("link");
            $this -> profileModel = $this->model('ProfileModel');
        }

        public function index(){
            $userId = $this->getSession('userId');
            $data = $this->profileModel->getData();
            $this->view('profile', $data);
        }

        public function logout(){
            $this -> destroy();
            $this -> redirect('AccountController/loginForm');
        }

        public function edit_user($id) {
            $user = $this->profileModel->edit_data($id);

            $userData = [
                'fullName' => $user->fullName,
                'email' => $user->email,
                'id' => $user->id,
            ];

            $this->view('edit_user', $userData);
        }

        public function updateUser(){
            $userData = [
                'fullName' => $this->input('fullName'),
                'email' => $this->input('email'),
                'hiddenId' => $this->input('hiddenId'),
            ];

            $rules = [
                'email' => [
                    'email',
                    'required',
                ],
                'fullName' => [
                    'alpha',
                    'minLen:4',
                    'maxLen:20',
                    'required',
                ],
            ];

            $errorMessages = Validator::validateAll($rules,  [
                'fullName' => $this->input('fullName'),
                'email' => $this->input('email'),
            ]);

            $userData['errorMessages'] = $errorMessages;

            if(empty($userData['errorMessages'])) {
                $updateData = [
                    $userData['fullName'],
                    $userData['email'],
                    $userData['hiddenId']
                ];

                if($this->profileModel->updateUser($updateData)) {
                    $this->setFlash('userUpdated','User has been updated successfully.');
                    $this->redirect('ProfileController/index');
                }
            } else{
                $this -> view('edit_user', $userData);
            }

        }

        // Delete User
        public function delete($id){
            $this->profileModel->deleteUser($id);
            $this->setFlash('deleted','User has been deleted successfully.');
            $this->redirect('ProfileController/index');
        }





    }




?>
