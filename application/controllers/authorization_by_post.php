<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorization_by_post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Authentication_model');
        $this->load->model('Post_model');
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
            if ($user_post_name !== 'Admin')
            {
                add_flash_message('alert', '你沒有權限登入此頁。');
                redirect('notice/view');
            }
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
    
    public function view($post_id = '')
    {
        if ($post_id == '')
        {
            $data = array();
            $data['title'] = '用戶身份權限管理';
            $data['posts'] = $this->Post_model->get_by(array('deleted'=>False));
            $this->load->view('templates/header', $data);
            $this->load->view('authorization_by_post/view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = array();
            $data['title'] = '用戶身份權限管理';
            $result = $this->Post_model->get_by(array('post_id'=>$post_id));
            $data['post'] = $result[0];
            $this->load->view('templates/header', $data);
            $this->load->view('authorization_by_post/view_by_post_id', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    
    public function edit($post_id)
    {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '修改用戶身份權限';
            $result = $this->Post_model->get_by(array('post_id'=>$post_id));
            $data['post'] = $result[0];
            $this->load->view('templates/header', $data);
            $this->load->view('authorization_by_post/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            
        }
    }
}