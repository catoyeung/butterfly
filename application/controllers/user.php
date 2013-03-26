<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Crm_user_model');
        $this->load->model('Post_model');
        $this->load->model('Brand_model');
        $this->load->model('Crm_user_belongs_to_brand_model');
    }
    
	public function view(){
        $data['title'] = '用戶管理';
        $data['users'] = $this->Crm_user_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('user/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增用戶';
            $data['posts'] = $this->Post_model->get_all();
            $data['brands'] = $this->Brand_model->get_all();
            $this->load->view('templates/header', $data);
            $this->load->view('user/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with post request
            $this->db->trans_start();
            $username = $this->input->post('username');
            // encrypt the password with md5
            $password = $this->input->post('password');
            $post_id = $this->input->post('post_id');
            $display_name = $this->input->post('display_name');
            $this->Crm_user_model->create(array('username'=>$username,
                                                          'password'=>md5($password),
                                                          'post_id'=>$post_id,
                                                          'display_name'=>$display_name,
                                                      'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            $brand_ids = $this->input->post('brand_ids');
            $logged_in_user = $this->session->userdata('logged_in_user');
            foreach ($brand_ids as $brand_id)
            {
                $this->Crm_user_belongs_to_brand_model->create(array('crm_user_id'=>$logged_in_user['crm_user_id'],
                                                               'brand_id'=>$brand_id));
            }
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '用戶已新增。');
            } else {
                add_flash_message('alert', '用戶不能新增，請聯絡系統管理員。');
            }
            redirect('user/view');
        }
    }
    
    public function edit($crm_user_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯用戶';
            
            $data['user_id'] = $crm_user_id;
            $this->load->model('Post_model');
            $data['posts'] = $this->Post_model->get_all();
            $result = $this->Crm_user_model->get_by(array('Crm_user_id'=>$crm_user_id));
            $data['user'] = $result[0];
            
            $data['brands'] = $this->Brand_model->get_all();
            $result = $this->Crm_user_belongs_to_brand_model->get_all();
            $belonging_brand_ids = array();
            foreach ($result as $r)
            {
                $belonging_brand_ids[] = $r->brand_id;
            }
            $data['belonging_brand_ids'] = $belonging_brand_ids;
            
            $this->load->view('templates/header', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $username = $this->input->post('username');
            $post_id = $this->input->post('post_id');
            $display_name = $this->input->post('display_name');
            $result = $this->Crm_user_model->update($crm_user_id,
                                                array('username'=>$username,
                                                      'post_id'=>$post_id,
                                                      'display_name'=>$display_name));
            if($result) {
                add_flash_message('info', '用戶已更改。');
            } else {
                add_flash_message('alert', '用戶不能更改，請聯絡系統管理員。');
            }
            redirect('user/view');
        }
    }
    
    public function delete($user_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Crm_user_model->update($user_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '用戶已刪除。');
            } else {
                add_flash_message('alert', '用戶不能刪除，請聯絡系統管理員。');
            }
            redirect('user/view');
        }
    }
    
    public function resume($user_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Crm_user_model->update($user_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '用戶已還原。');
            } else {
                add_flash_message('alert', '用戶不能還原，請聯絡系統管理員。');
            }
            redirect('user/view');
        }
    }
    
    public function reset_password($crm_user_id) {
        $new_password = $this->random_password();
        $result = $this->Crm_user_model->update($crm_user_id,
                                                array('password'=>md5($new_password)));
        if($result) {
            $data['new_password'] = $new_password;
            $this->load->view('templates/header', $data);
            $this->load->view('user/reset_password', $data);
            $this->load->view('templates/footer', $data);
        } else {
            add_flash_message('alert', '用戶密碼不能重設，請聯絡系統管理員。');
            redirect('user/view');
        }
        
    }
    
    private function random_password()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $password = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $password[] = $alphabet[$n];
        }
        return implode($password); //turn the array into a string
    }
}