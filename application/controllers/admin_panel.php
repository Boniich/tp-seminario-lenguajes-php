<?php

class Admin_panel extends CI_Controller
{
    private $data;
    private int $per_page = 10;
    private int $uri_segment = 3;
    private string $base_url = 'http://localhost/seminarioLenguajesphp/index.php/admin_panel/index/';
    private int $count_products = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('products_model');
        $this->load->model('user_model');

        $this->data['user'] = $this->user_model->get_user();
    }

    public function index()
    {
        $this->add_nav_view();
        $this->load->view('admin/admin_index');
        if ($this->products_model->there_is_products()) {

            $this->count_products = $this->products_model->count_products();
            $this->set_pagination_config();
            $page = $this->get_uri_segment();

            $this->data['products'] = $this->products_model->get_all_products_with_limit($this->per_page, $page);
            $this->data['links'] = $this->pagination->create_links();
            $this->load->view('admin/show_products_table', $this->data);
        } else {
            $this->data['not_products_msg'] = 'There is not products to show! Create one!';
            $this->load->view('products/not_product_msg', $this->data);
        }
    }

    private function get_uri_segment()
    {
        return ($this->uri->segment($this->uri_segment)) ? $this->uri->segment($this->uri_segment) : 0;
    }

    private function set_pagination_config()
    {
        $config['base_url'] = $this->base_url;
        $config['total_rows'] = $this->count_products;
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = $this->uri_segment;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only"></span></span></li>';

        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '</span></li>';

        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';

        //aun no entiendo para que sirven
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
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
        $product = $this->take_product_data();

        if ($product) {
            $this->products_model->update_one_product($product, $id);
            redirect('product_updated_successfully');
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
        $image = $this->do_upload();

        $productData = array(
            'name' => $productName,
            'description' => $productDescrption,
            'price' => $productPrice,
            'image' => $image,
        );
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
        } else {
            $data = 'uploads/' . $this->upload->data('file_name');
            return $data;
        }
    }
}
