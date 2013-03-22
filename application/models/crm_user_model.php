<?php
class Crm_User_model extends CI_Model {

    protected $crm_user_id;
    protected $username;
    protected $password;
    protected $display_name;
    protected $post;
    protected $belongs_to;
    protected $deleted;
    protected $inactive;

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
        $this->db->insert('Crm_user', $raw);
    }
    
    public function update($crm_user_id, $raw)
    {
        $this->db->where('crm_user_id', $crm_user_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $this->db->update('Crm_user', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Crm_user', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('Crm_user.*, Post.post_name');
        $this->db->from('Crm_user');
        $this->db->join('Post', 'Crm_user.post_id = Post.post_id');
        $query = $this->db->get();
        return $query->result();
    }
}
?>