<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
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
		} else {
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
	// funcion para enviar la contraseña por el correo electronico registrado
	public function enviarContrasena()
	{
		$this->load->library('mail');
		if (($this->input->post('email', true))) {
			$email = $this->input->post('email');
			$DATA_CORREO = $this->Home_model->get_password($email);
			if ($DATA_CORREO != FALSE) {
				foreach ($DATA_CORREO->result() as $row) {
					$password = $row->contrasena;
				}
				// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
				$email_to = $email;
				$email_subject = "RESTABLECER CONTRASEÑA";
				$email_from = "no-reply@monitoreoSonora.com";

				$headers = '
					<meta charset="UTF-8">
				    <meta content="width=device-width, initial-scale=1" name="viewport">
				    <meta name="x-apple-disable-message-reformatting">
				    <meta http-equiv="X-UA-Compatible" content="IE=edge">
				    <meta content="telephone=no" name="format-detection">';

				// Aquí se deberían validar los datos ingresados por el usuario
				if (!null === ($this->input->post('email'))) {
					$data = array('error' => 'formulario no enviado', );
					echo json_encode($data);
				}
				$mensaje = 'Su contraseña es: ' . $password;

				// Ahora se envía el e-mail usando la función mail() de PHP
				$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);
				$data = array('error' => 'Enviado correctamente', );
				echo json_encode($data);
			} else {
				$data = array('error' => 'No encontrado', );
				echo json_encode($data);
			}
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