<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Data_model');
	}

	public function index()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('headers/cargar_css');
			$this->load->view('headers/navbar');
			$this->load->view('datos/index');
			$this->load->view('footers/footerCierre');
			$this->load->view('footers/footer');
			$this->load->view('footers/cargar_js');
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function DatosColmena()
	{
		if ($this->seguridad() == TRUE) {
			$id_colmena = $this->uri->segment(3);
			$data = array(
				'ID' => $id_colmena,
				'DATOSCOLMENAID' => $this->Data_model->getData($id_colmena),
			);
			$this->load->view('headers/header');
			$this->load->view('headers/cargar_css');
			$this->load->view('headers/navbar');
			$this->load->view('datos/dataColmena', $data);
			$this->load->view('footers/footerCierre');
			$this->load->view('footers/footer');
			$this->load->view('footers/cargar_js');

		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function getPromedio()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_colmena = $this->input->post('id_colmena');
				$data = $this->Data_model->getPromedio($id_colmena);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function GetDatabyDate()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_colmena = $this->input->post('id_colmena');
				$inicio = trim($this->input->post('inicio'));
				$termino = trim($this->input->post('fin'));

				$data = $this->Data_model->getDatabyFecha($id_colmena, $inicio, $termino);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function getDataDash()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				date_default_timezone_set('America/New_York');
				$id_empresa = $this->session->userdata('id_empresa');
				$fechaFin = date('Y-m-d h:i'); //data de prueba "2022-12-12 11:00"; 

				$startdate = strtotime($fechaFin);
				$enddate = strtotime("-1 weeks", $startdate);

				$fechaIni = date("Y-m-d h:i", $enddate); //data de prueba "2022-12-12 10:00";

				$data = $this->Data_model->getDatabyEmpresa($id_empresa, $fechaIni, $fechaFin);
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