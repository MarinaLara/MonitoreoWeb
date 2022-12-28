<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoreo extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->model('Home_model');
		$this->load->model('Data_model');
	}
	//Login
	public function index()
	{
		if ($this->seguridad() == TRUE) {
			date_default_timezone_set('America/New_York');
			$id_empresa = $this->session->userdata('id_empresa');
			$fechaFin = date('Y-m-d h:i'); //data de prueba "2022-12-12 11:00";

			$startdate = strtotime($fechaFin);
			$enddate = strtotime("-1 weeks", $startdate);

			$fechaIni = date("Y-m-d h:i", $enddate); //data de prueba "2022-12-12 10:00";
			
			$data = array(
				'DATA_DASH' => $this->Data_model->getDatabyEmpresa($id_empresa, $fechaIni, $fechaFin),
			);
			$this->load->view('headers/header');
			$this->load->view('headers/cargar_css');
			$this->load->view('headers/navbar');
			$this->load->view('monitoreo/dash', $data);
			$this->load->view('footers/footerCierre');
			$this->load->view('footers/footer');
			$this->load->view('footers/cargar_js');
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function GetDatabyDate()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_empresa = $this->session->userdata('id_empresa');
				$inicio = trim($this->input->post('inicio'));
				$termino = trim($this->input->post('fin'));

				$data = $this->Data_model->getDatabyEmpresa($id_empresa, $inicio, $termino);
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