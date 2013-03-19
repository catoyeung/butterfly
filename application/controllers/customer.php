<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
	public function index(){
        $data = array();
        $data['title'] = '所有客戶';
        $this->load->view('templates/header', $data);
        $identity = $this->input->get('identity');
        if ($identity == 'cs') $this->load->view('customer/index', $data);
        elseif ($identity == 'sales') $this->load->view('customer/sales', $data);
        
        $this->load->view('templates/footer', $data);
    }
}