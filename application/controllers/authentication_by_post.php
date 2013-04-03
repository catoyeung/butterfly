<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication_by_post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Authentication_model');
        $this->load->model('Post_model');
        $this->load->model('Authentication_by_post_model');
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
            // check if it is matched with the authentication
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
            $this->load->view('authentication_by_post/view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = array();
            $data['title'] = '用戶身份權限管理';
            $result = $this->Post_model->get_by(array('post_id'=>$post_id));
            $data['post'] = $result[0];
            $data['controllers'] = $this->Authentication_by_post_model->get_all_controller_methods($post_id);
            
            
            $this->load->view('templates/header', $data);
            $this->load->view('authentication_by_post/view_by_post_id', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    
    public function create()
    {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $post_id = $this->input->post('post_id');
            $controller = $this->input->post('controller');
            $methods = $this->input->post('methods');
            // check if the methods patthern is correct or not
            $regex_pattern = '/^([a-z]+\[[a-z| ]+\])(,([a-z]+\[[a-z| ]+\]))*$/';
            if (!preg_match($regex_pattern, $methods))
            {
                add_flash_message('alert', '所提供的資料PATTERN不正確，請重新輸入。');
                redirect('authentication_by_post/view/'.$post_id);
            }
            $result = $this->Authentication_by_post_model->get_by(array('controller'=>$controller));
            if ($result) {
                add_flash_message('alert', '系統已儲存此Controller的權限，請修改原有權限。');
                redirect('authentication_by_post/view/'.$post_id);
            }
            $this->db->trans_start();
            $this->Authentication_by_post_model->create_controller_for_post($post_id, $controller, $methods);
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '用戶身份權限已新增。');
            } else {
                add_flash_message('alert', '用戶身份權限不能新增，請聯絡系統管理員。');
            }
            redirect('authentication_by_post/view/'.$post_id);
        }
    }
    
    public function edit()
    {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $post_id = $this->input->get('post_id');
            $controller = $this->input->get('controller');
            
            $data['title'] = '修改用戶身份權限';
            
            $result = $this->Post_model->get_by(array('post_id'=>$post_id));
            $data['post'] = $result[0];
            $result = $this->Authentication_by_post_model->search_controller_methods($post_id, $controller);
            $data['controller'] = $result[0]['controller'];
            $data['methods'] = $result[0]['controller_methods'];
            
            $this->load->view('templates/header', $data);
            $this->load->view('authentication_by_post/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $post_id = $this->input->post('post_id');
            $controller = $this->input->post('controller');
            $methods = $this->input->post('methods');
            // check if the methods patthern is correct or not
            $regex_pattern = '/^([a-z]+\[[a-z| ]+\])(,([a-z]+\[[a-z| ]+\]))*$/';
            if (!preg_match($regex_pattern, $methods))
            {
                add_flash_message('alert', '所提供的資料PATTERN不正確，請重新輸入。');
                redirect('authentication_by_post/edit?' . "post_id={$post_id}&controller={$controller}");
            }
            $this->db->trans_start();
            $this->Authentication_by_post_model->edit_controller_for_post($post_id, $controller, $methods);
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '用戶身份權限已修改。');
                redirect("authentication_by_post/view/{$post_id}");
            } else {
                add_flash_message('alert', '用戶身份權限不能修改，請聯絡系統管理員。');
                redirect('authentication_by_post/edit?' . "post_id={$post_id}&controller={$controller}");
            }
            
        }
    }
    
    public function delete()
    {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $post_id = $this->input->post('post_id');
            $controller = $this->input->post('controller');
            $this->db->trans_start();
            $this->Authentication_by_post_model->delete_controller_for_post($post_id, $controller);
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '用戶身份權限已刪除。');
                redirect("authentication_by_post/view/{$post_id}");
            } else {
                add_flash_message('alert', '用戶身份權限不能刪除，請聯絡系統管理員。');
                redirect("authentication_by_post/view/{$post_id}");
            }
        }
    }
}