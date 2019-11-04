<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // if($this->session->userdata('auth') != TRUE){
        //     $url=base_url()."Administrator";
        //     redirect($url);
        // }
        $this->load->helper(array('form', 'url'));
        $this->load->model('BarangModel');
    }
    
    public function index(){
        $data['dataBarang'] = $this->BarangModel->getAll();
        $data['Content'] = $this->load->view('shop/shoplist', $data, TRUE);
        $this->load->view('shop/template', $data);
    }

    public function getServiceKurir($asal,$tujuan,$kurir,$berat){

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$tujuan."&weight=".$berat."&courier=".$kurir."",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
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

        echo $response;
        // $data = json_decode($response, true);
        // foreach ($data['rajaongkir']['results'][0]['costs'] as $services) {
        //    echo "<option value='".$services['service'].'-'.$service['cost'][0]['value']."'>".$services['service'].' '.$service['cost'][0]['etd'].' Hari Sampai'.' Rp.'.$service['cost'][0]['value']."</option>";
        // }
    }
    public function getKotaKabupaten($provinsi_id){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
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

        $data = json_decode($response, true);
        foreach ($data['rajaongkir']['results'] as $city) {
           echo "<option value='".$city['city_id']."'>".$city['type'].' '.$city['city_name']."</option>";
        }
    }

    public function checkout(){
        $data = array();

        // API RajaOngkir
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
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
        $err = curl_error($curl);
        $response = json_decode(curl_exec($curl), true);
        $data['provinsi'] = $response['rajaongkir']['results'];

        if ($this->session->cart != null) {
            $total_berat = 0;
            foreach ($this->session->cart as $barang) {
                $detail_barang = $this->BarangModel->getOne($barang['kode']);
                $detail_barang['quantity'] = $barang['jumlah'];
                $data['dataBarang'][] = $detail_barang;
                $total_berat = $total_berat + ($detail_barang['berat']*$detail_barang['quantity']);
            }
        }
        $data['total_berat'] = $total_berat;
        $data['Content'] = $this->load->view('shop/checkout', $data, TRUE);
        $this->load->view('shop/template', $data);
    }

}