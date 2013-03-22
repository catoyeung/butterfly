<?php
class Crm_user_belongs_to_brand_model extends CI_Model {

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
        $this->db->insert('Crm_user_belongs_to_brand', $raw);
    }
    
    /*public function update($crm_user_belongs_to_brand_id, $raw)
    {
        $this->db->where('crm_user_belongs_to_brand_id', $crm_user_belongs_to_brand_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $this->db->update('Crm_user_belongs_to_brand', $raw); 
    }*/
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Crm_user_belongs_to_brand', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('Crm_user_belongs_to_brand');
        $query = $this->db->get();
        return $query->result();
    }
}
?>