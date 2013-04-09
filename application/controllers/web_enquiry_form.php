<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_enquiry_form extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('District_model');
        $this->load->model('Ad_source_model');
        $this->load->model('Enquiry_content_model');
        $this->load->model('Web_enquiry_form_model');
    }
    
    public function view($page = 1) {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data = array();
            $data['title'] = '網頁查詢';
            /* start of pagination */
            $this->load->library('pagination');
            $config['base_url'] = base_url().'web_enquiry_form/view/';
            
            $brand_id = $this->session->userdata('brand_id');
            $config['total_rows'] = $this->Web_enquiry_form_model->count_by(array('brand_id'=>$brand_id));
            $config['per_page'] = 20;
            $config['use_page_numbers'] = TRUE;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config); 
            /* end of pagination */
            
            $data['districts'] = $this->District_model->get_all('');
            $data['ad_sources'] = $this->Ad_source_model->get_all('');
            $data['enquiry_contents'] = $this->Enquiry_content_model->get_all('');
            $result = $this->Web_enquiry_form_model->get_twenty_entries($page);
            $data['web_enquiry_forms'] = $result;
            $this->load->view('templates/header', $data);
            $this->load->view('web_enquiry_form/view', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    
    public function create() {
        if ($this->input->server('REQUEST_METHOD')=='GET') {
            $data = array();
            $data['title'] = '新增網頁查詢';
            $data['districts'] = $this->District_model->get_all('');
            $data['ad_sources'] = $this->Ad_source_model->get_all('');
            $data['enquiry_contents'] = $this->Enquiry_content_model->get_all('');
            $this->load->view('templates/header', $data);
            $this->load->view('web_enquiry_form/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($this->input->server('REQUEST_METHOD')=='POST') {
            $customer_name = $this->input->post('name');
            $customer_phone_no = $this->input->post('phone_no');
            $customer_age = $this->input->post('age');
            $customer_email = $this->input->post('email');
            $district_id = $this->input->post('district_id');
            $enquiry_content_id = $this->input->post('enquiry_content_id');
            $questions = $this->input->post('questions');
            $brand_id = $this->session->userdata('brand_id');
            $result = $this->Web_enquiry_form_model->create(array(
                                                       'brand_id'=>$brand_id,
                                                       'customer_name'=>$customer_name,
                                                       'customer_phone_no'=>$customer_phone_no,
                                                       'customer_age'=>$customer_age,
                                                       'customer_email'=>$customer_email,
                                                       'district_id'=>$district_id,
                                                       'enquiry_content_id'=>$enquiry_content_id,
                                                       'questions'=>$questions));
            if($result) {
                add_flash_message('info', '網頁查詢已新增。');
            } else {
                add_flash_message('alert', '網頁查詢不能新增，請聯絡系統管理員。');
            }
            redirect('web_enquiry_form/view');
        }
    }
    
    public function approve() {
        
    }
}