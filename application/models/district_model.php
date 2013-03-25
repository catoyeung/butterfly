<?php
class District_model extends CI_Model {

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
        return $this->db->insert('District', $raw);
    }
    
    public function update($district_id, $raw)
    {
        $this->db->where('district_id', $district_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('District', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('District', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('District.district_id,
                          District.district_name,
                          District.deleted,
                          Brand.brand_id,
                          Brand.brand_name');
        $this->db->from('District');
        $this->db->join('Brand', 'District.brand_id = Brand.brand_id');
        $query = $this->db->get();
        return $query->result();
    }
}