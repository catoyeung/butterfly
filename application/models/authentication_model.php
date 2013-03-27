<?php

class Authentication_model extends CI_Model {
    
    protected $valiated_user;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Staff_model');
    }
    
    public function encrypt($password)
    {
        return md5($password);
    }
    
    public function validate($username, $password)
    {
        $result = $this->Staff_model->get_by(array('username'=>$username,
                                                      'password'=>$this->encrypt($password)));
        if (count($result)>0) {
            return $result[0];
        }
        return False;
    }
    
    public function store_user_in_session($validated_user)
    {
        $logged_in_user = array('staff_id'=>$validated_user->staff_id,
                                'username'=>$validated_user->username,
                                'display_name'=>$validated_user->display_name,
                                'post_id'=>$validated_user->post_id);
        $this->session->set_userdata(array('logged_in_user'=>$logged_in_user));
    }
    
    public function store_brand_id_in_session($brand_id)
    {
        $this->session->set_userdata('brand_id', $brand_id);
    }
    
    public function user_is_logged_in()
    {
        $logged_in_user = $this->session->userdata('logged_in_user');
        if (!empty($logged_in_user)) return True;
        else return False;
    }
}