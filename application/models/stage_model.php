<?php
class Stage_model extends CI_Model {

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
        return $this->db->insert('Stage', $raw);
    }
    
    public function update($stage_id, $raw)
    {
        $this->db->where('stage_id', $stage_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Stage', $raw); 
    }
    
    public function latest_stage_by_customer_life_id($customer_life_id)
    {
        $this->db->select('stage_id,
                          stage_type');
        $this->db->from('Stage');
        $this->db->where('customer_life_id', $customer_life_id);
        $this->db->order_by('created_at','ASC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        $result = $query->result();
        // remove microseconds
        return $result[0];
    }
}