<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Colmenas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Hives_model');
	}
	public function index()
	{
		if ($this->seguridad() == TRUE) {
			$id = $this->session->userdata('id_empresa');
			$data = array(
				'DATA_COLMENAS' => $this->Hives_model->getColmenas($id),
			);
			$this->load->view('headers/header');
			$this->load->view('headers/cargar_css');
			$this->load->view('headers/navbar');
			$this->load->view('colmenas/colmenas', $data);
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
				$id_colmena = $this->input->post('id_colmena');
				$data = $this->Hives_model->get_ColmenabyId($id_colmena);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function eliminarColmena()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_colmena = $this->input->post('id_colmena');
				$data = $this->Hives_model->deleteColmena($id_colmena);
				echo json_encode($id_colmena);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function crearColmena()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'identificadorColmena' => trim($this->input->post('nombre')),
					'id_empresa' => $this->session->userdata('id_empresa'),
				);
				$this->Hives_model->createColmena($data);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function editarColmena()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'identificadorColmena' => trim($this->input->post('nombre')),
				);
				$this->Hives_model->updateColmena($data, $id);
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