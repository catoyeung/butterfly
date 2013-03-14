<?php
class Notice_model extends CI_Model {

    protected $notice_id;
    protected $title;
    protected $content;
    protected $created_by_user;
    protected $deleted;
    protected $created_at;
    protected $updated_at;

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function create($raw)
    {
        $query = $this->db->insert('Notice', array('title' => $raw['title'],
                                                   'content' => $raw['content'],
                                                   'created_by_user' => $raw['created_by_user'],
                                                   'deleted' => FALSE,
                                                   'created_at' => $raw['created_at'],
                                                   'updated_at' => isset($raw['updated_at']) ? $raw['updated_at']:''));
        return $query;
    }
    
    public function get_all()
    {
        $this->db->select('Notice.*, Users.display_name');
        $this->db->from('Notice');
        $this->db->join('Users', 'Users.user_id = Notice.created_by_user');
        $query = $this->db->get();
        return $query->result();
    }
}