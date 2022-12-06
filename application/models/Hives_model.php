<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hives_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getColmenas($id)
    {
        $this->db->select('*, empresas.razonSocial');
        $this->db->from('colmenas');
        $this->db->join('empresas', 'colmenas.id_empresa = empresas.id_empresa');
        $this->db->where('colmenas.id_empresa', $id);
        $this->db->where('colmenas.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_ColmenabyId($id_colmena)
    {
        $this->db->from('colmenas');
        $this->db->where('id_colmena',$id_colmena);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function deleteColmena($id_colmena)
    {
        $this->db->set('activo', 0);
        $this->db->where('id_colmena', $id_colmena);
        $this->db->update('colmenas');
    }

    public function createColmena($data)
    {
        $this->db->insert('colmenas', $data);
    }
    
    public function updateColmena($data, $id)
    {
        $this->db->where('id_colmena', $id);
        $this->db->update('colmenas', $data);
    }

}