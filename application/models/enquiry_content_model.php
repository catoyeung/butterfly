<?php
class Enquiry_content_model extends CI_Model {

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
        return $this->db->insert('Enquiry_content', $raw);
    }
    
    public function update($enquiry_content_id, $raw)
    {
        $this->db->where('enquiry_content_id', $enquiry_content_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Enquiry_content', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Enquiry_content', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('Enquiry_content.enquiry_content_id,
                          Enquiry_content.enquiry_content_name,
                          Enquiry_content.deleted,
                          Brand.brand_id,
                          Brand.brand_name');
        $this->db->from('Enquiry_content');
        $this->db->join('Brand', 'Enquiry_content.brand_id = Brand.brand_id');
        $query = $this->db->get();
        return $query->result();
    }
}