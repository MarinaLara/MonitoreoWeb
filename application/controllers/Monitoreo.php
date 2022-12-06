<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoreo extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->model('Home_model');
	}
	//Login
	public function index()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('headers/cargar_css');
			$this->load->view('headers/navbar');
			$this->load->view('monitoreo/dash');
			$this->load->view('footers/footerCierre');
			$this->load->view('footers/footer');
			$this->load->view('footers/cargar_js');
		} else {
			redirect(base_url() . 'Inicio/');
		}
	}

	public function Datos()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('headers/cargar_css');
			$this->load->view('headers/navbar');
			$this->load->view('monitoreo/datos');
			$this->load->view('footers/footer');
			$this->load->view('footers/cargar_js');
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