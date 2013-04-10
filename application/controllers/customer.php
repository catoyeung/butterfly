<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
	public function view(){
        $data = array();
        $data['title'] = '所有客戶';
        $this->load->view('templates/header', $data);
        $this->load->view('customer/index', $data);
        $this->load->view('templates/footer', $data);
    }
}