<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Authentication_model');
    }
    
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if($this->Authentication_model->user_is_logged_in()) {
                redirect('notice/view');
            } else {
                $data = array();
                $data['title'] = '登入';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer', $data);
            }
        }
        
    }
    
    /*public function login()
    {
        $this->load->model('authentication');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('logged_in_user');
        add_flash_message('info', '你剛成功登出。');
        redirect('');
    }*/
}