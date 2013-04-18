<?php
class Stage_invoice_model extends CI_Model {

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
        return $this->db->insert('Stage_invoice', $raw);
    }
    
    public function get_by($pairs)
    {
        $this->db->from('Stage_invoice');
        $this->db->where($pairs);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update($stage_id, $raw)
    {
        $this->db->where('stage_id', $stage_id);
        $this->db->update('Stage', array('updated_at'=>microtime_to_mssql_time(microtime()))); 
        $this->db->where('stage_id', $stage_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        return $this->db->update('Stage_invoice', $raw); 
    }
}