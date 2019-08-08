<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Personas_model");
		$this->load->model("Clientes_model");
	}

	public function index()
	{
		$data = array(
			'permisos' => $this->permisos,
			'clientes' => $this->Clientes_model->get_clientes(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/list",$data);
		$this->load->view("layouts/footer");
	}
	public function add(){
		$data = array(
			'tipoclientes' => $this->Clientes_model->get_tipoclientes(),
			'tipodocumentos' => $this->Clientes_model->get_tipodocumentos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$nombres=$this->input->post("nombres");
		$apellido_paterno=$this->input->post("apellido_paterno");
		$apellido_materno=$this->input->post("apellido_materno");
		$email=$this->input->post("email");
		$celular=$this->input->post("celular");
		$telefono=$this->input->post("telefono");

		$razon_social=$this->input->post("razon_social");
		$nrodoc=$this->input->post("nrodoc");
		$tipocli=$this->input->post("tipocli");
		$tipodoc=$this->input->post("tipodoc");
		$idusuario = $this->session->userdata("id"); 

		

		$data = array(
			'nombres' =>$nombres,
			'apellidoPaterno' =>$apellido_paterno,
			'apellidoMaterno' =>$apellido_materno,
			'email' =>$email,
			'nroCelular' =>$celular,
			'telefonoReferencia' =>$telefono
			);

			$ultimoid = $this->Personas_model->save($data);
			$this->salvar_cliente($ultimoid,$razon_social,$nrodoc,$tipocli,$tipodoc,$idusuario);

			redirect('mantenimiento/clientes', 'refresh');
		
	}

	//para guardar datos en tabla cliente y cargar metodo en funcion store clientes
	protected function salvar_cliente($ultimoid,$razon_social,$nrodoc,$tipocli,$tipodoc,$idusuario){
		$data = array(
			'idCliente' => $ultimoid,
			'razonSocial' =>$razon_social,
			'numDocumento' =>$nrodoc,
			'idTipoCliente' =>$tipocli,
			'idTipoDocumento' =>$tipodoc,
			'idUsuario' => $idusuario  
		);
		$this->Clientes_model->save($data);
	}

	public function edit($idPersona){
		$data = array(
			'persona' => $this->Personas_model->get_persona($idPersona),
			'cliente' => $this->Clientes_model->get_cliente($idPersona),
			'tipoclientes' => $this->Clientes_model->get_tipoclientes(),
			'tipodocumentos' => $this->Clientes_model->get_tipodocumentos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_persona=$this->input->post("id_persona");
		$nombres=$this->input->post("nombres");
		$apellido_paterno=$this->input->post("apellido_paterno");
		$apellido_materno=$this->input->post("apellido_materno");
		$email=$this->input->post("email");
		$celular=$this->input->post("celular");
		$telefono=$this->input->post("telefono");

		$id_cliente=$this->input->post("id_cliente");
		$razon=$this->input->post("razon");
		$nrodoc=$this->input->post("nrodoc");
		$tipocli=$this->input->post("tipocli");
		$tipodoc=$this->input->post("tipodoc");

		$data = array(
			'nombres' =>$nombres,
			'apellidoPaterno' =>$apellido_paterno,
			'apellidoMaterno' =>$apellido_materno,
			'email' =>$email,
			'nroCelular' => $celular,
			'telefonoReferencia' => $telefono
		);
		$this->Personas_model->update($id_persona,$data);
		$this->actualizar_cliente($id_cliente,$razon,$nrodoc,$tipocli,$tipodoc);

		redirect('mantenimiento/clientes', 'refresh');
	}

	protected function actualizar_cliente($id_cliente,$razon,$nrodoc,$tipocli,$tipodoc){
		$data = array(
			'idCliente' => $id_cliente,
			'razonSocial' =>$razon,
			'numDocumento' =>$nrodoc,
			'idTipoCliente' =>$tipocli,
			'idTipoDocumento' =>$tipodoc,
		);
		$this->Clientes_model->update($id_cliente,$data);
	}

	public function view($idCliente){
		$data = array(
			'categoria' =>$this->Clientes_model->get_cliente($idCliente), 
		);
		$this->load->view("admin/clientes/view",$data);
	}

	public function delete($idCliente){
		$data = array(
			'estado' => "0", 
		);
		$this->Clientes_model->update($idCliente,$data);
		echo "mantenimiento/clientes";
	}
}
