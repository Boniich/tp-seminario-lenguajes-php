<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }


    public function index()
    {
        $data['products'] = $this->products_model->get_all_products();

        $this->load->view('dashboard_index', $data);
    }
}
