<?php
class Stage_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function create($raw)
    {
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        if (!isset($raw['created_at'])) {
            $raw['created_at'] = microtime_to_mssql_time(microtime());
        }
        if (!isset($raw['deleted'])) {
            $raw['deleted'] = False;
        }
        return $this->db->insert('Stage', $raw);
    }
    
    public function update($stage_id, $raw)
    {
        $this->db->where('stage_id', $stage_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Stage', $raw); 
    }
    
    public function get_by($pairs)
    {
        $this->db->from('Stage');
        $this->db->where($pairs);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_by_customer_life_ids($customer_life_ids)
    {
        /*$this->db->select('stage_id,
                          stage_type,
                          start_message,
                          Customer_life.customer_life_id');
        $this->db->from('Stage');
        $this->db->join('Customer_life', 'Customer_life.customer_life_id=Stage.customer_life_id');*/
        $this->db->select('Stage.stage_id,
                          Stage.stage_type,
                          Stage.start_message,
                          Stage.created_at,
                          Customer_life.customer_life_id,
                          Staff.display_name,
                          Stage_booking.booking_date,
                          Stage_booking.booking_start_time,
                          Stage_booking.booking_end_time,
                          Booking_branch.branch_name as booking_branch,
                          Stage_showup.showup_date,
                          Stage_showup.showup_time,
                          Showup_branch.branch_name as showup_branch,
                          Stage_invoice.invoice_date,
                          Stage_invoice.invoice_time,
                          Invoice_branch.branch_name as invoice_branch,
                          Therapy.therapy_name,
                          Stage_invoice.therapy_details,
                          Stage_invoice.amount,
                          Stage_invoice.paid_amount
                          ');
        $this->db->from('Stage');
        $this->db->join('Customer_life', 'Customer_life.customer_life_id=Stage.customer_life_id');
        $this->db->join('Staff', 'Staff.staff_id=Stage.created_by');
        $this->db->join('Stage_booking', 'Stage_booking.stage_id=Stage.stage_id', 'left');
        $this->db->join('Branch as Booking_branch', 'Booking_branch.branch_id=Stage_booking.branch_id', 'left');
        $this->db->join('Stage_showup', 'Stage_showup.stage_id=Stage.stage_id', 'left');
        $this->db->join('Branch as Showup_branch', 'Showup_branch.branch_id=Stage_showup.branch_id', 'left');
        $this->db->join('Stage_invoice', 'Stage_invoice.stage_id=Stage.stage_id', 'left');
        $this->db->join('Branch as Invoice_branch', 'Invoice_branch.branch_id=Stage_invoice.invoice_branch_id', 'left');
        $this->db->join('Therapy', 'Therapy.therapy_id=Stage_invoice.therapy_id', 'left');
        foreach ($customer_life_ids as $customer_life_id)
        {
            $this->db->or_where('Stage.customer_life_id', $customer_life_id);
        }
        $this->db->order_by('Customer_life.created_at','DESC');
        $this->db->order_by('Stage.created_at','ASC');
        $query = $this->db->get();
        return $query->result();
    }
    
    /*public function latest_stage_by_customer_life_id($customer_life_id)
    {
        $this->db->select('Stage.stage_id,
                          Stage.stage_type,
                          Stage.start_message,
                          Stage_booking.booking_date,
                          Stage_booking.booking_start_time,
                          Stage_booking.booking_end_time,
                          Booking_branch.branch_name as booking_branch,
                          Stage_showup.showup_date,
                          Stage_showup.showup_time,
                          Showup_branch.branch_name as showup_branch,
                          Stage_invoice.invoice_date,
                          Stage_invoice.invoice_time,
                          Invoice_branch.branch_name as invoice_branch,
                          Therapy.therapy_name,
                          Stage_invoice.therapy_details,
                          Stage_invoice.amount,
                          Stage_invoice.paid_amount
                          ');
        $this->db->from('Stage');
        $this->db->join('Stage_booking', 'Stage_booking.stage_id=Stage.stage_id', 'left');
        $this->db->join('Branch as Booking_branch', 'Booking_branch.branch_id=Stage_booking.branch_id', 'left');
        $this->db->join('Stage_showup', 'Stage_showup.stage_id=Stage.stage_id', 'left');
        $this->db->join('Branch as Showup_branch', 'Showup_branch.branch_id=Stage_showup.branch_id', 'left');
        $this->db->join('Stage_invoice', 'Stage_invoice.stage_id=Stage.stage_id', 'left');
        $this->db->join('Branch as Invoice_branch', 'Invoice_branch.branch_id=Stage_invoice.invoice_branch_id', 'left');
        $this->db->join('Therapy', 'Therapy.therapy_id=Stage_invoice.therapy_id', 'left');
        
        $this->db->where('customer_life_id', $customer_life_id);
        $this->db->order_by('Stage.created_at','DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        $result = $query->result();
        // remove microseconds
        return $result[0];
    }*/
}