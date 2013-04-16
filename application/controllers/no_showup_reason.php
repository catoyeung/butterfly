<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class No_showup_reason extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('No_showup_reason_model');
    }
    
    public function view() {
        $data = array();
        $data['title'] = '不出席原因管理';
        $data['no_showup_reasons'] = $this->No_showup_reason_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('no_showup_reason/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            // user access notice create form
            $data['title'] = '新增不出席原因';
            $this->load->view('templates/header', $data);
            $this->load->view('no_showup_reason/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with no_showup_reason request
            $details = $this->input->post('details');
            $sequence = $this->input->post('sequence');
            $brand_id = $this->session->userdata('brand_id');
            $result = $this->No_showup_reason_model->create(array(
                                                       'sequence'=>$sequence,
                                                       'details'=>$details,
                                                       'brand_id'=>$brand_id,
                                                       'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '不出席原因已新增。');
            } else {
                add_flash_message('alert', '不出席原因不能新增，請聯絡系統管理員。');
            }
            redirect('no_showup_reason/view');
        }
    }
    
    public function edit($no_showup_reason_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data['title'] = '編輯不出席原因';
            $data['no_showup_reason_id'] = $no_showup_reason_id;
            $result = $this->No_showup_reason_model->get_by(array('no_showup_reason_id'=>$no_showup_reason_id));
            $data['details'] = $result[0]->details;
            $data['sequence'] = $result[0]->sequence;
            $this->load->view('templates/header', $data);
            $this->load->view('no_showup_reason/edit', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $details = $this->input->post('details');
            $sequence = $this->input->post('sequence');
            $result = $this->No_showup_reason_model->update($no_showup_reason_id,
                                                array('details'=>$details,
                                                      'sequence'=>$sequence));
            if($result) {
                add_flash_message('info', '不出席原因已更改。');
            } else {
                add_flash_message('alert', '不出席原因不能更改，請聯絡系統管理員。');
            }
            redirect('no_showup_reason/view');
        }
    }
    
    public function delete($no_showup_reason_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->No_showup_reason_model->update($no_showup_reason_id,
                                                array('deleted'=>true));
            if($result) {
                add_flash_message('info', '不出席原因已刪除。');
            } else {
                add_flash_message('alert', '不出席原因不能刪除，請聯絡系統管理員。');
            }
            redirect('no_showup_reason/view');
        }
    }
    
    public function resume($no_showup_reason_id) {
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $result = $this->No_showup_reason_model->update($no_showup_reason_id,
                                                array('deleted'=>false));
            if($result) {
                add_flash_message('info', '不出席原因已還原。');
            } else {
                add_flash_message('alert', '不出席原因不能還原，請聯絡系統管理員。');
            }
            redirect('no_showup_reason/view');
        }
    }
}