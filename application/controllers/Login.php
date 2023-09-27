<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('login_model');
        $this->load->library('session');
    }


    public function index()
    {

        if (isset($this->session->user_id)) {
            redirect('products');
        }

        $this->load->view('login_form');
    }

    public function do_login()
    {

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->login_model->login($email, $password)) {
            $id = $this->login_model->get_user_id();
            $this->session->set_userdata('user_id', $id);
            redirect('products');
        } else {
            $data['error_message'] = 'Invalid username or password';
            $this->load->view('login_form', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('login');
    }
}
