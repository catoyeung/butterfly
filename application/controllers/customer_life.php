<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_life extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Stage_model');
        $this->load->model('Stage_booking_model');
        $this->load->model('Stage_showup_model');
        $this->load->model('Branch_model');
    }
    
    public function book($customer_life_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $date = $this->input->post('date');
            $start_time = $this->input->post('start_time');
            $end_time = $this->input->post('end_time');
            $branch_id = $this->input->post('branch_id');
            $result = $this->Branch_model->get_by(array('branch_id'=>$branch_id));
            $branch = $result[0];
            $this->db->trans_start();
            $start_message = '顧客已預約，時間'.$date.'由'.$start_time.'到'.$end_time.'，分店'.$branch->branch_name.'。';
            $this->Stage_model->create(array('stage_type'=>'booking',
                                             'customer_life_id'=>$customer_life_id,
                                             'start_message'=>$start_message));
            $stage_id = $this->db->insert_id();
            $this->Stage_booking_model->create(array('stage_id'=>$stage_id,
                                             'booking_date'=>$date,
                                             'booking_start_time'=>combine_date_time($date, $start_time),
                                             'booking_end_time'=>combine_date_time($date, $end_time),
                                             'branch_id'=>$branch_id));
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '顧客已預約。');
            } else {
                add_flash_message('alert', '顧客不能預約，請聯絡系統管理員。');
            }
            $redirect = $this->input->post('redirect');
            redirect($redirect);
        }
    }
    
    public function showup($customer_life_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $branch_id = $this->input->post('branch_id');
            $result = $this->Branch_model->get_by(array('branch_id'=>$branch_id));
            $branch = $result[0];
            $showup_date = combine_date_time($date, '00:00');
            $showup_time = combine_date_time($date, $time);
            $this->db->trans_start();
            $start_message = '顧客已出席，時間'.$showup_time.'，分店'.$branch->branch_name.'。';
            $this->Stage_model->create(array('stage_type'=>'showup',
                                             'customer_life_id'=>$customer_life_id,
                                             'start_message'=>$start_message));
            $stage_id = $this->db->insert_id();
            $this->Stage_showup_model->create(array('stage_id'=>$stage_id,
                                             'showup_date'=>$showup_date,
                                             'showup_time'=>$showup_time,
                                             'branch_id'=>$branch_id));
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '顧客已出席。');
            } else {
                add_flash_message('alert', '顧客不能出席，請聯絡系統管理員。');
            }
            $redirect = $this->input->post('redirect');
            redirect($redirect);
        }
    }
}