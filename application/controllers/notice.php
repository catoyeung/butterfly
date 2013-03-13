<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {
    
	public function index(){
        $data['title'] = '通告';
        $this->load->view('templates/header', $data);
        $this->load->view('notice/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        $data['title'] = '張貼通告';
        $this->load->view('templates/header', $data);
        $this->load->view('notice/create', $data);
        $this->load->view('templates/footer', $data);
    }
}