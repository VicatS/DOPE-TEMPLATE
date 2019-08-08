<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

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
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("buscar")) {
			$ventas = $this->Ventas_model->getVentasByDate($fechainicio,$fechafin);
		}else{
			$ventas = $this->Ventas_model->get_ventas_reporte();
		}
		$data = array(
			'permisos' => $this->permisos,
			'ventas' => $ventas,
			'fechainicio' => $fechainicio,
			'fechafin' => $fechafin 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/ventas",$data);
		$this->load->view("layouts/footer");
	}
}