<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getData($id_colmena)
    {
        $this->db->select('*, colmenas.identificadorColmena');
        $this->db->from('datosColmenas');
        $this->db->join('colmenas', 'colmenas.id_colmena = datosColmenas.id_colmena');
        $this->db->where('datosColmenas.id_colmena', $id_colmena);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getPromedio($idC)
    {
        $query = $this->db->query('call datosColmenaPromedios(' . $idC . ');');
        $data   = array();
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            $query->free_result();
            $query->next_result();
            return $data;
        } else {
            return FALSE;
        }
    }

    public function getDatabyFecha($idC, $inicio, $termino)
    {
        $query = $this->db->query('call datosColmenabyDate(' . $idC . ', "'.$inicio. '", "'.$termino.'");');
        $data   = array();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            $query->free_result();
            $query->next_result();
            return $data;
        } else {
            return FALSE;
        }
    }

    public function getDatabyEmpresa($id_empresa, $fechaIni, $fechaFin)
    {
        $query = $this->db->query('call datosDash(' . $id_empresa . ', "'.$fechaIni. '", "'.$fechaFin.'");');
        $data   = array();
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            // echo $this->db->last_query();
            $query->free_result();
            $query->next_result();
            return $data;
        } else {
            return FALSE;
        }
    }
    
}