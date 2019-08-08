<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("frontend/frontend");

	}

	

	public function servicios()
	{
		$this->load->view("frontend/servicios");

	}

	public function contacto()
	{
		$this->load->view("frontend/contacto");

	}
}
