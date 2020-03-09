<?php

    class Model extends Database{
        public function insertData($table_name, $data){
	        if(empty($table_name)){
		        return false;
	        }
	        if(empty($data)){
		        return false;
	        }

	        $column_array = [];
	        $value_array = [];

	        foreach ($data as $index => $value){
		        $column_array[] = $index;
		        $value_array[] = $value;
	        }

	        $str = implode(',', $column_array);

	        if($this -> query("INSERT INTO $table_name($str) VALUES(?, ?, ?)", $value_array)){
		        echo "User has been created successfully !";
	        }
        }







    }



?>