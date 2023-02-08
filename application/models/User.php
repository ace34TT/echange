<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class User extends CI_Model 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Generalite');
        }
// get users
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
            $sql = "select * from users";
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
            $sql = "select * from users where ID=%s";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row;
        } 
        public function photo_of_id($id)
        {   
            $sql = "select photo from users u join photo_users pu on pu.id_user=u.id  where u.ID=%s";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row['photo'];
        } 
        public function with_name($name)
        {   
            $sql = "select * from users where name like %s ";
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
            $sql = "select * from users where mail = %s ";
            $sql=sprintf($sql,$this->db->escape(  $mail ));
           // echo $sql;
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row;
        }
        public function with_mail_password($mail,$password)
        {   
            $sql = "select * from users where mail = %s and password = %s ";
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
        public function transact($insert,$id,$mail,$name,$password,$password_again,$date_naissance)
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
                if($insert==true) $this->insert_new($mail,$name,$password,$date_naissance); 
                elseif($insert==false) $this->update($id,$mail,$name,$password);
                $response = array(
                    "success" => true
                );
            }
            return $response;
        }
        public function insert_new($mail,$name,$password,$date_naissance)
        {   
            $sql = "insert into users values (null,%s,%s,%s,%s)";
            $sql=sprintf($sql,$this->db->escape($mail),$this->db->escape($name),$this->db->escape($password),$this->db->escape($date_naissance));
            $query = $this->db->query($sql);
        } 
        public function insert_new_photo($avatar)
        {   
            $sql = "insert into photo_users values ((select max(id) from users),%s)";
            $sql=sprintf($sql,$this->db->escape($avatar));
            $query = $this->db->query($sql);
        }    
        public function update($id,$mail,$name,$password)
        {   
            $sql = "update users set name=%s, password=%s where id=%s and mail=%s)";
            $sql=sprintf($sql,$this->db->escape($name),$this->db->escape($password),$this->db->escape($id),$this->db->escape($mail));
            $query = $this->db->query($sql);
        }
        public function delete_with($id)
        {   
            $sql = "delete from users where id= %s)";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
        }
        function format_img_name()
	{
		$sql="select year(now()) as y,month(now()) as m,day(now()) as d,hour(now()) as h,minute(now()) as min,second(now()) as s";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$ans = "IMG-%s";
		$ans=sprintf( $ans,$this->db->escape(  implode("-", $row  )) );
		return $ans;
	} //echo dateImg();
	function check_upload($files,$folder)
	{
		$errors = array();
		$response = array();
		$extension = strrchr($files['name'], '.');
		$extensions = array('.png', '.gif', '.jpg', '.jpeg','.jfif'); 
		if(!in_array($extension, $extensions))
		{    
		   $errors[] = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou jfif'; 
		} 
		$taille_maxi = 5000000; 
		$taille = filesize($files['tmp_name']);
		if($taille>$taille_maxi) 
		{   
		  $errors[] = 'Le fichier est trop gros';
		} 
		$fichier = basename($files['name']); 
		if(count($errors)==0) 
		{       
			$fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 
			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);    
			// $fichier = preg_replace(' ', '-', $fichier);    
			// $fichier = '%s.%s'; 
			// $fichier = sprintf( $fichier,$this->db->escape( $this->format_img_name()),$this->db->escape($extension) ); 
			if(move_uploaded_file($files['tmp_name'], $folder.$fichier)) //Si     
			{ 
				$response = array(
					"success" => true
				);   
			}    
			else 
			{ 
				$response = array(
					"success" => false,
					"error" => "Upload failed",
					"files"=> basename($files['name'])
				);  
			}
		} 
		else {  
			$response = array(
				"success" => false,
				"error" =>implode("<br>", $errors),
				"files"=> basename($files['name'])
			);  
		}
		return $response;
	}
    }
?>