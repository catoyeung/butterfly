<?php
class Customer_model extends CI_Model {

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
        return $this->db->insert('Customer', $raw);
    }
    
    public function update($customer_id, $raw)
    {
        $this->db->where('customer_id', $customer_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Customer', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Customer', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('Customer.customer_id,
                          Customer.customer_name,
                          Customer.deleted,
                          Brand.brand_id,
                          Brand.brand_name');
        $this->db->from('Customer');
        $this->db->join('Brand', 'Customer.brand_id = Brand.brand_id');
        $query = $this->db->get();
        return $query->result();
    }
}