<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Customer_life_model');
        $this->load->model('Journal_model');
        $this->load->model('No_booking_reason_model');
        $this->load->model('Stage_model');
    }
    
	public function view($page = 1){
        $data = array();
        $data['title'] = '所有客戶';
        $data['page'] = $page;
        
        $data['no_booking_reasons'] = $this->No_booking_reason_model->get_all();
        
        $config = array();
        $config['brand_id'] = $this->session->userdata('brand_id');
        $customer_lives = $this->Customer_life_model->get_customer_lives($config, $page, 40);
        $latest_stages = array();
        foreach ($customer_lives as $key=>$customer_life)
        {
            $customer_life_id = $customer_life->customer_life_id;
            $latest_stages[$customer_life_id] = $this->Stage_model->latest_stage_by_customer_life_id($customer_life_id);
            $customer_lives[$key]->journals = $this->Journal_model->get_by_customer_life_id($customer_life_id);
        }
        $data['customer_lives'] = $customer_lives;
        $data['latest_stages'] = $latest_stages;
        $this->load->view('templates/header', $data);
        $this->load->view('customer/view', $data);
        $this->load->view('templates/footer', $data);
    }
}