<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customerservice extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
	public function index(){
    }
    
    public function manualenquiry() {
        $data = array();
        $data['title'] = '人手輸入查詢';
        $this->load->view('templates/header', $data);
        $this->load->view('customerservice/manualenquiry', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function clients() {
        $data = array();
        $data['title'] = '所有客戶查詢';
        $this->load->view('templates/header', $data);
        $this->load->view('customerservice/clients', $data);
        $this->load->view('templates/footer', $data);
    }
}