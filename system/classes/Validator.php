<?php

trait Validator
{
    public static function email($inputEmail) {
        $inputEmail = trim(htmlspecialchars($inputEmail));
        $inputEmail = filter_var($inputEmail, FILTER_VALIDATE_EMAIL);
        if ($inputEmail == true) {
            return false;
        }
        return "Invalid Email";
    }

    public static function required($value) {
        if(!empty($value)) {
            return false;
        }
        return "This field is required";
    }

    public static function minLen($value,$count) {
        if(strlen($value)  < $count){
            return "This field should have min $count symbols";
        }
    }

    public static function maxLen($value,$count) {
        if(strlen($value)  > $count){
            return "This field should have max $count symbols";
        }
    }

    public static function alpha($nameLetter){
        if(ctype_alpha($nameLetter) == false){
            return 'This field should have only letters';
        }
    }

    public static function password($value){
        if(preg_match("/^[a-zA-Z0-9]+$/", $value) == false){
           return "This field should have only letters and digits";
        }
    }


    public static function validateAll($validationRules, $data){
        $messages = [];
        foreach ($validationRules as $field=>$rules) {
            foreach ($rules as $rule) {
                if (strpos($rule, ':') == true) {
                    $array = explode(":", $rule);
                    $rule = $array[0];
                    $param = $array[1];
                    $message = self::$rule($data[$field], $param);
                } else {
                    $message = self::$rule($data[$field]);
                }
                if(!empty($message)) {
                    $messages[$field] = $message;
                }
            }
        }

        return $messages;
    }

    public static function getErrorMessage($messages, $field) {
        if(array_key_exists($field, $messages)) {
            return "<div class='error'>$messages[$field]</div>";
        }
        return NULL;
    }



}


?>
