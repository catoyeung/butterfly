<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
    }
    
	public function index(){
        $this->models();
        echo $this->unit->report();
    }
    
    // Models
    public function models() {
        $this->user_model();
    }
    
    public function user_model() {
        $this->test_users_model_get_by_id();
        $this->test_users_model_validate();
    }
    
    public function test_users_model_get_by_id() {
        // Users model
        $this->load->model('Users');
        $result = $this->Users->get_by_id(1);
        $username = $result[0]->username;
        $this->unit->run($username, 'admin', 'Model Users - get_by_id function');
    }
    
    public function test_users_model_validate() {
        $this->load->model('Users');
        $result = $this->Users->validate('admin', 'admin');
        $this->unit->run($result, TRUE, 'Model Users - validate admin');
        $logged_in_user = $this->session->userdata('logged_in_user');
        $username = $logged_in_user['username'];
        $display_name = $logged_in_user['display_name'];
        $post = $logged_in_user['post'];
        $belongs_to = $logged_in_user['belongs_to'];
        $this->unit->run($username, 'admin', 'Model Users - validate function stores username in session');
        $this->unit->run($display_name, 'Cato Yeung', 'Model Users - validate function stores display name in session');
        $this->unit->run($post, 'Programmer', 'Model Users - validate function stores post in session');
        $this->unit->run($belongs_to, 'admin', 'Model Users - validate function stores belongs_to in session');
    }
    
    // Helpers
    public function helpers() {
        
    }
    
    public function test_title_helper() {
    }
}