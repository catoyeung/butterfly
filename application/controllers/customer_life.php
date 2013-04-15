<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_life extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Stage_model');
        $this->load->model('Stage_booking_model');
    }
    
    public function book($customer_life_id) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $date = $this->input->post('date');
            $start_time = $this->input->post('start_time');
            $end_time = $this->input->post('end_time');
            $this->db->trans_start();
            $start_message = '顧客已預約，時間'.$date.'由'.$start_time.'到'.$end_time.'，分店朗豪坊。';
            $this->Stage_model->create(array('stage_type'=>'booking',
                                             'customer_life_id'=>$customer_life_id,
                                             'start_message'=>$start_message));
            $stage_id = $this->db->insert_id();
            $this->Stage_booking_model->create(array('stage_id'=>$stage_id,
                                             'booking_date'=>$date,
                                             'booking_start_time'=>$start_time,
                                             'booking_end_time'=>$end_time));
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
}