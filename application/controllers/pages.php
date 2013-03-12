<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Users');
    }
    
	/*public function view($page = 'home')
	{
        if ( ! file_exists('application/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('pages/'.$page, $data);
	}*/
    
    public function index()
    {
        if ( ! file_exists('application/views/pages/home.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['title'] = 'Home'; // Capitalize the first letter
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // access home page, not log in
            $data['flash'] = $this->session->flashdata('flash');
            print_r($this->Users->load_by_id(1));
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // log in portal
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($username == 'admin' and $password == 'admin') {
                $this->session->set_flashdata('flash', array('info'=>array($username.',你剛成功登入')));
                redirect('');
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
    }
}