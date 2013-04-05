<?php
class Staff_model extends CI_Model {

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
        if (!isset($raw['deleted'])) {
            $raw['deleted'] = False;
        }
        if (!isset($raw['inactive'])) {
            $raw['inactive'] = False;
        }
        return $this->db->insert('Staff', $raw);
    }
    
    public function update($staff_id, $raw)
    {
        $this->db->where('staff_id', $staff_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Staff', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Staff', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('Staff.*, Post.post_name');
        $this->db->from('Staff');
        $this->db->join('Post', 'Staff.post_id = Post.post_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_cs()
    {
        $this->db->select('Staff.staff_id,
                          Staff.display_name,
                          Staff.post_id,
                          Post.post_name');
        $this->db->from('Staff');
        $this->db->join('Post', 'Staff.post_id = Post.post_id');
        $this->db->where('Post.post_name', 'Customer Service');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_consultants()
    {
        $this->db->select('Staff.staff_id,
                          Staff.display_name,
                          Staff.post_id,
                          Post.post_name');
        $this->db->from('Staff');
        $this->db->join('Post', 'Staff.post_id = Post.post_id');
        $this->db->where('Post.post_name', 'Consultant');
        $query = $this->db->get();
        return $query->result();
    }
}
?>