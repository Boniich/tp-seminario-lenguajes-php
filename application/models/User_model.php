<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');

        $row = $query->row();

        $result = $row->full_name;
        return $result;
    }
}
