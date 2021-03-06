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
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
		$data = array(
			'permisos' => $this->permisos,
			'servicios' => $this->Servicios_model->get_servicios(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/servicios/list",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==3){
		$data = array(
			'permisos' => $this->permisos,
			'servicios' => $this->Servicios_model->get_servicios(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnico");
		$this->load->view("admin/servicios/list",$data);
		$this->load->view("layouts/footer");
		}
	}

	public function add(){
		//para evitar inyeccion
		if(! $this->permisos->insert){ 
			redirect(base_url()."mantenimiento/articulos"); 
			return; 
		}
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
		$precio = $this->input->post("precio");
		$descripcion=$this->input->post("descripcion");
		$idusuario = $this->session->userdata("id");

			$data = array(
			'nombreServicio' =>$nombre_servicio,
			'idCategoria' =>$categoria,
			'precio' => $precio,
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
		//para evitar inyeccion
		if(! $this->permisos->edit){ 
			redirect(base_url()."mantenimiento/articulos"); 
			return; 
		}
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
		//para evitar inyeccion
		if(! $this->permisos->update){ 
			redirect(base_url()."mantenimiento/articulos"); 
			return; 
		}
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
		//para evitar inyeccion
		if(! $this->permisos->delete){ 
			redirect(base_url()."mantenimiento/articulos"); 
			return; 
		}
		$data = array(
			'estado' => "0", 
		);
		$this->Servicios_model->update($idServicio,$data);
		echo "mantenimiento/servicios";
	}
	
}