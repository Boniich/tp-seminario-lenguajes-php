<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('users');

        $row = $query->row();

        $result = $row->full_name;
        return $result;
    }
}
