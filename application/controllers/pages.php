<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Users');
    }
    
    public function _remap($method, $params = array()) {
        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
    
    public function index()
    {
        if ( ! file_exists('application/views/pages/home.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
         // Capitalize the first letter
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // access home page, not log in
            $data['flash'] = $this->session->flashdata('flash');
            if (!$this->session->userdata('logged_in_user')) {
                $data['title'] = '登入';
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // log in portal
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->Users->validate($username, $password)) {
                $logged_in_user = $this->session->userdata('logged_in_user');
                $this->session->set_flashdata('flash', array('info'=>array($logged_in_user['display_name'].',你剛成功登入')));
                redirect('');
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
    }
}