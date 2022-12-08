<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empresas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Empresas_model');
	}

    public function index()
    {
        if ($this->seguridad() == TRUE) {
			$data = array(
				'DATA_EMPRESAS' => $this->Empresas_model->getEmpresas(),
			);
			$this->load->view('headers/header');
			$this->load->view('headers/cargar_css');
			$this->load->view('headers/navbar');
			$this->load->view('empresas/index', $data);
			$this->load->view('footers/footerCierre');
			$this->load->view('footers/footer');
			$this->load->view('footers/cargar_js');
		} else {
			redirect(base_url() . 'Inicio/');
		}
    }

	public function getDatabyID()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_empresa = $this->input->post('id_empresa');
				$data = $this->Empresas_model->get_EmpresabyId($id_empresa);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function eliminarEmpresa()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_empresa = $this->input->post('id_empresa');
				$data = $this->Empresas_model->deleteEmpresa($id_empresa);
				echo json_encode($id_empresa);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function crearEmpresa()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'razonSocial' => trim($this->input->post('razonSocial')),
					'correoContacto' => trim($this->input->post('correoContacto')),
					'nombreContacto' => trim($this->input->post('nombreContacto')),
					'telefonoContacto' => trim($this->input->post('telefonoContacto')),
				);
				$this->Empresas_model->createEmpresa($data);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function editarEmpresa()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'razonSocial' => trim($this->input->post('razonSocial')),
					'correoContacto' => trim($this->input->post('correoContacto')),
					'nombreContacto' => trim($this->input->post('nombreContacto')),
					'telefonoContacto' => trim($this->input->post('telefonoContacto')),
				);
				$this->Empresas_model->updateEmpresa($data, $id);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

    //Funcion de seguridad
	public function seguridad()
	{
		if ($this->session->userdata('logueado') == 1) {
			return true;
		} else {
			return false;
		}
	}
}