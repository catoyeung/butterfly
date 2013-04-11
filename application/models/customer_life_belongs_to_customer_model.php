<?php
class Customer_life_belongs_to_customer_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function create($raw)
    {
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $this->db->insert('Customer_life_belongs_to_customer', $raw);
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Customer_life_belongs_to_customer', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('Customer_life_belongs_to_customer');
        $query = $this->db->get();
        return $query->result();
    }
}
?>