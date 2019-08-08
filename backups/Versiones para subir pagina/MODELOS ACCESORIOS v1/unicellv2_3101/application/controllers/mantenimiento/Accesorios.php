<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accesorios extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Modelos_model");
		$this->load->model("Colores_model");
		$this->load->model("Accesorios_model");
		$this->load->library("upload");
	}

	//mostrar accesorios disponibles todo-Carro de compras
	public function index(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
			$data = array(
			'permisos' => $this->permisos,
			'accesorios' => $this->Accesorios_model->get_accesorios_list(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/accesorios/list",$data);
		$this->load->view("layouts/footer");
		}
	}

	//mostrar lista para gestion accesorios
	public function gestion(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
			$data = array(
			'permisos' => $this->permisos,
			'accesorios' => $this->Accesorios_model->get_accesorios_list(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/accesorios/listGestion",$data);
		$this->load->view("layouts/footer");
		}
	}

	//agregar accesorio
	public function add($idModelo){
		$data = array(
			'modelo' => $this->Modelos_model->get_modelo($idModelo),
			'colores' => $this->Colores_model->get_colores() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");	
		$this->load->view("admin/accesorios/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$idmodelos= $this->input->post("id_modelos");
		$colores = $this->input->post("colores");
		$precios= $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$idusuario = $this->session->userdata("id");
		
		if ($this->save($idmodelos, $colores, $precios,$cantidades)) {
			redirect(base_url()."mantenimiento/modelos");
		}else{
			redirect(base_url()."mantenimiento/modelos");
		}
	}

	protected function save($idmodelos, $colores, $precios,$cantidades){
		for ($i=0; $i < count($precios) ; $i++){
			$data = array(
				'idModelo' => $idmodelos,
				'idColor' => $colores[$i],
				'precio' => $precios[$i],
				'stock' => $cantidades[$i],
				'idUsuario' => $idusuario
			);
			$this->Accesorios_model->save($data);
		}
			
	}

	public function edit($idAccesorio){
		//para evitar inyeccion
	
		$data = array(
			'accesorio' => $this->Accesorios_model->get_accesorio($idAccesorio),
			'colores' => $this->Colores_model->get_colores(),
			'modelos' => $this->Modelos_model->get_modelos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/accesorios/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		
		$idAccesorio = $this->input->post("id_accesorio");
		$idModelo = $this->input->post("idModelo");
		$idColor = $this->input->post("idColor");
		$precio = $this->input->post("precio");
		$stock = $this->input->post("stock");

		$data = array(
			'idModelo' => $idModelo,
			'idColor' => $idColor,
			'precio' => $precio,
			'stock' => $stock
		);

		if ($this->Accesorios_model->update($idAccesorio,$data)) {
			redirect(base_url()."mantenimiento/accesorios/gestion");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."mantenimiento/accesorios/edit/".$idAccesorio);
		}	
	}

	public function delete($idAccesorio){

		$this->Accesorios_model->delete($idAccesorio);
		redirect(base_url()."mantenimiento/accesorios/gestion");
	}

	public function reporteArticulos(){
		$data = array(
			'articulos' => $this->Articulos_model->get_articulos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/articulos/reporte",$data);
		$this->load->view("layouts/footer");
	}
}
