<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Customer_life_model');
        $this->load->model('Journal_model');
        $this->load->model('No_booking_reason_model');
        $this->load->model('No_showup_reason_model');
        $this->load->model('Stage_model');
        $this->load->model('Branch_model');
    }
    
	public function view($page = 1){
        $data = array();
        $data['title'] = '所有客戶';
        $data['page'] = $page;
        
        $data['no_booking_reasons'] = $this->No_booking_reason_model->get_all();
        $data['no_showup_reasons'] = $this->No_showup_reason_model->get_all();
        $data['branches'] = $this->Branch_model->get_all();
        
        $config = array();
        $config['brand_id'] = $this->session->userdata('brand_id');
        $customer_lives = $this->Customer_life_model->get_customer_lives($config, $page, 40);
        $latest_stages = array();
        $customer_life_ids = array();
        foreach ($customer_lives as $customer_life)
        {
            $customer_life_id = $customer_life->customer_life_id;
            $customer_life_ids[] = $customer_life_id;
            //$stages = $this->Stage_model->get_by_customer_life_id();
            //$latest_stages[$customer_life_id] = $this->Stage_model->latest_stage_by_customer_life_id($customer_life_id);
            //$customer_lives[$key]->journals = $this->Journal_model->get_by_customer_life_id($customer_life_id);
        }
        $stages = $this->Stage_model->get_by_customer_life_ids($customer_life_ids);
        $journals = $this->Journal_model->get_by_customer_life_ids($customer_life_ids);
        //print_r($stages);
        //print_r($journals);
        foreach  ($customer_lives as $key=>$customer_life) {
            $latest_stages[$customer_life->customer_life_id] = $this->Stage_model->latest_stage_by_customer_life_id($customer_life->customer_life_id);
            $customer_lives[$key]->journals = $this->journals_with_start_message($customer_life->customer_life_id,
                                                                                 $stages,
                                                                                 $journals);
        }
        $data['customer_lives'] = $customer_lives;
        $data['latest_stages'] = $latest_stages;
        $this->load->view('templates/header', $data);
        $this->load->view('customer/view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    private function journals_with_start_message($customer_life_id, $stages, $journals)
    {
        $count = 1;
        $new_journals = array();
        foreach ($stages as $stage)
        {
            if ($customer_life_id != $stage->customer_life_id)
            {
                continue;
            }
            $new_journal = array('is_stage_description'=>True,
                         'count'=>'',
                         'text'=>$stage->start_message);
            $new_journals[] = $new_journal;
            foreach ($journals as $journal)
            {
                if ($journal->stage_id == $stage->stage_id)
                {
                    $new_journal = array('is_stage_description'=>False,
                                'count'=>$count,
                                 'text'=>$this->journal_reason_category($journal).'，'.$journal->details);
                    $count++;
                    $new_journals[] = $new_journal;
                } else {
                    continue;
                }
            }
            
        }
        return $new_journals;
    }
    
    private function journal_reason_category($journal)
    {
        if ($journal->no_booking_reason_category != '')
            return $journal->no_booking_reason_category;
        if ($journal->no_showup_reason_category != '')
            return $journal->no_showup_reason_category;
        return '';
    }
}