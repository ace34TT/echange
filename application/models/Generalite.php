<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Generalite extends CI_Model 
    {
        public function format($text)
        {
            return '%'.$text.'%';
        }
        public function is_empty_tab($tab)
        {
            if(count($tab)==0) return true;
            return false;
        }
        public function if_log_empty($mail,$password)
        {
            $errors = array();
            if(empty($mail)) {
                $errors[] = "Name requiered";
            }
            if(empty($password)) {
                $errors[] = "Password requiered";
            } 
            elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
            // if(empty($tel)) {
            //     $errors[] = "Telephone is required";
            // } elseif(!preg_match("/^[0-9]{10}$/", $tel)) {
            //     $errors[] = "Invalid telephone format";
            // }
            return $errors;
        }
        public function if_empty($mail,$name,$password,$password_again)
        {
            $errors = array();
            if(empty($mail)) {
                $errors[] = "Mail requiered";
            }
            if(empty($name)) {
                $errors[] = "Name requiered";
            }
            if(empty($password)) {
                $errors[] = "Password requiered";
            } 
            if(empty($password_again) || $password!=$password_again) {
                $errors[] = "Enter your password again";
            } 
            elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
            return $errors;
        }
    }
?>