<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {
    
	public function index(){
        $data['title'] = 'Notice';
        $this->load->view('templates/header', $data);
        $this->load->view('notice', $data);
        $this->load->view('templates/footer', $data);
    }
}