<?php
	class Controller extends Framework {

        public function __construct(){
            $this -> helper('link');
            $this -> model = $this -> model('Model');
        }

		public function index(){
            $this -> view("index");
		}

		public function insertUser(){
			$password = password_hash('123456', PASSWORD_BCRYPT);

			$data = [
                'fullName' => 'My Name',
                'email' => 'new_user@gmail.com',
                'password' => $password,
            ];

            $table_name = 'users';

            if($this -> model -> insertData($table_name,$data)){
                echo "User has been created successfully !";
            }

        }

	}


?>
