<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {

	//para dar permisos
		private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ordenes_model");
	}


	public function index(){
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("buscar")) {
			$ordenes = $this->Ordenes_model->getOrdenesByDate($fechainicio,$fechafin);
		}else{
			$ordenes = $this->Ordenes_model->get_ordenes();
		}
		$data = array(
			'permisos' => $this->permisos,
			'ordenes' => $ordenes,
			'fechainicio' => $fechainicio,
			'fechafin' => $fechafin 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/ordenes",$data);
		$this->load->view("layouts/footer");
	}


}