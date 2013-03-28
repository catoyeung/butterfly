<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
    }
    
	public function view(){
        $data['title'] = '用戶身份管理';
        $data['posts'] = $this->Post_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('post/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增用戶身份';
            $this->load->view('templates/header', $data);
            $this->load->view('post/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with post request
            $post_name = $this->input->post('post_name');
            $brand_id = $this->session->userdata('brand_id');
            $result = $this->Post_model->create(array('post_name'=>$post_name,
                                                      'brand_id'=>$brand_id,
                                                      'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '用戶身份已新增。');
            } else {
                add_flash_message('alert', '用戶身份不能新增，請聯絡系統管理員。');
            }
            redirect('post/view');
        }
    }
    
    public function edit($post_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯用戶身份';
            $data['post_id'] = $post_id;
            $result = $this->Post_model->get_by(array('post_id'=>$post_id));
            $data['post_name'] = $result[0]->post_name;
            $this->load->view('templates/header', $data);
            $this->load->view('post/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $post_name = $this->input->post('post_name');
            $result = $this->Post_model->update($post_id,
                                                array('post_name'=>$post_name));
            if($result) {
                add_flash_message('info', '用戶身份已更改。');
            } else {
                add_flash_message('alert', '用戶身份不能更改，請聯絡系統管理員。');
            }
            redirect('post/view');
        }
    }
    
    public function delete($post_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['post_id'] = $post_id;
            $result = $this->Post_model->get_by(array('post_id'=>$post_id));
            $data['post_name'] = $result[0]->post_name;
            $this->load->view('templates/header', $data);
            $this->load->view('post/delete', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Post_model->update($post_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '用戶身份已刪除。');
            } else {
                add_flash_message('alert', '用戶身份不能刪除，請聯絡系統管理員。');
            }
            redirect('post/view');
        }
    }
    
    public function resume($post_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Post_model->update($post_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '用戶身份已還原。');
            } else {
                add_flash_message('alert', '用戶身份不能還原，請聯絡系統管理員。');
            }
            redirect('post/view');
        }
    }
}