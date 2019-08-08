<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Marcas_model");
	}

	public function index()
	{
		$data = array(
			'permisos' => $this->permisos,
			'marcas' => $this->Marcas_model->get_marcas(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/marcas/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/marcas/add");
		$this->load->view("layouts/footer");
	}
	public function store(){
		$nombre_marca=$this->input->post("nombre_marca");
		$descripcion=$this->input->post("descripcion");
		$idusuario = $this->session->userdata("id");

		$this->form_validation->set_rules("nombre_marca","Marca","required|alpha_numeric_spaces|is_unique[marca.nombreMarca]");

		//para hacer correr
		if ($this->form_validation->run() == TRUE) {
			$data = array(
			'nombreMarca' =>$nombre_marca ,
			'descripcion' =>$descripcion,
			'idUsuario' => $idusuario  
			);

			if ($this->Marcas_model->save($data)) {
				redirect(base_url()."mantenimiento/marcas");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/marcas/add");
			}
		}else{
			$this->add();
		}
		
	}

	public function edit($idMarca){
		$data = array(
			'marca' => $this->Marcas_model->get_marca($idMarca), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/marcas/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_marca=$this->input->post("id_marca");
		$nombre_marca=$this->input->post("nombre_marca");
		$descripcion=$this->input->post("descripcion");

		$marca_Actual = $this->Marcas_model->get_marca($id_marca);
		//validar un dato ya existente
		if ($nombre_marca==$marca_Actual->nombreMarca) {
			$unique = '';
		}else{
			$unique='|alpha|is_unique[marca.nombreMarca]';
		}

		$this->form_validation->set_rules("nombre_marca","Marca","required|alpha_numeric_spaces");
		if ($this->form_validation->run()) {
			$data = array(
			'nombreMarca' =>$nombre_marca ,
			'descripcion' =>$descripcion
		);

		if ($this->Marcas_model->update($id_marca,$data)) {
			redirect(base_url()."mantenimiento/marcas");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."mantenimiento/marcas/edit/".$id_marca);
		}
	}else{
		$this->edit($id_marca);
	}
		
}

	public function view($idMarca){
		$data = array(
			'marca' =>$this->Marcas_model->get_marca($idMarca), 
		);
		$this->load->view("admin/marcas/view",$data);
	}

	public function delete($idMarca){
		$data = array(
			'estado' => "0", 
		);
		$this->Marcas_model->update($idMarca,$data);
		echo "mantenimiento/marcas";
	}
}
