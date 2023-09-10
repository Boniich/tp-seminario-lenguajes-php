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

    public function update_one_product($data)
    {
        $this->db->where('id', 5);
        $this->db->update('products', $data);
    }
}
