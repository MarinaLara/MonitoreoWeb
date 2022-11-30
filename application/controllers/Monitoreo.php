<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoreo extends CI_Controller {

	//Login
    public function index()
	{
		$this->load->view('welcome_message');
	}
}
