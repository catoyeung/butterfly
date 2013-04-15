<?php
class Branch_model extends CI_Model {

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
        return $this->db->insert('Branch', $raw);
    }
    
    public function update($branch_id, $raw)
    {
        $this->db->where('branch_id', $branch_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Branch', $raw); 
    }
    
    public function get_by($pairs)
    {
        $brand_id = $this->session->userdata('brand_id');
        $this->db->from('Branch');
        $this->db->where($pairs);
        $this->db->where('brand_id', $brand_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all()
    {
        $brand_id = $this->session->userdata('brand_id');
        $this->db->select('Branch.branch_id,
                          Branch.branch_name,
                          Branch.district_id,
                          Branch.deleted,
                          District.district_name');
        $this->db->from('Branch');
        $this->db->join('District', 'Branch.district_id = District.district_id');
        $this->db->where('Branch.brand_id', $brand_id);
        $query = $this->db->get();
        return $query->result();
    }
}