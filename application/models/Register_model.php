<?php
class Register_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function register($data)
    {
        $this->db->insert('users', $data);
        return true;
    }
}
