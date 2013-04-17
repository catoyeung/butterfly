<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Therapy extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Therapy_model');
        $this->load->model('Brand_model');
    }
    
    public function view() {
        $data = array();
        $data['title'] = '療程管理';
        $data['therapys'] = $this->Therapy_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('therapy/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增療程';
            $data['brands'] = $this->Brand_model->get_by(array('deleted'=>False));
            $this->load->view('templates/header', $data);
            $this->load->view('therapy/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with therapy request
            $therapy_name = $this->input->post('therapy_name');
            $brand_id = $this->session->userdata('brand_id');
            
            // Check if therapy model is unique with its name and brand
            $result = $this->Therapy_model->get_by(array('therapy_name'=>$therapy_name,
                                                          'brand_id'=>$brand_id));
            if($result) {
                add_flash_message('alert', '療程重覆，請重新輸入。');
                redirect('therapy/view');
            }
            
            $result = $this->Therapy_model->create(array('therapy_name'=>$therapy_name,
                                                          'brand_id'=>$brand_id,
                                                          'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '療程已新增。');
            } else {
                add_flash_message('alert', '療程不能新增，請聯絡系統管理員。');
            }
            redirect('therapy/view');
        }
    }
    
    public function edit($therapy_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯療程';
            $data['therapy_id'] = $therapy_id;
            $result = $this->Therapy_model->get_by(array('therapy_id'=>$therapy_id));
            $data['therapy_name'] = $result[0]->therapy_name;
            $this->load->view('templates/header', $data);
            $this->load->view('therapy/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $therapy_name = $this->input->post('therapy_name');
            $result = $this->Therapy_model->update($therapy_id,
                                                array('therapy_name'=>$therapy_name));
            if($result) {
                add_flash_message('info', '療程已更改。');
            } else {
                add_flash_message('alert', '療程不能更改，請聯絡系統管理員。');
            }
            redirect('therapy/view');
        }
    }
    
    public function delete($therapy_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Therapy_model->update($therapy_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '療程已刪除。');
            } else {
                add_flash_message('alert', '療程不能刪除，請聯絡系統管理員。');
            }
            redirect('therapy/view');
        }
    }
    
    public function resume($therapy_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Therapy_model->update($therapy_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '療程已還原。');
            } else {
                add_flash_message('alert', '療程不能還原，請聯絡系統管理員。');
            }
            redirect('therapy/view');
        }
    }
}