<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Servicios_model");
		$this->load->model("Categorias_model");
	}

	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'servicios' => $this->Servicios_model->get_servicios(), 
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/servicios/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data = array(
			'categorias' => $this->Categorias_model->get_categorias_servicios(), 
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/servicios/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$nombre_servicio=$this->input->post("nombre_servicio");
		$categoria=$this->input->post("categoria");
		$descripcion=$this->input->post("descripcion");
		$idusuario = $this->session->userdata("id");

			$data = array(
			'nombreServicio' =>$nombre_servicio,
			'idCategoria' =>$categoria,
			'descripcion' =>$descripcion,
			'idUsuario' => $idusuario  
			);

			if ($this->Servicios_model->save($data)) {
				redirect(base_url()."mantenimiento/servicios");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/servicios/add");
			}
	}

	public function edit($idServicio){
		$data = array(
			'servicio' => $this->Servicios_model->get_servicio($idServicio),
			'categorias' => $this->Categorias_model->get_categorias_servicios(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/servicios/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idServicio=$this->input->post("idServicio");
		$servicio=$this->input->post("nombre_servicio");
		$descripcion=$this->input->post("descripcion");
		$idCategoria=$this->input->post("categoria");

		$data = array(
			'nombreServicio' => $servicio, 
			'' => $servicio,
			'descripcion' => $descripcion,
			'idCategoria' => $idCategoria
		);
		if ($this->Servicios_model->update($idServicio,$data)) {
			redirect(base_url()."mantenimiento/servicios");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."mantenimiento/servicios/edit/".$idServicio);
		}

	}

	public function view($idServicio){
		$data = array(
			'servicio' => $this->Servicios_model->get_servicio($idServicio), 
		);
		$this->load->view("admin/servicios/view",$data);
	}

	public function delete(){
		$data = array(
			'estado' => "0", 
		);
		$this->Servicios_model->update($idServicio,$data);
		echo "mantenimiento/servicios";
	}
	
}