<?php
class Products_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_products()
    {
        $query = $this->db->get('products');
        $result = $query->result_array();
        return $result;
    }

    public function store_new_product($data)
    {
        $this->db->insert('products', $data);

        return true;
    }

    public function eliminarProduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function get_product_data_to_update($id)
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
