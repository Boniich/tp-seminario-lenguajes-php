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


    public function show_create_product_form()
    {
        $this->load->view('create_product_form');
    }


    public function store_product()
    {
        $product = $this->take_product_data();

        if ($product) {
            $this->products_model->store_new_product($product);
            redirect('dashboard');
        }
    }

    public function eliminar($id)
    {
        $this->products_model->eliminarProduct($id);
        redirect('dashboard');
    }

    public function update_product()
    {
        $product = $this->take_product_data();

        if ($product) {
            $this->products_model->update_one_product($product);
            redirect('dashboard');
        }
    }

    public function get_update_form($id)
    {

        $data['product'] = $this->products_model->get_product_data_to_update($id);

        $this->load->view('update_product_form', $data);
    }
}
