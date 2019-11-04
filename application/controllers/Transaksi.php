<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // if($this->session->userdata('auth') != TRUE){
        //     $url=base_url()."Administrator";
        //     redirect($url);
        // }
        $this->load->helper(array('form', 'url'));
        $this->load->model('PenjualanModel');
        $this->load->model('BarangModel');
    }
    
    public function index(){
        $data = array();
        $data['dataTransaksi'] = $this->PenjualanModel->getAll();
        $data['Content'] = $this->load->view('admin/transaksi', $data, TRUE);
        $this->load->view('shop/template', $data);
    }

    public function bayar($kode){
        $this->PenjualanModel->update($kode, array( 'Status' => 'Sudah Bayar'));
        redirect(base_url().'transaksi');
    }

    public function kirim($kode){
        $this->PenjualanModel->update($kode, array( 'Status' => 'Sedang Dikirim'));
        redirect(base_url().'transaksi');
    }

}