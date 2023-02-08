<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Client extends CI_Model 
    {
        public function getListe()
        {   
            $sql = "select * from customer_list limit 9";
            $query = $this->db->query($sql);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
        public function withId($id)
        {   
            $sql = "select * from customer_list where ID=%s";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row;
        }
    }
?>