<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('PenjualanModel');
    }

    public function index(){
        $data = array();
        if ($this->session->cart != null) {
            foreach ($this->session->cart as $barang) {
                $detail_barang = $this->BarangModel->getOne($barang['kode']);
                $detail_barang['quantity'] = $barang['jumlah'];
                $data['dataBarang'][] = $detail_barang;
            }
        }
        
        $data['Content'] = $this->load->view('shop/cart', $data, TRUE);
        $this->load->view('shop/template', $data);
        // foreach ($this->session->cart as $key) {
        //        print_r($key);
        //    }   
        // $data['content_div'] = $this->load->view('v_cart_display', '', TRUE);;
        // $this->load->view('v_template', $data);
    }
    
    public function docheckout(){
        $data = array();
        $tanggal = date("Y-m-d H:i:s");
        $data['total'] = 0;

        if ($this->session->cart != null) {
            foreach ($this->session->cart as $barang) {
                $detail_barang = $this->BarangModel->getOne($barang['kode']);
                $detail_barang['quantity'] = $barang['jumlah'];
                $data['total'] += $barang['jumlah'] * $detail_barang['harga'];
                $data['dataBarang'][] = $detail_barang;
            }
        }

        //Konversi ID Provinsi & ID Kota ke text
        $provinsi_id = $this->input->post('provinsi');
        $kota_id = $this->input->post('kota');
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=$kota_id&province=$provinsi_id",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key:e58377a903dbe0a4daa2413229b84584"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
          die();
        }
        $json = json_decode($response, true);

      $data_input = array(
        'NoPenjualan'             => $this->input->post('NomorPenjualan'),
        'Nama'         => $this->input->post('Nama'),
        'Status'         => 'Belum Bayar',
        'HP'            => $this->input->post('HP'),
        'Alamat'       => $this->input->post('Alamat'),
        'Provinsi'              => $json['rajaongkir']['results']['province'],
        'Kota'              => $json['rajaongkir']['results']['type'].' '.$json['rajaongkir']['results']['city_name'],
        'Kurir'              => $this->input->post('kurir'),
        'ServiceKurir'              => $this->input->post('services_kurir'),
        'KodePos'              => $this->input->post('kodepos'),
        'Ongkir'     => $this->input->post('ongkir'),
        'Total'     => $this->input->post('total'),
        'Email' => $this->input->post('Email'),
        'Tanggal' => $tanggal
      );

      $this->PenjualanModel->createPenjualan($data_input);
      foreach ($data['dataBarang'] as $Barang) {
          $data_input = array(
            'NomorPenjualan'             => $this->input->post('NomorPenjualan'),
            'KodeBarang'         => $Barang['kode'],
            'JumlahJual'            => $Barang['quantity'],
            'HargaJual'       => $Barang['harga']
          );
          $this->BarangModel->update($Barang['kode'], array( 'stock' => ($Barang['stock'] - $Barang['quantity'])));
          $this->PenjualanModel->createJual($data_input);
      }
      unset($_SESSION['cart']);
      redirect(base_url().'cart');
    }

    public function add_to_cart($kode,$qty){
        $data = $this->BarangModel->getOne($kode);
        if ($data['stock']!=0) {
            if(!isset($_SESSION['cart'][$kode])){
                $_SESSION['cart'][$kode] = array(
                            "kode"            => $kode,
                            "jumlah"          => $qty
                        );
            }
            else{
                $qty_old = $_SESSION['cart'][$kode]['jumlah'];
                $_SESSION['cart'][$kode]['jumlah'] = $qty_old + $qty;
            }
        }
        
    }
    
    public function clear_all(){
        unset($_SESSION['cart']);
        redirect(base_url().'cart');
    }
    public function clear_one($kode){
        unset($_SESSION['cart'][$kode]);
        redirect(base_url().'cart');
    }
}