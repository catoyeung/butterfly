<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treatment_type extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Treatment_type_model');
        $this->load->model('Brand_model');
    }
    
    public function view() {
        $data = array();
        $data['title'] = '美容分類管理';
        $data['treatment_types'] = $this->Treatment_type_model->get_all('');
        $this->load->view('templates/header', $data);
        $this->load->view('treatment_type/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增美容分類';
            $data['brands'] = $this->Brand_model->get_by(array('deleted'=>False));
            $this->load->view('templates/header', $data);
            $this->load->view('treatment_type/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with treatment_type request
            $treatment_type_name = $this->input->post('treatment_type_name');
            $brand_id = $this->session->userdata('brand_id');
            
            // Check if treatment_type model is unique with its name and brand
            $result = $this->Treatment_type_model->get_by(array('treatment_type_name'=>$treatment_type_name,
                                                          'brand_id'=>$brand_id,));
            if($result) {
                add_flash_message('alert', '美容分類重覆，請重新輸入。');
                redirect('treatment_type/view');
            }
            
            $result = $this->Treatment_type_model->create(array('treatment_type_name'=>$treatment_type_name,
                                                          'brand_id'=>$brand_id,
                                                          'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '美容分類已新增。');
            } else {
                add_flash_message('alert', '美容分類不能新增，請聯絡系統管理員。');
            }
            redirect('treatment_type/view');
        }
    }
    
    public function edit($treatment_type_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯美容分類';
            $data['treatment_type_id'] = $treatment_type_id;
            $result = $this->Treatment_type_model->get_by(array('treatment_type_id'=>$treatment_type_id));
            $data['treatment_type_name'] = $result[0]->treatment_type_name;
            $this->load->view('templates/header', $data);
            $this->load->view('treatment_type/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $treatment_type_name = $this->input->post('treatment_type_name');
            $result = $this->Treatment_type_model->update($treatment_type_id,
                                                array('treatment_type_name'=>$treatment_type_name));
            if($result) {
                add_flash_message('info', '美容分類已更改。');
            } else {
                add_flash_message('alert', '美容分類不能更改，請聯絡系統管理員。');
            }
            redirect('treatment_type/view');
        }
    }
    
    public function delete($treatment_type_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Treatment_type_model->update($treatment_type_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '美容分類已刪除。');
            } else {
                add_flash_message('alert', '美容分類不能刪除，請聯絡系統管理員。');
            }
            redirect('treatment_type/view');
        }
    }
    
    public function resume($treatment_type_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Treatment_type_model->update($treatment_type_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '美容分類已還原。');
            } else {
                add_flash_message('alert', '美容分類不能還原，請聯絡系統管理員。');
            }
            redirect('district/view');
        }
    }
}