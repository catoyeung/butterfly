<?php

class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
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
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
}
