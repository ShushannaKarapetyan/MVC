<?php

    class ProfileModel extends Database{
        public function getData(){
            if($this->query("SELECT * FROM users")){
                $data = $this->fetchAll();
                return $data;
            }
        }

        public function edit_data($id){
            if($this->query('SELECT * FROM users WHERE id = ?',[$id])){
                $row = $this->fetch();
                return $row;
            }
        }

        public function updateUser($updateData){
            if($this->query('UPDATE users SET fullName = ?, email = ? WHERE id = ?', $updateData)){
                return true;
            }
            return false;
        }

        public function deleteUser($id){
            if($this->query('DELETE FROM users WHERE id = ?',[$id])){
                return true;
            }
        }

    }

?>
