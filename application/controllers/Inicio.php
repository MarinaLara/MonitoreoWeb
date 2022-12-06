<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}
	//Vista Login
    public function index()
	{
		if ($this->seguridad() != TRUE) {
			$this->load->view('headers/header');
			$this->load->view('headers/cargar_css');
			$this->load->view('home/index');		
			$this->load->view('footers/footer');
			$this->load->view('footers/cargar_js');
		}else{
			redirect(base_url() . 'Monitoreo/');
		}
	}

	//Vista Recuperar contraseña
	public function Recuperar()
	{
		$this->load->view('headers/header');
		$this->load->view('headers/cargar_css');
		$this->load->view('home/recuperar');	
		$this->load->view('footers/footer');
		$this->load->view('footers/cargar_js');
	}

    //Funcion Login
	public function logIn()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'email' => $this->input->post('email', true),
				'pass' => $this->input->post('pass', true),
			);
			$query = $this->Home_model->autenticar($data);
			foreach ($query->result() as $row) {
				$newdata = array(
					'id_usuario' => $row->id_usuario,
					'id_empresa' => $row->id_empresa,
					'email' => $row->email,
					'nombre' => $row->nombre,
					'apellidoP' => $row->apellidoPaterno,
					'apellidoM' => $row->apellidoMaterno,
					'password' => $row->pass,
					'nivel' => $row->id_nivelUsuario,
					'img_path' => $row->pathImgPerfil,
					'logueado' => TRUE,
				);
				$this->session->set_userdata($newdata);
			}
		}
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
   
    //Funcion recuperar contraseña

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
