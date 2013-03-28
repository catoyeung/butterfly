<?php

abstract class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Authentication_model');
    }
    
    public function _remap($method, $params = array())
    {
        //$klass = $this->router->fetch_class();
        //$method = $this->router->fetch_method();
        $logged_in_user = $this->session->userdata('logged_in_user');
        if ($logged_in_user == '')
        {
            add_flash_message('alert', '請先登入。');
            redirect('');
        }
        if (method_exists($this, $method))
        {
            // check the position of the logged in user,
            // check if it is matched with the authorization
            $user_post_name = $this->Authentication_model->get_post_name($logged_in_user['post_id']);
            /*if (!in_array($user_post_name, $this->allowed_post()))
            {
                add_flash_message('alert', '你沒有權限登入此頁。');
                redirect('');
            }*/
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
}
