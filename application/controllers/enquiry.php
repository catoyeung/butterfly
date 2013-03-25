<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Brand_model');
        $this->load->model('District_model');
    }
    
    public function create() {
        $data = array();
        $data['title'] = '輸入查詢';
        $data['brands'] = $this->Brand_model->get_by(array('deleted'=>False));
        $data['districts'] = $this->District_model->get_by(array('deleted'=>False));
        $this->load->view('templates/header', $data);
        $this->load->view('enquiry/create', $data);
        $this->load->view('templates/footer', $data);
    }
}