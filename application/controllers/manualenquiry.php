<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manualenquiry extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
	public function index(){
    }
    
    public function create() {
        $data = array();
        $data['title'] = '人手輸入查詢';
        $this->load->view('templates/header', $data);
        $this->load->view('manualenquiry/create', $data);
        $this->load->view('templates/footer', $data);
    }
}