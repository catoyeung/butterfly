<?php
class Users extends CI_Model {

    protected $user_id;
    protected $username;
    protected $password;
    protected $display_name;
    protected $post;
    protected $belongs_to;
    protected $deleted;
    protected $inactive;

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function get_by_id($user_id)
    {
        $query = $this->db->get_where('Users', array('user_id' => $user_id));
        return $query->result();
    }
    
    public function validate($username, $password)
    {
        $query = $this->db->get_where('Users', array('username' => $username,
                                                     'password' => $password));
        $result = $query->result();
        if (count($result) >= 1) {
            $this->load->library('session');
            $logged_in_user = array('username'=> $result[0]->username,
                                    'display_name'=> $result[0]->display_name,
                                    'post'=> $result[0]->post,
                                    'belongs_to'=>$result[0]->belongs_to);
            $this->session->set_userdata(array('logged_in_user'=>$logged_in_user));
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>