<?php
class Notice_model extends CI_Model {

    protected $notice_id;
    protected $title;
    protected $content;
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
                                                   'created_at' => $raw['created_at'],
                                                   'updated_at' => isset($raw['updated_at']) ? $raw['updated_at']:''));
        return $query;
    }
}