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
    
    public function get_by_customer_life_ids($customer_life_ids)
    {
        $this->db->select('stage_id,
                          stage_type,
                          start_message,
                          Customer_life.customer_life_id');
        $this->db->from('Stage');
        $this->db->join('Customer_life', 'Customer_life.customer_life_id=Stage.customer_life_id');
        foreach ($customer_life_ids as $customer_life_id)
        {
            $this->db->or_where('Stage.customer_life_id', $customer_life_id);
        }
        $this->db->order_by('Customer_life.created_at','DESC');
        $this->db->order_by('Stage.created_at','ASC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function latest_stage_by_customer_life_id($customer_life_id)
    {
        $this->db->select('stage_id,
                          stage_type,
                          start_message,');
        $this->db->from('Stage');
        $this->db->where('customer_life_id', $customer_life_id);
        $this->db->order_by('created_at','DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        $result = $query->result();
        // remove microseconds
        return $result[0];
    }
}