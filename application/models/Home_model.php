<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function autenticar($data)
    {
        $this->db->from('usuarios');
        $this->db->where('activo', 1);
        $this->db->where('email', $data['email']);
        $this->db->where('pass', $data['pass']);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function get_password($email)
    {
        $this->db->select('pass');
        $this->db->from('usuarios');
        $this->db->where('email', $email);
        $this->db->where('activo', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }

    }
}