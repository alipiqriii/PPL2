<?php

class PenjualanModel extends CI_Model {
    
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
        $this->db->from("penjualan");

        $query = $this->db->get();
        if(!$query->num_rows() < 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }

    function update($kode,$data)
    {
        $this->db->where('NoPenjualan',$kode);
        $this->db->update('penjualan',$data);
    }

    function createJual($data)
    {
        extract($data);
        $NomorPenjualan         = $data['NomorPenjualan'];
        $KodeBarang            = $data['KodeBarang'];
        $JumlahJual       = $data['JumlahJual'];
        $HargaJual              = $data['HargaJual'];
        return
        $this->db->query("INSERT INTO jual (NoPenjualan, KodeBarang, JumlahJual, HargaJual)
        VALUES ('$NomorPenjualan','$KodeBarang','$JumlahJual','$HargaJual')");
    }

    function createPenjualan($data)
    {
        $this->db->insert('penjualan',$data);
        // extract($data);
        // $Tanggal             = $data['Tanggal'];
        // $NomorPenjualan         = $data['NomorPenjualan'];
        // $Nama            = $data['Nama'];
        // $HP       = $data['HP'];
        // $Alamat              = $data['Alamat'];
        // $Kota              = $data['Kota'];
        // $KodePos       = $data['KodePos'];
        // $Total = $data['Total'];
        // $Email = $data['Email'];

        // return
        // $this->db->query("INSERT INTO penjualan (Tanggal, NoPenjualan, Nama, HP, Alamat, Kota, KodePos, Total, Email)
        // VALUES ('$Tanggal','$NomorPenjualan','$Nama','$HP','$Alamat', '$Kota', '$KodePos', '$Total', '$Email')");
        
    }

}