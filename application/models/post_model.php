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
        $this->db->insert('Post', array('post_name' => $this->db->escape_str($raw['post_name']),
                                        'created_at' => $this->db->escape_str($raw['created_at'])));
    }
    
    public function update($post_id, $raw)
    {
        $this->db->where('post_id', $post_id);
        $this->db->update('Post', $raw); 
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