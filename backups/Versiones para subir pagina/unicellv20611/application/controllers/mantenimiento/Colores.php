<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colores extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Colores_model");
	}

	public function index()
	{
		$data = array(
			'colores' => $this->Colores_model->get_colores(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/colores/list",$data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/colores/add");
		$this->load->view("layouts/footer");
	}
	public function store(){
		$nombre_color=$this->input->post("nombre_color");
		$idusuario = $this->session->userdata("id");

		//validaciones 
		$this->form_validation->set_rules("nombre_color","Color","required|alpha|is_unique[color.nombreColor]");
		if ($this->form_validation->run()) {
			$data = array(
			'nombreColor' =>$nombre_color,
				'idUsuario' => $idusuario
			);

			if ($this->Colores_model->save($data)) {
				redirect(base_url()."mantenimiento/colores");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/colores/add");
			}
		}else{
			$this->add();
		}
		
	}

	public function edit($idColor){
		$data = array(
			'color' => $this->Colores_model->get_color($idColor), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/colores/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_color=$this->input->post("id_color");
		$nombre_color=$this->input->post("nombre_color");

		$color_Actual = $this->Colores_model->get_color($id_color);
		//validar un dato ya existente
		if ($nombre_color==$color_Actual->nombreColor) {
			$unique = '';
		}else{
			$unique='|alpha|is_unique[color.nombreColor]';
		}

		$this->form_validation->set_rules("nombre_color","Color","required|alpha".$unique);//concatenoamos regla de validacion
		if ($this->form_validation->run()) {
			$data = array(
			'nombreColor' =>$nombre_color
			);

			if ($this->Colores_model->update($id_color,$data)) {
				redirect(base_url()."mantenimiento/colores");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/colores/edit/".$id_categoria);
			}
		}else{
			$this->edit($id_color);
		}
		
	}

	public function view($idColor){
		$data = array(
			'color' =>$this->Colores_model->get_color($idCategoria), 
		);
		$this->load->view("admin/colores/view",$data);
	}

	public function delete($idColor){
		$data = array(
			'estado' => "0", 
		);
		$this->Colores_model->update($idColor,$data);
		redirect(base_url()."mantenimiento/colores");
	}
}
