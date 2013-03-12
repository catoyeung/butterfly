<?php
class Users extends CI_Model {

    protected $user_id;
    protected $username;
    protected $password;
    protected $display_name;
    protected $post;
    protected $deleted;
    protected $inactive;

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function load_by_id($user_id)
    {
        $query = $this->db->get_where('Users', array('user_id' => $user_id));
        return $query->result();
    }
}
?>