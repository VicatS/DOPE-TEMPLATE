<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Permisos_model");
		$this->load->model("Usuarios_model");
	}



	public function index(){
		$data = array(
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
		$menu = $this->input->post("rol");
		$rol = $this->input->post("rol");
		$leer = $this->input->post("leer");
		$insertar = $this->input->post("insertar");
		$editar = $this->input->post("editar");
		$eliminar = $this->input->post("eliminar");

		$data = array(
			'idMenu' => $menu, 
			'idRol' => $rol,
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
}