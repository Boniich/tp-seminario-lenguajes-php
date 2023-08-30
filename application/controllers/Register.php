<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('register_model');
    }

    public function index()
    {
        $this->load->view('register_index');
    }

    public function do_register()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email == '' || $password == '') {
            $data['error_message'] = 'One or more Required field is empty!';
            $this->load->view('register_index', $data);
        } else if ($this->register_model->register($email, $password)) {
            redirect('dashboard');
        } else {
            $data['error_message'] = 'Ups! something go wrong! Try again!';
            $this->load->view('register_index', $data);
        }
    }
}
