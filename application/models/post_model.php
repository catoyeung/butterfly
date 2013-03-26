<?php
class Post_model extends CI_Model {

    protected $post_id;
    protected $post_name;

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
        return $this->db->insert('Post', $raw);
    }
    
    public function update($post_id, $raw)
    {
        $this->db->where('post_id', $post_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Post', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Post', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('Post');
        $query = $this->db->get();
        return $query->result();
    }
}