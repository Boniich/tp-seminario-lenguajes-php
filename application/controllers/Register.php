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
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->user_id) {
            redirect('product');
        }

        $this->load->view('register_index');
    }

    private function get_fields_empty_error()
    {
        $data['error_message'] = 'One or more Required field are empty!';
        $this->load->view('register_index', $data);
        return false;
    }

    private function take_register_data()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        if ($email == '' || $password == '') {
            $this->get_fields_empty_error();
        } else {
            $userData = array(
                'email' => $email,
                'password' => $password
            );
            return $userData;
        }
    }

    public function do_register()
    {
        $userData = $this->take_register_data();
        if ($userData) {
            if ($this->register_model->register($userData)) {
                redirect('register_successfully');
            }
        }
    }

    public function show_register_successfully_msg()
    {
        $this->load->view('auth/successfully_register');
    }
}
