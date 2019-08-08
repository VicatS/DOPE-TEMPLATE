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

	public function index(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
			$data = array(
			'permisos' => $this->permisos,
			'clientes' => $this->Clientes_model->get_clientes(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/list",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==2){
		$data = array(
			'permisos' => $this->permisos,
			'clientes' => $this->Clientes_model->get_clientes(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideVentas");
		$this->load->view("admin/clientes/list",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==3){
		$data = array(
			'permisos' => $this->permisos,
			'clientes' => $this->Clientes_model->get_clientes(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnico");
		$this->load->view("admin/clientes/list",$data);
		$this->load->view("layouts/footer");
		}
	}
	public function add(){
		//para evitar inyeccion
		if(! $this->permisos->insert){ 
			redirect(base_url()."mantenimiento/clientes"); 
			return;
		}

		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
		$data = array(
			'tipoclientes' => $this->Clientes_model->get_tipoclientes(),
			'tipodocumentos' => $this->Clientes_model->get_tipodocumentos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/add",$data);
		$this->load->view("layouts/footer");	
		
		}else if($this->session->userdata("rol")==2){
		$data = array(
			'tipoclientes' => $this->Clientes_model->get_tipoclientes(),
			'tipodocumentos' => $this->Clientes_model->get_tipodocumentos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideVentas");
		$this->load->view("admin/clientes/add",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==3){
		$data = array(
			'tipoclientes' => $this->Clientes_model->get_tipoclientes(),
			'tipodocumentos' => $this->Clientes_model->get_tipodocumentos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnico");
		$this->load->view("admin/clientes/add",$data);
		$this->load->view("layouts/footer");

		}
		
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

		$this->form_validation->set_rules("apellido_paterno","Apellido Paterno","required|min_length[3]|alpha|trim");
		$this->form_validation->set_rules("email","Email","min_length[3]|valid_email|trim");
		$this->form_validation->set_rules("celular","Celular","required|numeric");
		$this->form_validation->set_rules("nrodoc","Carnet","required|numeric|is_unique[cliente.numDocumento]");
		if ($this->form_validation->run() == TRUE) {
			$data = array(
			'nombres' =>$nombres,
			'apellidoPaterno' =>$apellido_paterno,
			'apellidoMaterno' =>$apellido_materno,
			'email' =>$email,
			'nroCelular' =>$celular,
			'telefonoReferencia' =>$telefono
			);

			if($ultimoid = $this->Personas_model->save($data)){
				$this->salvar_cliente($ultimoid,$razon_social,$nrodoc,$tipocli,$tipodoc,$idusuario);
				echo "Registro exitoso";
				redirect(base_url()."mantenimiento/clientes");
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/clientes/add");
			}
			}
			else{
				$this->add();	
			}		
		}

	//para guardar datos en tabla cliente y cargar metodo en funcion store clientes
	protected function salvar_cliente($ultimoid,$razon_social,$nrodoc,$tipocli,$tipodoc,$idusuario){
		$data = array(
			'idCliente' => $ultimoid,
			'razonSocial' => $razon_social,
			'numDocumento' => $nrodoc,
			'idTipoCliente' => $tipocli,
			'idTipoDocumento' => $tipodoc,
			'idUsuario' => $idusuario  
		);
		$this->Clientes_model->save($data);
	}

	public function edit($idPersona){
		//para evitar inyeccion
		if(! $this->permisos->edit){ 
			redirect(base_url()."mantenimiento/clientes"); 
			return;
		}	
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
		//para evitar inyeccion
		if(! $this->permisos->update){ 
			redirect(base_url()."mantenimiento/clientes"); 
			return;
		}	
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
		//para evitar inyeccion
		if(! $this->permisos->delete){ 
			redirect(base_url()."mantenimiento/clientes");
			return;
		}	
		$data = array(
			'estado' => "0", 
		);
		$this->Clientes_model->update($idCliente,$data);
		echo "mantenimiento/clientes";
	}
}
