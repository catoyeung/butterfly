<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry_content extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Enquiry_content_model');
        $this->load->model('Brand_model');
        $this->load->model('Treatment_type_model');
    }
    
    public function view() {
        $data = array();
        $data['title'] = '查詢內容管理';
        $enquiry_contents = $this->Enquiry_content_model->get_all('');
        foreach ($enquiry_contents as $key=>$enquiry_content)
        {
            if ($enquiry_content->treatment_type_id == '')
                $enquiry_contents[$key]->no_treatment_type = true;
        }
        $data['treatment_types'] = $this->Treatment_type_model->get_by(array('deleted'=>False));
        $data['enquiry_contents'] = $enquiry_contents;
        $this->load->view('templates/header', $data);
        $this->load->view('enquiry_content/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增查詢內容';
            $data['brands'] = $this->Brand_model->get_by(array('deleted'=>False));
            $data['treatment_types'] = $this->Treatment_type_model->get_by(array('deleted'=>False));
            $this->load->view('templates/header', $data);
            $this->load->view('enquiry_content/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with enquiry_content request
            $enquiry_content_name = $this->input->post('enquiry_content_name');
            $brand_id = $this->session->userdata('brand_id');
            $treatment_type_id = $this->input->post('treatment_type_id');
            // Check if enquiry_content model is unique with its name and brand
            $result = $this->Enquiry_content_model->get_by(array('enquiry_content_name'=>$enquiry_content_name,
                                                          'brand_id'=>$brand_id,
                                                                 'treatment_type_id'=>$treatment_type_id));
            if($result) {
                add_flash_message('alert', '查詢內容重覆，請重新輸入。');
                redirect('enquiry_content/view');
            }
            
            $result = $this->Enquiry_content_model->create(array('enquiry_content_name'=>$enquiry_content_name,
                                                          'brand_id'=>$brand_id,
                                                          'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '查詢內容已新增。');
            } else {
                add_flash_message('alert', '查詢內容不能新增，請聯絡系統管理員。');
            }
            redirect('enquiry_content/view');
        }
    }
    
    public function edit($enquiry_content_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯查詢內容';
            $data['enquiry_content_id'] = $enquiry_content_id;
            $result = $this->Enquiry_content_model->get_by(array('enquiry_content_id'=>$enquiry_content_id));
            $data['enquiry_content'] = $result[0];
            $treatment_types = $this->Treatment_type_model->get_by(array('deleted'=>False));
            array_unshift($treatment_types, (object) array('treatment_type_id' => '', 'treatment_type_name' => '沒有美容分類'));
            $data['treatment_types'] = $treatment_types;
            $this->load->view('templates/header', $data);
            $this->load->view('enquiry_content/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $enquiry_content_name = $this->input->post('enquiry_content_name');
            $result = $this->Enquiry_content_model->update($enquiry_content_id,
                                                array('enquiry_content_name'=>$enquiry_content_name));
            if($result) {
                add_flash_message('info', '查詢內容已更改。');
            } else {
                add_flash_message('alert', '查詢內容不能更改，請聯絡系統管理員。');
            }
            redirect('enquiry_content/view');
        }
    }
    
    public function delete($enquiry_content_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Enquiry_content_model->update($enquiry_content_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '查詢內容已刪除。');
            } else {
                add_flash_message('alert', '查詢內容不能刪除，請聯絡系統管理員。');
            }
            redirect('enquiry_content/view');
        }
    }
    
    public function resume($enquiry_content_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Enquiry_content_model->update($enquiry_content_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '查詢內容已還原。');
            } else {
                add_flash_message('alert', '查詢內容不能還原，請聯絡系統管理員。');
            }
            redirect('enquiry_content/view');
        }
    }
}