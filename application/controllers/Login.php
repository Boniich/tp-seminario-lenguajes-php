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
    }


    public function index()
    {
        $this->load->view('login_form');
    }

    public function do_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->login_model->login($email, $password)) {
            redirect('products');
        } else {
            $data['error_message'] = 'Invalid username or password';
            $this->load->view('login_form', $data);
        }
    }
}
