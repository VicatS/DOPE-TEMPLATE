<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Permisos_model");
		$this->load->model("Usuarios_model");
	}



	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'permisos'=> $this->Permisos_model->get_permisos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/permisos/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data = array(
			'roles' => $this->Usuarios_model->getRol(),
			'menus' => $this->Permisos_model->getMenus()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/permisos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$rol = $this->input->post("rol");
		$menu = $this->input->post("menu");
		$leer = $this->input->post("leer");
		$insertar = $this->input->post("insertar");
		$editar = $this->input->post("editar");
		$eliminar = $this->input->post("eliminar");

		$data = array(
			'idRol' => $rol,
			'idMenu' => $menu, 
			'read' => $leer,
			'insert' => $insertar,
			'update' => $editar,
			'delete' => $eliminar
		);
		if ($this->Permisos_model->save($data)) {
			redirect(base_url()."administrador/permisos");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."administrador/permisos/add");
		}

	}

	//funcion para editar permisos
	public function edit($idPermiso){
		$data = array(
			'roles' => $this->Usuarios_model->getRol(),
			'menus' => $this->Permisos_model->getMenus(),
			'permiso' => $this->Permisos_model->getPermiso($idPermiso)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/permisos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idPermiso = $this->input->post("idPermiso");
		$leer = $this->input->post("leer");
		$insertar = $this->input->post("insertar");
		$editar = $this->input->post("editar");
		$eliminar = $this->input->post("eliminar");

		$data = array(
			'read' => $leer,
			'insert' => $insertar,
			'update' => $editar,
			'delete' => $eliminar
		);
		if ($this->Permisos_model->update($idPermiso,$data)) {
			redirect(base_url()."administrador/permisos");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."administrador/permisos/edit".$idPermiso);
		}
	}

	public function delete($idPermiso){
		$this->Permisos_model->delete($idPermiso);
		redirect(base_url()."administrador/permisos");
	}

}