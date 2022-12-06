<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoreo extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		//$this->load->model('Home_model');
	}
	//Login
    public function index()
	{
		$this->load->view('headers/header');
        $this->load->view('headers/cargar_css');
		$this->load->view('headers/navbar');
		$this->load->view('monitoreo/dash');
		$this->load->view('footers/footerCierre');
		$this->load->view('footers/footer');
		$this->load->view('footers/cargar_js');
	}

	public function Datos()
	{
		$this->load->view('headers/header');
        $this->load->view('headers/cargar_css');
		$this->load->view('headers/navbar');
		$this->load->view('monitoreo/datos');
		$this->load->view('footers/footer');
		$this->load->view('footers/cargar_js');
	}
}
