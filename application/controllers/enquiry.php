<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Brand_model');
        $this->load->model('District_model');
        $this->load->model('Enquiry_content_model');
        $this->load->model('Ad_source_model');
        $this->load->model('Customer_model');
        $this->load->model('Customer_life_model');
        $this->load->model('Stage_model');
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data = array();
            $data['title'] = '輸入查詢';
            $data['brands'] = $this->Brand_model->get_by(array('deleted'=>False));
            $data['districts'] = $this->District_model->get_by(array('deleted'=>False));
            $data['enquiry_contents'] = $this->Enquiry_content_model->get_by(array('deleted'=>False));
            $data['ad_sources'] = $this->Ad_source_model->get_by(array('deleted'=>False));
            $data['customer_services'] = $this->Staff_model->get_all_cs();
            $data['consultants'] = $this->Staff_model->get_all_consultants();
            $this->load->view('templates/header', $data);
            $this->load->view('enquiry/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $phone_no = $this->input->post('phone_no');
            $name = $this->input->post('name');
            $age = $this->input->post('age');
            $email = $this->input->post('email');
            $district_id = $this->input->post('district_id');
            $brand_id = $this->session->userdata('brand_id');
            $enquiry_content_id = $this->input->post('enquiry_content_id');
            $ad_source_id = $this->input->post('ad_source_id');
            $customer_service_id = $this->input->post('customer_service_id');
            $consultant_id = $this->input->post('consultant_id');
            $this->db->trans_start();
            $this->Customer_model->create(array('name'=>$name,
                                                          'phone_no'=>$phone_no,
                                                          'age'=>$age,
                                                          'email'=>$email,
                                                          'district_id'=>$district_id,
                                                          'brand_id'=>$brand_id
                                                          )
                                        );
            $customer_id = $this->db->insert_id();
            $this->Customer_life_model->create(array('customer_id'=>$customer_id,
                                                          'enquiry_content_id'=>$enquiry_content_id,
                                                          'ad_source_id'=>$ad_source_id,
                                                          'responsible_cs_id'=>$customer_service_id,
                                                          'responsible_consultant_id'=>$consultant_id
                                                          ));
            $customer_life_id = $this->db->insert_id();
            $logged_in_user = $this->session->userdata('logged_in_user');
            $user_display_name = $logged_in_user['display_name'];
            $start_message = $user_display_name.'在'.remove_microsec(microtime_to_mssql_time(microtime())).'人手輸入客戶查詢。';
            $this->Stage_model->create(array('stage_type'=>'no_booking',
                                             'customer_life_id'=>$customer_life_id,
                                             'start_message'=>$start_message));
            $this->db->trans_complete();
            if($this->db->trans_status() === True) {
                add_flash_message('info', '用戶查詢已新增。');
            } else {
                add_flash_message('alert', '用戶查詢不能新增，請聯絡系統管理員。');
            }
            redirect('enquiry/create');
        }
    }
}