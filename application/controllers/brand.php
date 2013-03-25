<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Brand_model');
    }
    
    public function view() {
        $data = array();
        $data['title'] = '品牌管理';
        $data['brands'] = $this->Brand_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('brand/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增品牌';
            $this->load->view('templates/header', $data);
            $this->load->view('brand/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with brand request
            $brand_name = $this->input->post('brand_name');
            $result = $this->Brand_model->create(array('brand_name'=>$brand_name,
                                                       'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '品牌已新增。');
            } else {
                add_flash_message('alert', '品牌不能新增，請聯絡系統管理員。');
            }
            redirect('brand/view');
        }
    }
    
    public function edit($brand_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯用戶身份';
            $data['brand_id'] = $brand_id;
            $result = $this->Brand_model->get_by(array('brand_id'=>$brand_id));
            $data['brand_name'] = $result[0]->brand_name;
            $this->load->view('templates/header', $data);
            $this->load->view('brand/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $brand_name = $this->input->post('brand_name');
            $result = $this->Brand_model->update($brand_id,
                                                array('brand_name'=>$brand_name));
            if($result) {
                add_flash_message('info', '品牌已更改。');
            } else {
                add_flash_message('alert', '品牌不能更改，請聯絡系統管理員。');
            }
            redirect('brand/view');
        }
    }
    
    public function delete($brand_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Brand_model->update($brand_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '品牌已刪除。');
            } else {
                add_flash_message('alert', '品牌不能刪除，請聯絡系統管理員。');
            }
            redirect('brand/view');
        }
    }
    
    public function resume($brand_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->Brand_model->update($brand_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '品牌已還原。');
            } else {
                add_flash_message('alert', '品牌不能還原，請聯絡系統管理員。');
            }
            redirect('brand/view');
        }
    }
}