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
        $this->load->view('nav/nav', $data);
        $this->load->view('products/product_index');
        if ($this->products_model->there_is_products()) {
            $data['products'] = $this->products_model->get_all_products();
            $this->load->view('products/show_products_list', $data);
        } else {
            $data['not_products_msg'] = 'There is not products to show! Please come back later!';
            $this->load->view('products/not_product_msg', $data);
        }
    }
}
