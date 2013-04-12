<?php
class No_booking_reason_model extends CI_Model {

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
        if (!isset($raw['deleted'])) {
            $raw['deleted'] = False;
        }
        return $this->db->insert('No_booking_reason', $raw);
    }
    
    public function update($no_booking_reason_id, $raw)
    {
        $this->db->where('no_booking_reason_id', $no_booking_reason_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('No_booking_reason', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('No_booking_reason', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('No_booking_reason');
        $this->db->order_by('sequence', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}