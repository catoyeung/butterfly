<?php
class Brand_model extends CI_Model {

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
        return $this->db->insert('Brand', $raw);
    }
    
    public function update($brand_id, $raw)
    {
        $this->db->where('brand_id', $brand_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Brand', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Brand', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('Brand');
        $query = $this->db->get();
        return $query->result();
    }
}