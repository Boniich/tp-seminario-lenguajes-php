<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    private $data;
    private int $per_page;
    private int $page;
    private string $base_url = 'http://[::1]/seminarioLenguajesphp/index.php/product/index/'; // casa
    // private string $base_url = 'http://localhost/tp-seminario-Lenguajes-php/index.php/product/index/'; // uni
    private int $count_products = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('custompagination');
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('products_model');
        $this->load->model('user_model');
        $this->load->library('session');

        $this->run_auth_middleware();
        $this->get_user_data();

        $this->custompagination->set_base_url($this->base_url);
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

    public function index()
    {

        $this->load->view('nav/nav', $this->data);
        $this->load->view('products/product_index');
        if ($this->products_model->there_is_products()) {
            $this->initiate_pagination();
            $this->data['products'] = $this->products_model->get_all_products_with_limit($this->per_page, $this->page);
            $this->data['links'] = $this->custompagination->get_links();
            $this->load->view('products/show_products_list', $this->data);
        } else {
            $this->data['not_products_msg'] = 'There is not products to show! Please come back later!';
            $this->load->view('products/not_product_msg', $this->data);
        }
    }

    private function initiate_pagination()
    {
        $this->count_products = $this->products_model->count_products();
        $this->custompagination->set_pagination_config($this->count_products);
        $this->per_page = $this->custompagination->get_per_page();
        $this->page = $this->custompagination->get_uri_segment();
    }
}
