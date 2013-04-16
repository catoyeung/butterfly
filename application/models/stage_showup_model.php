<?php
class Stage_showup_model extends CI_Model {

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
        return $this->db->insert('Stage_showup', $raw);
    }
    
    public function update($stage_showup_id, $raw)
    {
        $this->db->where('stage_showup_id', $stage_booking_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        return $this->db->update('Stage_showup', $raw); 
    }
}