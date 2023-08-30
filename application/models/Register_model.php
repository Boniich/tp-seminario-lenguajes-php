<?php
class Register_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function register($email, $password)
    {
        try {
            $data = array(
                'email' => $email,
                'password' => $password
            );

            $this->db->insert('users', $data);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
