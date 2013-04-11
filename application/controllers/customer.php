<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Customer_life_model');
        $this->load->model('Customer_life_belongs_to_customer_model');
    }
    
	public function view($page = 1){
        $data = array();
        $data['title'] = '所有客戶';
        
        $config = array();
        $config['brand_id'] = $this->session->userdata('brand_id');
        $data['customer_lives'] = $this->Customer_life_model->get_customer_lives($config, $page, 40);
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('customer/view', $data);
        $this->load->view('templates/footer', $data);
    }
}