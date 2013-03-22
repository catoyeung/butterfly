<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Crm_user_model');
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
            $this->load->model('Post_model');
            $data['posts'] = $this->Post_model->get_all();
            $this->load->view('templates/header', $data);
            $this->load->view('user/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with post request
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $post_id = $this->input->post('post_id');
            $display_name = $this->input->post('display_name');
            $result = $this->Crm_user_model->create(array('username'=>$username,
                                                          'password'=>$password,
                                                          'post_id'=>$post_id,
                                                          'display_name'=>$display_name,
                                                      'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
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
            $this->load->view('templates/header', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $post_id = $this->input->post('post_id');
            $display_name = $this->input->post('display_name');
            $result = $this->Crm_user_model->update($crm_user_id,
                                                array('username'=>$username,
                                                      'password'=>$password,
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
}