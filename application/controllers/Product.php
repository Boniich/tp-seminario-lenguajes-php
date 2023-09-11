<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('products_model');
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_user();
        $data['products'] = $this->products_model->get_all_products();

        $this->load->view('nav/nav', $data);
        $this->load->view('products/product_index');
    }
}
