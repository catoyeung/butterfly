<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_enquiry_form_api extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('District_model');
        $this->load->model('Web_enquiry_form_model');
    }
    
    public function edit() {
        echo 'hello';
    }
}