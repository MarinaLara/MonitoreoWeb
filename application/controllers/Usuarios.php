<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}
	public function index()
	{
		$data = array(
			'DATA_USUARIOS' => $this->Users_model->get_usuarios(),
			'DATA_NIVELES' => $this->Users_model->get_niveles(),
		);
		$this->load->view('headers/header');
		$this->load->view('headers/cargar_css');
		$this->load->view('headers/navbar');
		$this->load->view('usuarios/usuarios', $data);
		$this->load->view('footers/footerCierre');
		$this->load->view('footers/footer');
		$this->load->view('footers/cargar_js');
	}

	public function getDatabyID()
	{
		//if ($this->seguridad() == TRUE) {
		if ($this->input->is_ajax_request()) {
			$id_usuario = $this->input->post('id_usuario');
			$data = $this->Users_model->get_usuarios_by_id($id_usuario);
			echo json_encode($data);
		} else {
			show_404();
		}
		/*} else {
		redirect(base_url());
		}*/
	}

	public function crearUsuario()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'nombre'=> trim($this->input->post('nombre')),
				'apellidoPaterno'=> trim($this->input->post('apellidoP')),
				'apellidoMaterno'=> trim($this->input->post('apellidoM')),
				'email'=> trim($this->input->post('email')),
				'id_nivelUsuario'=> trim($this->input->post('nivel')),
				'pass' => trim($this->input->post('passw')),
			);
			
			$this->Users_model->crearUsser($data);
			echo json_encode($data);
		} else {
			show_404();
		}
	}

	public function guardarUsuario()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$data = array(
				'nombre'=> trim($this->input->post('nombre')),
				'apellidoPaterno'=> trim($this->input->post('apellidoP')),
				'apellidoMaterno'=> trim($this->input->post('apellidoM')),
				'email'=> trim($this->input->post('email')),
				'id_nivelUsuario'=> trim($this->input->post('nivel')),
			);
			if ($this->input->post('passw') != ""){
				$data['pass'] = trim($this->input->post('passw'));
			}
			$dataE = $this->Users_model->guardarUsser($data, $id);
			if ($dataE == false){
				$data['Error'] = "Error";
			}else{
				$data['Error'] = "Success";
			}
			echo json_encode($id);
		} else {
			show_404();
		}
	}

	public function eliminarUsuario()
	{
		if ($this->input->is_ajax_request()) {
			$id_usuario = $this->input->post('id_usuario');

			$this->Users_model->deleteUsuarios($id_usuario);
			echo json_encode($id_usuario);
		} else {
			show_404();
		}
	}

}