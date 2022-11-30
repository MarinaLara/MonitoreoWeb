<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		//$this->load->model('Home_model');
	}
	//Vista Login
    public function index()
	{
        $this->load->view('headers/header');
		$this->load->view('index');
		$this->load->view('footers/footer');
	}

    //Funcion Login

    //Vista Recuperar contraseña

    //Funcion recuperar contraseña

    // funcion de seguridad
	/*public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1) && ($this->session->userdata('tyc') == 1)) {
			return true;
		} else {
			return false;
		}
	}*/
}
