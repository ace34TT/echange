<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Echange extends CI_Model 
    {
        function insert($id_objet1,$id_objet2)
        {
            $sql="insert into echange values  (%s , %s,null)";
            $sql=sprintf($sql,$this->db->escape($id_objet1),$this->db->escape($id_objet2)) ;
            $query = $this->db->query($sql);
        }
        function get_my_echange($id_owner)
        {
            $sql='';
            if($id_owner==null) $sql="select * from proprietaires where date_heure_echange is not null";
            elseif($id_owner!=null) $sql="select * from proprietaires where  (id_u2=%s or id_u1=%s) and date_heure_echange is null";
            $sql=sprintf($sql,$this->db->escape($id_owner),$this->db->escape($id_owner));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            $result=array();
            $i=0;
            foreach($query->result_array() as $row)
            {
                $result[$i]=$row;
                $result[$i]['sender']='';
                if($result[$i]['id_u2']==$id_owner) $result[$i]['sender']='hidden';
                $i++;
            }
            return $result;
        }
        function echanger($id_objet1,$id_owner,$id_objet2,$u1,$u2)
        {
            $this->update($id_objet1,$u2);
            $this->update($id_objet2,$u1);
            $this->confirm($id_objet1,$id_objet2);
            // if($u1==$id_owner) {
                
                
            //     $this->confirm($id_objet1,$id_objet2);
            //     return;
            // }
            // elseif($u2==$id_owner) {
            //     $this->update($id_objet2,$u2);
            //     $this->update($id_objet1,$id_owner);
            //     $this->confirm($id_objet1,$id_objet2);
            //     return;
            // } 
        }
        function confirm($id_objet1,$id_objet2)
        {
            $sql="update  echange set date_heure_echange=now() where  ( id_objet1= %s and id_objet2=%s ) or ( id_objet2=%s and id_objet1=%s)";
            $sql=sprintf($sql,$this->db->escape($id_objet1),$this->db->escape($id_objet2),$this->db->escape($id_objet1),$this->db->escape($id_objet2));
            $query = $this->db->query($sql);
        }
        function update($id_objet,$id_owner)
        {
            $sql="update objet set id_owner=%s  where id_objet=%s";
            $sql=sprintf($sql,$this->db->escape($id_owner),$this->db->escape($id_objet)) ;
            $query = $this->db->query($sql);
        }
        public function delete_echange($id_objet1,$id_objet2)
        {   
            $sql = "delete from echange where (id_objet1= %s and id_objet2=%s)or(id_objet2=%s and id_objet1=%s)";
            $sql=sprintf($sql,$this->db->escape($id_objet1),$this->db->escape($id_objet2),$this->db->escape($id_objet1),
            $this->db->escape($id_objet2));
            $query = $this->db->query($sql);
        }
    function benefice($id_objet1,$id_objet2)
    {
        $sql="select prix-(select prix from objet where id_objet2=%s ) p from objet where id_objet1=%s";
        $sql=sprintf($sql,$this->db->escape($id_objet1),$this->db->escape($id_objet2));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            if( $row["p"]>=100 || $row["p"]<-100)return false;
            return true;
    }
    function inscription()
    {
        $sql="select count(id) i from user";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row["i"];
    }
    function echange_effectue()
    {
        $sql="select count(id_objet1) e from echange";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row["e"];
    }
    // select * from v_objet_details where titre like 'mocassin' and id_categorie='2';
    function recherche($titre,$id_categorie)
    {
        $sql="select * from v_objet_details where titre like %s and id_categorie=%s";
        $this->load->model('Generalite');
        $title=$this->Generalite->format($titre);
        // $sql=sprintf($sql,$this->db->escape($title),$this->db->escape($id_categorie));
        $sql=sprintf($sql,$this->db->escape($titre),$this->db->escape($id_categorie));

        $query = $this->db->query($sql);
        $row = $query->row_array();
        $result=array();
        foreach($query->result_array() as $row)
        {
            $result[]=$row;
        }
        return $result;

    }
    function estimation($prix)
    {
      $sql="select *,%s prix_ref from v_objet_details where (prix> %s - 0.1*%s) and (prix < %s +0.1*%s)";
      
      $sql=sprintf($sql,$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix));  
      $query = $this->db->query($sql);
      $row = $query->row_array();
        $result=array();
        foreach($query->result_array() as $row)
        {
            $result[]=$row;
        }
        return $result;

    }
    function estimation20($prix)
    {
      $sql="select *,%s prix_ref from v_objet_details where (prix> %s - 0.2*%s) and (prix < %s +0.2*%s)";
      
      $sql=sprintf($sql,$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix));  
      $query = $this->db->query($sql);
      $row = $query->row_array();
        $result=array();
        foreach($query->result_array() as $row)
        {
            $result[]=$row;
        }
        return $result;

    }
    function estimation_m($prix)
    {
      $sql="select *,%s prix_ref from v_objet_details where prix> %s - 0.1*%s";
      
      $sql=sprintf($sql,$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix));  
      $query = $this->db->query($sql);
      $row = $query->row_array();
        $result=array();
        foreach($query->result_array() as $row)
        {
            $result[]=$row;
        }
        return $result;

    }
    function estimation_p($prix)
    {
      $sql="select *,%s prix_ref from v_objet_details where  prix < %s +0.1*%s";
      
      $sql=sprintf($sql,$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix),$this->db->escape($prix));  
      $query = $this->db->query($sql);
      $row = $query->row_array();
        $result=array();
        foreach($query->result_array() as $row)
        {
            $result[]=$row;
        }
        return $result;

    }
    // function prop()
    // {
    //     $sql="select nom,date_heure_echange,id_objet from proprietaires";
    //     $query = $this->db->query($sql);
    //     $row = $query->row_array();
    //     $result=array();
    //     foreach($query->result_array() as $row)
    //     {
    //         $result[]=$row;
    //     }
    //     return $result;

    // }
    }
?>