<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function create() {
        $data = array();
        $data['title'] = '輸入查詢';
        $this->load->view('templates/header', $data);
        $this->load->view('enquiry/create', $data);
        $this->load->view('templates/footer', $data);
    }
}