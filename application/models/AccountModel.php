<?php
    class AccountModel extends Database
    {
        public function checkEmail($email){
            if ($this->query("SELECT email FROM users WHERE email = ?", [$email])) {
                if ($this->countRow() > 0) {
                    return false;
                } else {
                    return true;
                }
            }
        }

        public function createAccount($data){
            if ($this->query("INSERT INTO users(fullName, email, password) VALUES(?, ?, ?)", $data)) {
                return true;
            }
        }

        public function userLogin($email, $password){
            if ($this->query("SELECT * FROM users WHERE email = ?", [$email])) {
                if ($this->countRow() > 0) {
                    $row = $this->fetch();
                    $dbPassword = $row -> password;
                    $userId = $row -> id;
                    if(password_verify($password, $dbPassword)){
                        return ['status' => 'ok', 'data' => $userId];
                    }else{
                        return ['status' => 'passwordNotMatched'];
                    }
                }
            } else {
                return ['status' => 'emailNotFound'];
            }
        }


    }



?>