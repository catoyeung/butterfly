<?php
class Stage_booking_model extends CI_Model {

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
        return $this->db->insert('Stage_booking', $raw);
    }
    
    public function update($stage_booking_id, $raw)
    {
        $this->db->where('stage_booking_id', $stage_booking_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        return $this->db->update('Stage_booking', $raw); 
    }
}