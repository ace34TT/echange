<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("DB_Controller.php");

class Objet_c extends DB_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
	{
	}  
    public function echanger($id_objet)
    {   
        $condition = $this->get_condition($id,$own);
        $sql = "select * from v_objet_details %s ";
        $sql=sprintf($sql,$condition);
        $query = $this->db->query($sql);
        $result = array();
        foreach($query->result_array() as $row)
        {
            $result[] = $row;
        }
        return $result;
    }  
}