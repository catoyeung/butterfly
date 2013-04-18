<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Journal_model');
        $this->load->model('Journal_no_booking_model');
        $this->load->model('Journal_no_showup_model');
        $this->load->model('Journal_no_invoice_model');
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            // user create form with post request
            $this->db->trans_start();
            $brand_id = $this->session->userdata('brand_id');
            $journal_type = $this->input->post('journal_type');
            $stage_id = $this->input->post('stage_id');
            $reason_id = $this->input->post('reason_id');
            $details = $this->input->post('details');
            
            $result = $this->Journal_model->create(array('stage_id'=>$stage_id,
                                                      'details'=>$details,
                                        ));
            $journal_id = $this->db->insert_id();
            if ($journal_type == 'no_booking')
            {
                $result = $this->Journal_no_booking_model->create(array('journal_id'=>$journal_id,
                                                          'no_booking_reason_id'=>$reason_id,
                                            ));
            } elseif ($journal_type == 'no_showup')
            {
                $result = $this->Journal_no_showup_model->create(array('journal_id'=>$journal_id,
                                                          'no_showup_reason_id'=>$reason_id,
                                            ));
            } elseif ($journal_type == 'no_invoice')
            {
                $result = $this->Journal_no_invoice_model->create(array('journal_id'=>$journal_id,
                                                          'no_invoice_reason_id'=>$reason_id,
                                            ));
            }
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '紀錄已新增。');
            } else {
                add_flash_message('alert', '紀錄不能新增，請聯絡系統管理員。');
            }
            $redirect = $this->input->post('redirect');
            redirect($redirect);
        }
    }
}