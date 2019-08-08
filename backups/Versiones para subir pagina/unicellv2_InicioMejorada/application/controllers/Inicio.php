<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model("Ordenes_model");
	}

	public function index()
	{
		$data = array(
			'ordenes' => $this->Ordenes_model->get_ordenes_inicio() 
		);
		$this->load->view("frontend/inicio",$data);

	}
}
