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
        $brand_id = $this->input->post('brand_id');
        
        // check if brand is selected
        if ($brand_id=='')
        {
            add_flash_message('alert', '請選擇品牌。');
            redirect('');
        }
        
        if ($this->Authentication_model->validate($username, $password)){
            $this->Authentication_model->store_user_in_session();
            $this->Authentication_model->store_brand_id_in_session($brand_id);
            add_flash_message('info', '你已經登入系統。');
            redirect('notice/view');
        } else {
            add_flash_message('alert', '登入名稱和密碼不相符，無法登入系統。');
            redirect('');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('logged_in_user');
        redirect('');
    }
}