<?php

class Admin_panel extends CI_Controller
{
    private $data;
    private int $per_page;
    private int $page;
    private string $base_url = 'http://[::1]/seminarioLenguajesphp/index.php/admin_panel/index/'; // casa
    // private string $base_url = 'http://localhost/tp-seminario-Lenguajes-php/index.php/admin_panel/index/'; // uni
    private int $count_products = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('custompagination');
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('products_model');
        $this->load->model('user_model');
        $this->load->helper('file');
        $this->load->library('session');

        $this->run_auth_middleware();
        $this->get_user_data();

        $this->custompagination->set_base_url($this->base_url);
    }

    public function index()
    {

        $this->add_nav_view();
        $this->load->view('admin/admin_index');
        if ($this->products_model->there_is_products()) {
            $this->initiate_pagination();

            $this->data['products'] = $this->products_model->get_all_products_with_limit($this->per_page, $this->page);
            $this->data['links'] = $this->custompagination->get_links();
            $this->load->view('admin/show_products_table', $this->data);
        } else {
            $this->data['not_products_msg'] = 'There is not products to show! Create one!';
            $this->load->view('products/not_product_msg', $this->data);
        }
    }

    private function run_auth_middleware()
    {
        $id = $this->session->user_id;
        if (!isset($id)) {
            redirect('login');
        }
    }

    private function get_user_data()
    {
        $id = $this->session->user_id;
        $this->data['user'] = $this->user_model->get_user($id);
    }


    private function initiate_pagination()
    {
        $this->count_products = $this->products_model->count_products();
        $this->custompagination->set_pagination_config($this->count_products);
        $this->per_page = $this->custompagination->get_per_page();
        $this->page = $this->custompagination->get_uri_segment();
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
        $product = $this->take_data_to_create_product();

        if ($product) {
            $this->products_model->create_new_product($product);
            redirect('product_created_successfully');
        }
    }

    public function show_successfully_action_msg()
    {
        $this->add_nav_view();
        $this->load->view('admin/products_created_successfully_msg');
    }

    public function show_successfully_updated_product()
    {
        $this->add_nav_view();
        $this->load->view('admin/product_updated_successfully_msg');
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
        $product = $this->take_product_data_to_update();

        if ($product) {
            $this->products_model->update_one_product($product, $id);
            redirect('product_updated_successfully');
        }
    }

    public function delete_product($id)
    {
        $image = $this->products_model->get_image_to_manipulate($id);

        if (file_exists($image)) {
            unlink($image);
        }
        $this->products_model->delete_one_product($id);
        redirect('admin_panel');
    }

    private function take_data_to_create_product()
    {
        $productName = $this->input->post('name');
        $productDescrption = $this->input->post('description');
        $productPrice = $this->input->post('price');

        if (empty($_FILES['image']['name'])) {
            //read https://www.php.net/manual/en/function.copy.php
            $image = time() . '.png';
            $imageTocopy = './not-image.png';
            $imageDest = './uploads/' . $image;
            $newImage = 'uploads/' . $image;
            copy($imageTocopy, $imageDest);
            $productData = array(
                'name' => $productName,
                'description' => $productDescrption,
                'price' => $productPrice,
                'image' => $newImage,
            );
        } else {
            $image = $this->do_upload();
            $productData = array(
                'name' => $productName,
                'description' => $productDescrption,
                'price' => $productPrice,
                'image' => $image,
            );
        }
        return $productData;
    }



    private function take_product_data_to_update()
    {
        $productName = $this->input->post('name');
        $productDescrption = $this->input->post('description');
        $productPrice = $this->input->post('price');

        if (empty($_FILES['image']['name'])) {
            $productData = array(
                'name' => $productName,
                'description' => $productDescrption,
                'price' => $productPrice,
            );
        } else {
            $image = $this->do_upload();
            $productData = array(
                'name' => $productName,
                'description' => $productDescrption,
                'price' => $productPrice,
                'image' => $image,
            );
        }
        return $productData;
    }

    private function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 200;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            redirect('admin_panel');
            // devuelve error si la imagen no coincide con la config
        } else {
            $data = 'uploads/' . $this->upload->data('file_name');
            return $data;
        }
    }
}
