<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Backend_model");
		$this->load->model("Ventas_model");
	}

	//Inicio y contador de total en cada tabla
	public function index(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
			$data = array(
			'cantVentas' => $this->Backend_model->rowCount("venta"), 
			'cantOrdenes' => $this->Backend_model->rowCount("ordenservicio"),
			'cantClientes' => $this->Backend_model->rowCount("cliente"),
			'cantArticulos' => $this->Backend_model->rowCount("articulo"),
			'years' => $this->Ventas_model->years()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/dashboard",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==2){
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideVentas");
		$this->load->view("admin/menuVentas");
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==3){
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnico");
		$this->load->view("admin/menuTecnico");
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==4){
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnicosClientes");
		$this->load->view("admin/menuTecnico");
		$this->load->view("layouts/footer");
		}
	}

	//creamos funcion para trabajar con datos ajax
	public function getData(){
		$year = $this->input->post("year");
		$resultados = $this->Ventas_model->montos($year);
		echo json_encode($resultados);
	}
}
