<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Staff_model');
        $this->load->model('Post_model');
        $this->load->model('Brand_model');
        $this->load->model('Staff_belongs_to_brand_model');
    }
    
	public function view(){
        $data['title'] = '用戶管理';
        $data['staffs'] = $this->Staff_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('staff/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // staff access notice create form
            $data['title'] = '新增用戶';
            $data['posts'] = $this->Post_model->get_all();
            $data['brands'] = $this->Brand_model->get_all();
            $this->load->view('templates/header', $data);
            $this->load->view('staff/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // staff create form with post request
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $post_id = $this->input->post('post_id');
            $display_name = $this->input->post('display_name');
            // check if staff already exists,
            // if yes, redirect to staff view page
            $result = $this->Staff_model->get_by(array('username'=>$username));
            if ($result) {
                add_flash_message('alert', '用戶名稱已存在。');
                redirect('staff/view');
            }
            $this->db->trans_start();
            // encrypt the password with md5
            $this->Staff_model->create(array('username'=>$username,
                                                          'password'=>md5($password),
                                                          'post_id'=>$post_id,
                                                          'display_name'=>$display_name,
                                                      'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            $brand_ids = $this->input->post('brand_ids');
            $logged_in_user = $this->session->userdata('logged_in_user');
            foreach ($brand_ids as $brand_id)
            {
                $this->Staff_belongs_to_brand_model->create(array('staff_id'=>$logged_in_user['staff_id'],
                                                               'brand_id'=>$brand_id));
            }
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '用戶已新增。');
            } else {
                add_flash_message('alert', '用戶不能新增，請聯絡系統管理員。');
            }
            redirect('staff/view');
        }
    }
    
    public function edit($staff_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯用戶';
            
            $data['staff_id'] = $staff_id;
            $this->load->model('Post_model');
            $data['posts'] = $this->Post_model->get_all();
            $result = $this->Staff_model->get_by(array('staff_id'=>$staff_id));
            $data['staff'] = $result[0];
            
            $data['brands'] = $this->Brand_model->get_all();
            $result = $this->Staff_belongs_to_brand_model->get_all();
            $belonging_brand_ids = array();
            foreach ($result as $r)
            {
                $belonging_brand_ids[] = $r->brand_id;
            }
            $data['belonging_brand_ids'] = $belonging_brand_ids;
            
            $this->load->view('templates/header', $data);
            $this->load->view('staff/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $username = $this->input->post('username');
            $post_id = $this->input->post('post_id');
            $display_name = $this->input->post('display_name');
            $result = $this->Staff_model->update($staff_id,
                                                array('username'=>$username,
                                                      'post_id'=>$post_id,
                                                      'display_name'=>$display_name));
            if($result) {
                add_flash_message('info', '用戶已更改。');
            } else {
                add_flash_message('alert', '用戶不能更改，請聯絡系統管理員。');
            }
            redirect('staff/view');
        }
    }
    
    public function delete($staff_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Staff_model->update($staff_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '用戶已刪除。');
            } else {
                add_flash_message('alert', '用戶不能刪除，請聯絡系統管理員。');
            }
            redirect('staff/view');
        }
    }
    
    public function resume($staff_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Staff_model->update($staff_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '用戶已還原。');
            } else {
                add_flash_message('alert', '用戶不能還原，請聯絡系統管理員。');
            }
            redirect('staff/view');
        }
    }
    
    public function reset_password($staff_id) {
        $new_password = $this->random_password();
        $result = $this->Staff_model->update($staff_id,
                                                array('password'=>md5($new_password)));
        if($result) {
            $data['new_password'] = $new_password;
            $this->load->view('templates/header', $data);
            $this->load->view('staff/reset_password', $data);
            $this->load->view('templates/footer', $data);
        } else {
            add_flash_message('alert', '用戶密碼不能重設，請聯絡系統管理員。');
            redirect('staff/view');
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