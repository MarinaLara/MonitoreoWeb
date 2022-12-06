<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_usuarios()
    {
        $this->db->select('*, usuarios.id_nivelusuario, nivelesUsuarios.nivel');
        $this->db->from('usuarios');
        $this->db->join('nivelesUsuarios', 'nivelesUsuarios.id_nivelUsuario = usuarios.id_nivelUsuario');
        $this->db->where('usuarios.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_niveles()
    {
        $this->db->from('nivelesUsuarios');
        $this->db->where('id_nivelUsuario > 1');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_usuarios_by_id($id_usuario)
    {

        $this->db->select('*, usuarios.id_nivelusuario, nivelesUsuarios.nivel');
        $this->db->from('usuarios');
        $this->db->join('nivelesUsuarios','usuarios.id_nivelusuario = nivelesUsuarios.id_nivelusuario');
        $this->db->where('usuarios.activo',1);
        $this->db->where('usuarios.id_usuario',$id_usuario); 
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function crearUsser($data)
    {
        $this->db->insert('usuarios', $data);
    }

    public function guardarUsser($data, $id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuarios', $data);
    }

    public function deleteUsuarios($id_usuario)
    {
        $this->db->set('activo', 0);
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuarios');
    }
}