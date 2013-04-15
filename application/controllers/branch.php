<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Branch_model');
        $this->load->model('District_model');
    }
    
    public function view() {
        $data = array();
        $data['title'] = '分店管理';
        $data['branches'] = $this->Branch_model->get_all('');
        $this->load->view('templates/header', $data);
        $this->load->view('branch/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增分店';
            $data['districts'] = $this->District_model->get_by(array('deleted'=>False));
            $this->load->view('templates/header', $data);
            $this->load->view('branch/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with branch request
            $branch_name = $this->input->post('branch_name');
            $district_id = $this->input->post('district_id');
            $brand_id = $this->session->userdata('brand_id');
            
            // Check if branch model is unique with its name and brand
            $result = $this->Branch_model->get_by(array('branch_name'=>$branch_name,
                                                          'brand_id'=>$brand_id,));
            if($result) {
                add_flash_message('alert', '分店重覆，請重新輸入。');
                redirect('branch/view');
            }
            
            $result = $this->Branch_model->create(array('branch_name'=>$branch_name,
                                                          'district_id'=>$district_id,
                                                          'brand_id'=>$brand_id,
                                                          'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '分店已新增。');
            } else {
                add_flash_message('alert', '分店不能新增，請聯絡系統管理員。');
            }
            redirect('branch/view');
        }
    }
    
    public function edit($branch_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯分店';
            $data['branch_id'] = $branch_id;
            $data['districts'] = $this->District_model->get_by(array('deleted'=>False));
            $result = $this->Branch_model->get_by(array('branch_id'=>$branch_id));
            $data['branch'] = $result[0];
            $this->load->view('templates/header', $data);
            $this->load->view('branch/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $branch_name = $this->input->post('branch_name');
            $result = $this->Branch_model->update($branch_id,
                                                array('branch_name'=>$branch_name));
            if($result) {
                add_flash_message('info', '分店已更改。');
            } else {
                add_flash_message('alert', '分店不能更改，請聯絡系統管理員。');
            }
            redirect('branch/view');
        }
    }
    
    public function delete($branch_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Branch_model->update($branch_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '分店已刪除。');
            } else {
                add_flash_message('alert', '分店不能刪除，請聯絡系統管理員。');
            }
            redirect('branch/view');
        }
    }
    
    public function resume($branch_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Branch_model->update($branch_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '分店已還原。');
            } else {
                add_flash_message('alert', '分店不能還原，請聯絡系統管理員。');
            }
            redirect('branch/view');
        }
    }
    
}