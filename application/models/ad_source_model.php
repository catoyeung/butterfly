<?php
class Ad_source_model extends CI_Model {

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
        return $this->db->insert('Ad_source', $raw);
    }
    
    public function update($ad_source_id, $raw)
    {
        $this->db->where('ad_source_id', $ad_source_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Ad_source', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Ad_source', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('Ad_source.ad_source_id,
                          Ad_source.ad_source_name,
                          Ad_source.deleted,
                          Brand.brand_id,
                          Brand.brand_name');
        $this->db->from('Ad_source');
        $this->db->join('Brand', 'Ad_source.brand_id = Brand.brand_id');
        $query = $this->db->get();
        return $query->result();
    }
}