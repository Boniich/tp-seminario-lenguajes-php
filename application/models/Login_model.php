<?php
class Login_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        $status = $query->num_rows() == 1 ?? true ?? false;

        return $status;
    }
}
