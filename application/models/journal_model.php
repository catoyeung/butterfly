<?php
class Journal_model extends CI_Model {

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
        return $this->db->insert('Journal', $raw);
    }
    
    public function update($journal_id, $raw)
    {
        $this->db->where('journal_id', $journal_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Journal', $raw); 
    }
    
    public function get_by_customer_life_ids($customer_life_ids)
    {
        $this->db->select('Stage.stage_type,
                           Stage.stage_id,
                           Customer_life.customer_life_id,
                           Journal.details,
                           Journal.created_at,
                           Staff.display_name,
                           No_booking_reason.details as no_booking_reason_category,
                           No_showup_reason.details as no_showup_reason_category,
                           No_invoice_reason.details as no_invoice_reason_category');
        $this->db->from('Journal');
        $this->db->join('Stage', 'Journal.stage_id = Stage.stage_id');
        $this->db->join('Customer_life', 'Customer_life.customer_life_id = Stage.customer_life_id');
        $this->db->join('Journal_no_booking', 'Journal.journal_id = Journal_no_booking.journal_id', 'left');
        $this->db->join('No_booking_reason', 'No_booking_reason.no_booking_reason_id = Journal_no_booking.no_booking_reason_id', 'left');
        $this->db->join('Journal_no_showup', 'Journal.journal_id = Journal_no_showup.journal_id', 'left');
        $this->db->join('No_showup_reason', 'No_showup_reason.no_showup_reason_id = Journal_no_showup.no_showup_reason_id', 'left');
        $this->db->join('Journal_no_invoice', 'Journal.journal_id = Journal_no_invoice.journal_id', 'left');
        $this->db->join('No_invoice_reason', 'No_invoice_reason.no_invoice_reason_id = Journal_no_invoice.no_invoice_reason_id', 'left');
        $this->db->join('Staff', 'Staff.staff_id = Journal.created_by');
        foreach ($customer_life_ids as $customer_life_id)
        {
            $this->db->or_where('Customer_life.customer_life_id', $customer_life_id);
        }
        $this->db->order_by('Customer_life.created_at', 'DESC');
        $this->db->order_by('Stage.created_at','ASC');
        $this->db->order_by('Journal.created_at','ASC');
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key=>$row)
        {
            $result[$key]->created_at = remove_microsec($row->created_at);
        }
        return $result;
    }
}