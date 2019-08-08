<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	//para dar permisos
	private $permisos;


	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Categorias_model");
	}

	public function index()
	{
		$data = array(
			'permisos' => $this->permisos,
			'categorias' => $this->Categorias_model->get_categorias(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/list",$data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{
		//para evitar inyeccion
		if(! $this->permisos->insert){ 
			redirect(base_url()."mantenimiento/categorias"); 
			return; 
		}
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/add");
		$this->load->view("layouts/footer");
	}
	public function store(){
		$nombre_categoria=$this->input->post("nombre_categoria");
		$descripcion=$this->input->post("descripcion");
		$idusuario = $this->session->userdata("id"); 

		//validaciones 
		$this->form_validation->set_rules("nombre_categoria","Categoria","required|alpha|is_unique[categoria.nombreCategoria]");

		//para hacer correr
		if ($this->form_validation->run()) {
			$data = array(
				'nombreCategoria' =>$nombre_categoria,
				'descripcion' =>$descripcion,
				'idUsuario' => $idusuario
				
			);

			if ($this->Categorias_model->save($data)) {
				redirect(base_url()."mantenimiento/categorias");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/categorias/add");
			}
		}else{
			$this->add();
		}
	}

	public function edit($idCategoria){
		$data = array(
			'categoria' => $this->Categorias_model->get_categoria($idCategoria), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_categoria=$this->input->post("id_categoria");
		$nombre_categoria=$this->input->post("nombre_categoria");
		$descripcion=$this->input->post("descripcion");

		$categoria_Actual = $this->Categorias_model->get_categoria($id_categoria);
		//validar un dato ya existente
		if ($nombre_categoria==$categoria_Actual->nombreCategoria) {
			$unique = '';
		}else{
			$unique='|alpha|is_unique[categoria.nombreCategoria]';
		}

		$this->form_validation->set_rules("nombre_categoria","Categoria","required|alpha".$unique);//concatenoamos regla de validacion
		if ($this->form_validation->run()) {
			$data = array(
			'nombreCategoria' =>$nombre_categoria ,
				'descripcion' =>$descripcion
			);

			if ($this->Categorias_model->update($id_categoria,$data)) {
				redirect(base_url()."mantenimiento/categorias");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/categorias/edit/".$id_categoria);
			}
		}else{
			$this->edit($id_categoria);
		}

		
	}

	public function view($idCategoria){
		$data = array(
			'categoria' =>$this->Categorias_model->get_categoria($idCategoria), 
		);
		$this->load->view("admin/categorias/view",$data);
	}

	public function delete($idCategoria){
		$data = array(
			'estado' => "0", 
		);
		$this->Categorias_model->update($idCategoria,$data);
		echo "mantenimiento/categorias";
	}
}
