<?php 
    
        function update($id_objet,$id_owner)
        {
            $sql="update objet set id_owner=%s  where id_objet=%s";
            $sql=sprintf($sql,$this->db->escape($id_objet),$this->db->escape($id_owner)) ;
            $query = $this->db->query($sql);
        }
        public function delete_echange($id_objet1,$id_objet2)
        {   
            $sql = "delete from echange where (id_objet1= %s and id_objet2=%s)or(id_objet2=%s and id_objet1=%s))";
            $sql=sprintf($sql,$this->db->escape($id_objet1),$this->db->escape($id_objet2),$this->db->escape($id_objet1),
            $this->db->escape($id_objet2));
            $query = $this->db->query($sql);
        }
    }
    function benefice($id_objet1,$id_objet2)
    {
        $sql="select prix-(select prix from objet where(id_objet2=%s)) p from objet where(id_objet1=%s)";
        $sql=sprintf($sql,$this->db->escape($id_objet1),$this->db->escape($id_objet2));
            $query = $this->db->query($sql);
            $row = $query->row_array();
            if( $row["p"]>=100)||($row["p"]<-100)return false;
            return true;
    }
    function inscription()
    {
        $sql="select count (id) i from user";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row["i"];
    }
    function echange_effectue()
    {
        $sql="select count (id) e from echange";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row["e"];
    }
    function recherche($titre,$id_categorie)
    {
        $sql="select * from objet where titre like=%s and categorie=%s";
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
    function prop($nom,$date_heure_echange,$id_objet)
    {
        $sql="select nom,date_heure_echange,id_objet from user join objet o on o.id_owner = u.id join echange e on e.id_objet = o.id_objet  
        where (id_objet1= %s and id_objet2=%s)or(id_objet2=%s and id_objet1=%s) ";
        $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($date_heure_echange),$this->db->escape($id_objet));
        $query = $this->db->query($sql);
        $row = $query->row_array();
        $result=array();
        foreach($query->result_array() as $row)
        {
            $result[]=$row;
        }
        return $result;

    }
?>