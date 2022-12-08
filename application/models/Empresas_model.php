<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empresas_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getEmpresas()
    {
        $this->db->from('empresas');
        $this->db->where('activa', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_EmpresabyId($id_empresa)
    {
        $this->db->from('empresas');
        $this->db->where('id_empresa',$id_empresa);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function deleteEmpresa($id_empresa)
    {
        $this->db->set('activa', 0);
        $this->db->where('id_empresa', $id_empresa);
        $this->db->update('empresas');
    }

    public function createEmpresa($data)
    {
        $this->db->insert('empresas', $data);
    }
    
    public function updateEmpresa($data, $id)
    {
        $this->db->where('id_empresa', $id);
        $this->db->update('empresas', $data);
    }

}