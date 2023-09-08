<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        $this->load->view('dashboard_index', $data);
    }

    public function take_product_data()
    {
        $productName = $this->input->post('name');
        $productDescrption = $this->input->post('description');
        $productPrice = $this->input->post('price');

        $productData = array(
            'name' => $productName,
            'description' => $productDescrption,
            'price' => $productPrice,
        );
        return $productData;
    }


    public function store_product(){
        $product = $this->take_product_data();

        if($product){
            $this->products_model->store_new_product($product);
        }
    }
}
