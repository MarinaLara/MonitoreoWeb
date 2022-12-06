<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colmenas extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		//$this->load->model('Home_model');
	}
    public function index()
    {
        $this->load->view('headers/header');
        $this->load->view('headers/cargar_css');
		$this->load->view('headers/navbar');
		$this->load->view('colmenas/colmenas');
		$this->load->view('footers/footer');
		$this->load->view('footers/cargar_js');
    }
}