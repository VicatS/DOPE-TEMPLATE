<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Empleados_model");
	}

	public function index()
	{
		$data = array(
			'empleados' => $this->Empleados_model->get_empleados(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/empleados/list",$data);
		$this->load->view("layouts/footer");
	}
	public function add(){
		$data = array(
			'empleados' => $this->Empleados_model->get_tipoclientes()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/empleados/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$nombres=$this->input->post("nombres");
		$nrodoc=$this->input->post("nrodoc");
		$tipocli=$this->input->post("tipocli");
		$tipodoc=$this->input->post("tipodoc");
		$idusuario = $this->session->userdata("id"); 

		//validaciones 
		$this->form_validation->set_rules("nombres","Nombre Cliente","required|alpha");
		$this->form_validation->set_rules("nrodoc","CI/NIT","required|numeric|is_unique[cliente.numDocumento]");

		if ($this->form_validation->run()) {
			$data = array(
			'nombreCliente' =>$nombres ,
			'numDocumento' =>$nrodoc,
			'idTipoCliente' =>$tipocli,
			'idTipoDocumento' =>$tipodoc,
			'idUsuario' => $idusuario  
			);

			if ($this->Emppleados_model->save($data)) {
				redirect(base_url()."mantenimiento/empleados");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/empleados/add");
			}
		}else{
			$this->add();
		}
		
	}

	public function store_cliente($idPersona){
		$idCliente=$this->input->post("");
		$apPat=$this->input->post("apPat");
		$data = array(
			'nombres' =>$nombres ,
			'apellidoPaterno' =>$apPat,
			'apellidoMaterno' =>$apMat,
			'email' =>$email  
		);

		if ($this->Emppleados_model->save_cliente($data)) {
			redirect(base_url()."mantenimiento/clientes");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."mantenimiento/clientes/add");
		}
	}

	public function edit($idCliente){
		$data = array(
			'cliente' => $this->Empleados_model->get_cliente($idCliente),
			'tipoclientes' => $this->Empleados_model->get_tipoclientes(),
			'tipodocumentos' => $this->Empleados_model->get_tipodocumentos() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_cliente=$this->input->post("id_cliente");
		$nombres=$this->input->post("nombres");
		$nrodoc=$this->input->post("nrodoc");
		$tipocli=$this->input->post("tipocli");
		$tipodoc=$this->input->post("tipodoc");

		$data = array(
			'nombreCliente' =>$nombres,
			'numDocumento' =>$nrodoc,
			'idTipoCliente' =>$tipocli,
			'idTipoDocumento' =>$tipodoc
		);

		if ($this->Emppleados_model->update($id_cliente,$data)) {
			redirect(base_url()."mantenimiento/clientes");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."mantenimiento/clientes/edit/".$id_cliente);
		}
	}

	public function view($idCliente){
		$data = array(
			'categoria' =>$this->Empleados_model->get_cliente($idCliente), 
		);
		$this->load->view("admin/clientes/view",$data);
	}

	public function delete($idCliente){
		$data = array(
			'estado' => "0", 
		);
		$this->Emppleados_model->update($idCliente,$data);
		echo "mantenimiento/empleados";
	}
}
