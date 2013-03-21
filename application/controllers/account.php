<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Authentication_model');
    }
    
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->Authentication_model->validate($username, $password)){
            $this->Authentication_model->store_user_in_session();
            add_flash_message('info', '你已經登入系統。');
            redirect('notice/view');
        } else {
            redirect('');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('logged_in_user');
        redirect('');
    }
}