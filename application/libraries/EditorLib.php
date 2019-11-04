<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditorLib {
    
    private $CI = null;
    
    function __construct()
    {
        $this->CI = &get_instance();
    }   

	public function process($post)
	{	
	    // DataTables PHP library
		require dirname(__FILE__).'/Editor-PHP-1.9.0/php/DataTables.php';
		
		//Load the model which will give us our data
		$this->CI->load->model('Sikap');
		
		//Pass the database object to the model
		$this->CI->Sikap->init($db);
		
		//Let the model produce the data
		$this->CI->Sikap->getStaff($post);
	}
}

