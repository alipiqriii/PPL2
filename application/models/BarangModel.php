<?php

class BarangModel extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function __destruct()
    {
        $this->db->close();
    }
    
    function getAll()
    {
        $this->db->select("*");
        $this->db->from("barang");

        $query = $this->db->get();
        if(!$query->num_rows() < 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }

    function update($kode,$data)
    {
        $this->db->where('kode',$kode);
        $this->db->update('barang',$data);
        
    }

    function getOne($kode)
    {
        $this->db->select("*");
        $this->db->from("barang");
        $this->db->where("kode",$kode);

        $query = $this->db->get();
        if(!$query->num_rows() < 1) {                 
            return $query->row_array();
        }else{
            return false;
        }
    }
}