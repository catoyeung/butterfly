<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {
    
	public function index(){
        $data['title'] = '通告';
        $this->load->view('templates/header', $data);
        $this->load->view('notice/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // user access notice posting form
            $data['title'] = '張貼通告';
            $this->load->view('templates/header', $data);
            $this->load->view('notice/create', $data);
            $this->load->view('templates/footer', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // user post notice
            $notice_title = $this->input->post('notice_title');
            $notice_content = $this->input->post('notice_content');
            $this->load->model('Notice_model');
            $result = $this->Notice_model->create(array('title'=>$notice_title,
                                              'content'=>$notice_content,
                                              'created_at'=>microtime_to_mssql_time(microtime())
                                        ));
            if($result) {
                add_flash_message('info', '通告已經張貼。');
            } else {
                add_flash_message('alert', '通告不能張貼，請聯絡系統管理員。');
            }
            redirect('notice');
        }
    }
}