<?php
class Customer_life_model extends CI_Model {

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
        return $this->db->insert('Customer_life', $raw);
    }
    
    public function update($customer_life_id, $raw)
    {
        $this->db->where('customer_life_id', $customer_life_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Customer_life', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Customer_life', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('Customer_life.customer_life_id,
                          Customer_life.customer_life_name,
                          Customer_life.deleted,
                          Brand.brand_id,
                          Brand.brand_name');
        $this->db->from('Customer_life');
        $this->db->join('Brand', 'Customer_life.brand_id = Brand.brand_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_customer_lives($config, $page, $limit)
    {
        $offset = ($page - 1) * $limit;
        $this->db->select('Customer.customer_id,
                           Customer.name as customer_name,
                           Customer.phone_no as customer_phone_no,
                           Customer.age as customer_age,
                           Customer.email as customer_email,
                           Customer_life.created_at,
                           District.district_name,
                           Enquiry_content.enquiry_content_name,
                           Customer_service.display_name as cs_name,
                           Consultant.display_name as consultant_name,
                           Ad_source.ad_source_name,
                           Customer_life.customer_life_id,');
        $this->db->from('Customer');
        $this->db->join('District', 'Customer.district_id = District.district_id');
        $this->db->join('Customer_life_belongs_to_customer', 'Customer_life_belongs_to_customer.customer_id = Customer.customer_id');
        $this->db->join('Customer_life', 'Customer_life.customer_life_id = Customer_life_belongs_to_customer.customer_life_id');
        $this->db->join('Enquiry_content', 'Enquiry_content.enquiry_content_id = Customer_life.enquiry_content_id');
        $this->db->join('Ad_source', 'Ad_source.ad_source_id = Customer_life.ad_source_id');
        $this->db->join('Staff as Customer_service', 'Customer_service.staff_id = Customer_life.responsible_cs_id', 'left');
        $this->db->join('Staff as Consultant', 'Consultant.staff_id = Customer_life.responsible_consultant_id', 'left');
        $this->db->where('Customer.brand_id', $config['brand_id']);
        $this->db->where('Customer_life.deleted', False);
        $this->db->order_by('Customer_life.created_at','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $result = $query->result();
        // remove microseconds
        foreach($result as $key=>$row)
        {
            $result[$key]->created_at = remove_microsec($row->created_at);
        }
        return $result;
    }
}