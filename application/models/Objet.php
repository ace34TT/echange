<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Objet extends CI_Model 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Generalite');
        }
        public function get_liste_categorie()
        {   
            $sql = "select * from categorie ";
            $query = $this->db->query($sql);
            $result = array();
            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
        public function get_condition($id,$own)
        {
           // $condition = 'where id_objet not in (select id_objet1 from echange where id_objet1 not null and id_objet2 not null ) and id_objet not in ( select id_objet2 from echange where id_objet1 not null and id_objet2 not null)';
           $condition = '';
            if($id!=null && $own!=null) 
            {
                if($own=='false') $condition = ' where id_owner != %s ';
               elseif($own=='true') $condition = ' where id_owner = %s ';
                $condition=sprintf($condition,$this->db->escape($id));
            }
            return $condition;
        }
        // select * from v_objet_details  where id_owner != 1;
        public function get_liste($id,$own)
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
       
        public function with_id($id)
        {   
            $sql = "select * from v_objet_details where ID_objet=%s";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row;
        }
        public function transact($insert,$id_objet,$id_owner,$titre,$descriptionn,$id_categorie,$prix,$photo)
        {
           $errors = $this->Generalite->if_empty($id_owner,$titre,$id_categorie,$photo);
           $response = array();
           if(count($errors) > 0) {
                $response = array(
                    "success" => false,
                    "error" => implode("<br>", $errors),
                    "id"=>$id,
                    "nom"=>$nom,
                    "prix"=>$prix,
                    "marque"=>$marque,
                    "dispo"=>$dispo
                );
            } else {
                if($insert==true) $this->insert_new($id_owner,$titre,$descriptionn,$id_categorie,$prix,$photo);
                elseif($insert==false) $this->update($id_objet,$id_owner,$titre,$descriptionn,$id_categorie,$prix,$photo);
                $response = array(
                    "success" => true
                );
            }
            return $response;
        }
        function insert_new($id_owner,$titre,$descriptionn,$id_categorie,$prix,$photo)
        {
            $sql1="insert into objet values (null,%s,%s,%s,%s,%s)";
            $sql1=sprintf($sql1,$this->db->escape($id_owner),$this->db->escape($titre),$this->db->escape($descriptionn),$this->db->escape($id_categorie),$this->db->escape($prix));
            $query1 = $this->db->query($sql1);

            $sql2="insert into photo_objet values ((select max(id_objet) from objet),%s)";
            $sql2=sprintf($sql2,$this->db->escape($photo));
            $query2 = $this->db->query($sql2);
        }
        function update($id_objet,$id_owner,$titre,$descriptionn,$id_categorie,$prix,$photo)
        {
            $sql1="update objet set id_owner=%s,titre=%s,descriptionn=%s,id_categorie=%s,prix=%s where id_objet=%s";
            $sql1=sprintf($sql1,$this->db->escape($id_owner),$this->db->escape($titre),$this->db->escape($descriptionn),$this->db->escape($id_categorie),$this->db->escape($prix),$this->db->escape($id_objet));
            $query = $this->db->query($sql1);

            $sql2="update photo_objet set photo=%s where id_objet=%s limit 1";
            $sql2=sprintf($sql2,$this->db->escape($photo),$this->db->escape($id_objet));
            $query = $this->db->query($sql);
        }
        public function delete_with($id)
        {   
            $sql = "insert into delete_objet values (%s) ";
            // $sql = "delete from produit where id= %s)";
            $sql=sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
        }
    }
?>