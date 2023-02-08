<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Model extends CI_Model 
    {
        public function find()
        {
            return array('nom'=>'Hariaja','Prenom'=>'Andrianandrasana');
        }

        public function listeProduit()
        {   
            // $_SESSION['hariaja'] = "bonjour";
            $sql = "select * from marque";
            $query = $this->db->query($sql);
            $result = array();

            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
        public function checkLogin($mail,$pass)
        {
            $valiny = false;
            if($mail == 'ny@gmail.com' && $pass == '123')
            {
                $valiny = true;
            }
            return $valiny;
        }
    }
?>