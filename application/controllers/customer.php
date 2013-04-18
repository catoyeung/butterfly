<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Customer_life_model');
        $this->load->model('Journal_model');
        $this->load->model('No_booking_reason_model');
        $this->load->model('No_showup_reason_model');
        $this->load->model('No_invoice_reason_model');
        $this->load->model('Therapy_model');
        $this->load->model('Stage_model');
        $this->load->model('Branch_model');
    }
    
	public function view($page = 1){
        $data = array();
        $data['title'] = '所有客戶';
        $data['page'] = $page;
        
        $data['no_booking_reasons'] = $this->No_booking_reason_model->get_all();
        $data['no_showup_reasons'] = $this->No_showup_reason_model->get_all();
        $data['no_invoice_reasons'] = $this->No_invoice_reason_model->get_all();
        $data['therapies'] = $this->Therapy_model->get_all();
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
        }
        $stages = $this->Stage_model->get_by_customer_life_ids($customer_life_ids);
        $journals = $this->Journal_model->get_by_customer_life_ids($customer_life_ids);
        foreach  ($customer_lives as $key=>$customer_life) {
            $latest_stages[$customer_life->customer_life_id] = $this->latest_stage($stages, $customer_life->customer_life_id);
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
                         'text'=>$this->stage_start_message($stage));
            $new_journals[] = $new_journal;
            foreach ($journals as $journal)
            {
                if ($journal->stage_id == $stage->stage_id)
                {
                    $new_journal = array('is_stage_description'=>False,
                                'count'=>$count,
                                 'text'=>$this->journal_reason_category($journal).'，'.$journal->details,
                                'created_by'=>$journal->display_name,
                                'created_at'=>$journal->created_at);
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
        if ($journal->no_invoice_reason_category != '')
            return $journal->no_invoice_reason_category;
        return '';
    }
    
    private function stage_start_message($stage)
    {
        if ($stage->stage_type == 'no_booking') {
            return $stage->display_name.'在'.remove_microsec($stage->created_at).'輸入客戶查詢。';
        } elseif ($stage->stage_type == 'booking') {
            return '顧客已預約，時間由'.remove_microsec($stage->booking_start_time).
                    '到'.remove_microsec($stage->booking_end_time).
                    '，分店'.$stage->booking_branch.'。';
        } elseif ($stage->stage_type == 'showup') {
            return '顧客已出席，時間'.remove_microsec($stage->showup_time).'，分店'.$stage->showup_branch.'。';
        } elseif ($stage->stage_type == 'invoice') {
            return '顧客已開單，時間'.remove_microsec($stage->invoice_time).
                    '，分店'.$stage->invoice_branch.
                    '，療程'.$stage->therapy_name.
                    '，詳情'.$stage->therapy_details.
                    '，價錢 $'.$stage->amount.
                    '，已付 $'.$stage->paid_amount.
                    '。';
        }
    }
    
    private function latest_stage($stages, $customer_life_id)
    {
        $latest_stage_time = strtotime('1970-01-01 00:00:00');
        foreach ($stages as $stage)
        {
            if ($stage->customer_life_id != $customer_life_id) continue;
            $stage_time = strtotime($stage->created_at);
            if ($stage_time > $latest_stage_time) {
                $latest_stage_time = $stage_time;
                $latest_stage = $stage;
            }
        }
        return $latest_stage;
    }
}