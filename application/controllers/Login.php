<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url_helper');
    }


    public function index()
    {
        $data['users'] = $this->login_model->get_users();

        $this->load->view('login_form', $data);
    }
}
