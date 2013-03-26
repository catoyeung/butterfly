<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class District extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('District_model');
        $this->load->model('Brand_model');
    }
    
    public function view() {
        $data = array();
        $data['title'] = '分區管理';
        $data['districts'] = $this->District_model->get_all('');
        $this->load->view('templates/header', $data);
        $this->load->view('district/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增分區';
            $data['brands'] = $this->Brand_model->get_by(array('deleted'=>False));
            $this->load->view('templates/header', $data);
            $this->load->view('district/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with district request
            $district_name = $this->input->post('district_name');
            $brand_id = $this->session->userdata('brand_id');
            
            // Check if district model is unique with its name and brand
            $result = $this->District_model->get_by(array('district_name'=>$district_name,
                                                          'brand_id'=>$brand_id,));
            if($result) {
                add_flash_message('alert', '分區重覆，請重新輸入。');
                redirect('district/view');
            }
            
            $result = $this->District_model->create(array('district_name'=>$district_name,
                                                          'brand_id'=>$brand_id,
                                                          'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '分區已新增。');
            } else {
                add_flash_message('alert', '分區不能新增，請聯絡系統管理員。');
            }
            redirect('district/view');
        }
    }
    
    public function edit($district_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯分區';
            $data['district_id'] = $district_id;
            $result = $this->District_model->get_by(array('district_id'=>$district_id));
            $data['district_name'] = $result[0]->district_name;
            $this->load->view('templates/header', $data);
            $this->load->view('district/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $district_name = $this->input->post('district_name');
            $result = $this->District_model->update($district_id,
                                                array('district_name'=>$district_name));
            if($result) {
                add_flash_message('info', '分區已更改。');
            } else {
                add_flash_message('alert', '分區不能更改，請聯絡系統管理員。');
            }
            redirect('district/view');
        }
    }
    
    public function delete($district_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->District_model->update($district_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '分區已刪除。');
            } else {
                add_flash_message('alert', '分區不能刪除，請聯絡系統管理員。');
            }
            redirect('district/view');
        }
    }
    
    public function resume($district_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->District_model->update($district_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '分區已還原。');
            } else {
                add_flash_message('alert', '分區不能還原，請聯絡系統管理員。');
            }
            redirect('district/view');
        }
    }
}