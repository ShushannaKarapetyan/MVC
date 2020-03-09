<?php
    //include('../../system/classes/Validator.php');

	class AccountController extends Framework{

        use Validator;

	    public $accountModel;

	    public function __construct(){
	        if($this->getSession('userId')){
	            $this->redirect('AccountController/index');
            }

            $this -> helper('link');
            $this -> accountModel = $this -> model('AccountModel');
        }

        public function index(){
            $this -> view("signup");
		}

        public function createAccount(){
            $userData = [
                'fullName' => $this->input('fullName'),
                'email' => $this -> input('email'),
                'password' => $this -> input('password'),
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
                    'required'
                ],
                'password' => [
                    'password',
                    'minLen:6',
                    'maxLen:20',
                    'required'
                ]
            ];

            $errorMessages = Validator::validateAll($rules,  [
                'fullName' => $this->input('fullName'),
                'email' => $this->input('email'),
                'password' => $this->input('password'),
            ]);

            if(!$this -> accountModel -> checkEmail($userData['email'])){
                $errorMessages['email'] = "Sorry, this email is already exist";
            }

            $userData['errorMessages'] = $errorMessages;

            if(empty($userData['errorMessages'])){
                $password = password_hash($userData['password'], PASSWORD_BCRYPT);
                $data = [$userData['fullName'], $userData['email'], $password];
                if($this -> accountModel -> createAccount($data)){
                    $this -> setFlash('accountCreated', 'Your account has been created successfully !');
                    $this -> redirect("AccountController/loginForm");
                }
            } else {
                $this -> view('signup', $userData);
            }
        }

        public function loginForm(){
	        $this -> view('login');
        }

        public function userLogin(){
	        $userData = [
	            'email' => $this -> input('email'),
                'password' => $this -> input('password'),
            ];
            $rules = [
                'email' => [
                    'email',
                    'required',
                ],
                'password' => [
                    'password',
                    'minLen:6',
                    'maxLen:20',
                    'required'
                ]
            ];

            $errorMessages = Validator::validateAll($rules,  [
                'email' => $this->input('email'),
                'password' => $this->input('password'),
            ]);

            $userData['errorMessages'] = $errorMessages;

            if(empty($userData['errorMessages'])){
                $result = $this -> accountModel -> userLogin($userData['email'], $userData['password']);
                if($result['status'] === 'emailNotFound'){
                    $userData['emailError'] = 'Sorry, invalid email';
                    $this -> view('login', $userData);

                } else if($result['status'] === 'passwordNotMatched'){
                    $userData['passwordError'] = 'Sorry, invalid password';
                    $this -> view('login', $userData);

                } else if($result['status'] === 'ok'){
                    $this -> setSession("userId", $result['data']);
                    $this -> redirect('ProfileController/index');
                }
            } else {
                $this -> view('login', $userData);
            }


        }

	}



?>
