<?php
class Treatment_type_model extends CI_Model {

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
        return $this->db->insert('Treatment_type', $raw);
    }
    
    public function update($treatment_type_id, $raw)
    {
        $this->db->where('treatment_type_id', $treatment_type_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Treatment_type', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Treatment_type', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('Treatment_type.treatment_type_id,
                          Treatment_type.treatment_type_name,
                          Treatment_type.deleted,
                          Brand.brand_id,
                          Brand.brand_name');
        $this->db->from('Treatment_type');
        $this->db->join('Brand', 'Treatment_type.brand_id = Brand.brand_id');
        $query = $this->db->get();
        return $query->result();
    }
}