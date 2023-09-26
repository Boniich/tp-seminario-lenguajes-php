<?php
class Login_model extends CI_Model
{

    private int $user_id = 0;

    public function __construct()
    {
        $this->load->database();
    }

    private function set_user_id($query)
    {
        $user = $query->row();
        $this->user_id = $user->id;
    }

    public function get_user_id()
    {
        return $this->user_id;
    }

    private function validate_user_data($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        return $query;
    }

    public function login($email, $password)
    {
        $query = $this->validate_user_data($email, $password);
        $status = $query->num_rows() == 1 ?? true ?? false;
        if ($status) {
            $this->set_user_id($query);
        }
        return $status;
    }
}
