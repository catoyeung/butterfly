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
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Crm_user', $pairs);
        return $query->result();
    }
}
?>