<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad_source extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Ad_source_model');
        $this->load->model('Brand_model');
    }
    
    public function view() {
        $data = array();
        $data['title'] = '廣告來源管理';
        $data['ad_sources'] = $this->Ad_source_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('ad_source/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增廣告來源';
            $data['brands'] = $this->Brand_model->get_by(array('deleted'=>False));
            $this->load->view('templates/header', $data);
            $this->load->view('ad_source/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with ad_source request
            $ad_source_name = $this->input->post('ad_source_name');
            $brand_id = $this->session->userdata('brand_id');
            
            // Check if ad_source model is unique with its name and brand
            $result = $this->Ad_source_model->get_by(array('ad_source_name'=>$ad_source_name,
                                                          'brand_id'=>$brand_id));
            if($result) {
                add_flash_message('alert', '廣告來源重覆，請重新輸入。');
                redirect('ad_source/view');
            }
            
            $result = $this->Ad_source_model->create(array('ad_source_name'=>$ad_source_name,
                                                          'brand_id'=>$brand_id,
                                                          'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '廣告來源已新增。');
            } else {
                add_flash_message('alert', '廣告來源不能新增，請聯絡系統管理員。');
            }
            redirect('ad_source/view');
        }
    }
    
    public function edit($ad_source_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯廣告來源';
            $data['ad_source_id'] = $ad_source_id;
            $result = $this->Ad_source_model->get_by(array('ad_source_id'=>$ad_source_id));
            $data['ad_source_name'] = $result[0]->ad_source_name;
            $this->load->view('templates/header', $data);
            $this->load->view('ad_source/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $ad_source_name = $this->input->post('ad_source_name');
            $result = $this->Ad_source_model->update($ad_source_id,
                                                array('ad_source_name'=>$ad_source_name));
            if($result) {
                add_flash_message('info', '廣告來源已更改。');
            } else {
                add_flash_message('alert', '廣告來源不能更改，請聯絡系統管理員。');
            }
            redirect('ad_source/view');
        }
    }
    
    public function delete($ad_source_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Ad_source_model->update($ad_source_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '廣告來源已刪除。');
            } else {
                add_flash_message('alert', '廣告來源不能刪除，請聯絡系統管理員。');
            }
            redirect('ad_source/view');
        }
    }
    
    public function resume($ad_source_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Ad_source_model->update($ad_source_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '廣告來源已還原。');
            } else {
                add_flash_message('alert', '廣告來源不能還原，請聯絡系統管理員。');
            }
            redirect('ad_source/view');
        }
    }
}