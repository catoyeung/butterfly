<?php

class Authentication_model extends CI_Model {
    
    protected $valiated_user;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Crm_user_model');
    }
    
    public function validate($username, $password)
    {
        $result = $this->Crm_user_model->get_by(array('username'=>$username,
                                                      'password'=>$password));
        if (count($result)>0) {
            $this->validated_user = $result[0];
            return True;
        }
        return False;
    }
    
    public function store_user_in_session()
    {
        $validated_user = $this->validated_user;
        $logged_in_user = array('user_id'=>$validated_user->user_id,
                                'username'=>$validated_user->username,
                                'display_name'=>$validated_user->display_name,
                                'post'=>$validated_user->post);
        $this->session->set_userdata(array('logged_in_user'=>$logged_in_user));
    }
    
    public function user_is_logged_in()
    {
        $logged_in_user = $this->session->userdata('logged_in_user');
        if (!empty($logged_in_user)) return True;
        else return False;
    }
}