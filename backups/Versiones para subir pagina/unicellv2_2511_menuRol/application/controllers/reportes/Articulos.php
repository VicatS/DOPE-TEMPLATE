<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

	//para dar permisos
	private $permisos;


	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ventas_model");
	}

	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'articulos' => $this->Ventas_model->articuloMasVendido()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/articulos",$data);
		$this->load->view("layouts/footer");
	}
}

