<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Authentication_model');
        $this->load->model('Brand_model');
    }
    
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if($this->Authentication_model->user_is_logged_in()) {
                redirect('notice/view');
            } else {
                $data = array();
                $data['title'] = '登入';
                $data['brands'] = $this->Brand_model->get_by(array('deleted'=>False));
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer', $data);
            }
        }
        
    }
}