<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class User extends CI_Model 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Generalite');
        }
// get user
        function is_admin($admin)
        {
            if ($admin==1)
            {
                return true;
            }
            return false;
        }
        public function get_liste()
        {   
            $sql = "select * from user";
            $query = $this->db->query($sql);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
        public function with_id($id)
        {   
            $sql = "select * from user where ID=%s";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row;
        } 
        public function photo_of_id($id)
        {   
            $sql = "select PHOTO from user where ID=%s";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row['photo'];
        } 
        public function with_name($name)
        {   
            $sql = "select * from user where name like %s ";
            $sql=sprintf($sql,$this->db->escape(    $this-> Generalite->format($name)   ));
            $query = $this->db->query($sql);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
        public function with_mail($mail)
        {   
            $sql = "select * from user where mail = %s ";
            $sql=sprintf($sql,$this->db->escape(  $mail ));
           // echo $sql;
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row;
        }
        public function with_mail_password($mail,$password)
        {   
            $sql = "select * from user where mail = %s and password = %s ";
            $sql=sprintf($sql,$this->db->escape(  $mail ),$this->db->escape(  $password ));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row;
        }
// check login
        public function log_correct($mail,$password)
        {
           $errors = $this->Generalite->if_log_empty($mail,$password);
           $response = array();
           if(count($errors) > 0) {
                $response = array(
                    "success" => false,
                    "error" => implode("<br>", $errors),
                    "mail"=>$mail,
                    "password"=>$password
                );
            } else {
                $note=$this->check_login($mail,$password);
                if($note)
                {
                   $response = array(
                    "success" => true
                    );  
                }
                elseif(!$note)
                {
                    $response = array(
                        "success" => false,
                        "error" => "Count not found, try again",
                        "mail"=>$mail,
                        "password"=>$password
                    );
                }
               
            }
            return $response;
        }
        public function check_login($name_mail,$password)
        {
          if(count($this->with_mail_password($name_mail,$password))!=0) return true;
            return false;
        }
// transaction
        public function transact($insert,$id,$mail,$name,$password,$password_again)
        {
           $errors = $this->Generalite->if_empty($mail,$name,$password,$password_again);
           $response = array();
           if(count($errors) > 0) {
                $response = array(
                    "success" => false,
                    "error" => implode("<br>", $errors),
                    "id"=>$id,
                    "mail"=>$mail,
                    "name"=>$name,
                    "password"=>$password,
                    "password_again"=>$password_again
                );
            } else {
                if($insert==true) $this->insert_new($mail,$name,$password);
                elseif($insert==false) $this->update($id,$mail,$name,$password);
                $response = array(
                    "success" => true
                );
            }
            return $response;
        }
        public function insert_new($mail,$name,$password)
        {   
            $sql = "insert into user values (null,%s,%s,%s)";
            $sql=sprintf($sql,$this->db->escape($mail),$this->db->escape($name),$this->db->escape($password));
            $query = $this->db->query($sql);
        }    
        public function update($id,$mail,$name,$password)
        {   
            $sql = "update user set name=%s, password=%s where id=%s and mail=%s)";
            $sql=sprintf($sql,$this->db->escape($name),$this->db->escape($password),$this->db->escape($id),$this->db->escape($mail));
            $query = $this->db->query($sql);
        }
        public function delete_with($id)
        {   
            $sql = "delete from user where id= %s)";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
        }
    }
?>