<?php
class Therapy_model extends CI_Model {

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
        return $this->db->insert('Therapy', $raw);
    }
    
    public function update($therapy_id, $raw)
    {
        $this->db->where('therapy_id', $therapy_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Therapy', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Therapy', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('Therapy.therapy_id,
                          Therapy.therapy_name,
                          Therapy.deleted,
                          Brand.brand_id,
                          Brand.brand_name');
        $this->db->from('Therapy');
        $this->db->join('Brand', 'Therapy.brand_id = Brand.brand_id');
        $query = $this->db->get();
        return $query->result();
    }
}