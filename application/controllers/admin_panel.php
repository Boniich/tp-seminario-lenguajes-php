<?php

class Admin_panel extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('products_model');
        $this->load->model('user_model');

        $this->data['user'] = $this->user_model->get_user();
    }

    public function index()
    {

        $this->data['products'] = $this->products_model->get_all_products();

        $this->add_nav_view();
        $this->load->view('admin/admin_index');
    }

    private function add_nav_view()
    {
        $this->load->view('nav/nav', $this->data);
    }

    public function show_create_product_form()
    {
        $this->add_nav_view();
        $this->load->view('products/create_product_form');
    }

    public function create_product()
    {
        $product = $this->take_product_data();

        if ($product) {
            $this->products_model->create_new_product($product);
            redirect('admin_panel');
        }
    }

    public function show_update_form($id)
    {

        $this->data['product'] = $this->products_model->show_product_data_to_update($id);
        $this->add_nav_view();
        $this->load->view('products/update_product_form', $this->data);
    }

    public function update_product()
    {
        $id = $this->input->post('id');
        $product = $this->take_product_data();

        if ($product) {
            $this->products_model->update_one_product($product, $id);
            redirect('admin_panel');
        }
    }

    public function delete_product($id)
    {
        $this->products_model->delete_one_product($id);
        redirect('admin_panel');
    }


    private function take_product_data()
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
}
