<?php
class Products_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function there_is_products()
    {
        $query = $this->db->get('products');
        $status = $query->num_rows() >= 1 ?? true ?? false;
        return $status;
    }

    public function get_all_products()
    {
        $query = $this->db->get('products');
        $result = $query->result_array();
        return $result;
    }

    public function get_all_products_with_limit($limit, $page)
    {
        $query = $this->db->limit($limit, $page)->get('products');
        $result = $query->result_array();
        return $result;
    }

    public function create_new_product($data)
    {
        $this->db->insert('products', $data);

        return true;
    }

    public function delete_one_product($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function show_product_data_to_update($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        $product = $query->result_array();

        return $product;
    }

    public function update_one_product($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }
}
