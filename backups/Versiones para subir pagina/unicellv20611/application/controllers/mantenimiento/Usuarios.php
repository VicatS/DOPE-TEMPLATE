<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Personas_model");
		$this->load->model("Usuarios_model");
		$this->load->library("upload");
	}

	public function add()
	{
		$data = array(
			'roles' => $this->Usuarios_model->getRol()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add",$data);
		$this->load->view("layouts/footer");
	}
	public function index(){
		$data = array(
			'usuarios'=> $this->Usuarios_model->get_usuarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$imagenNombre=$_FILES['foto_usuario']['name'];
	    $foto_usuario="imagenes/$imagenNombre";
	    move_uploaded_file($_FILES['foto_usuario']['tmp_name'],$foto_usuario);
		$nombres=$this->input->post("nombres");
		$apellido_paterno=$this->input->post("apellido_paterno");
		$apellido_materno=$this->input->post("apellido_materno");
		$email=$this->input->post("email");
		$celular=$this->input->post("celular");
		$telefono=$this->input->post("telefono");

		

		$nombre_usuario=$this->input->post("nombreUsuario");
		$contrasena=$this->input->post("contrasena");
		$imagen=$foto_usuario;
		$rol_usuario=$this->input->post("rol");
		
		
		$data = array(
			'nombres' =>$nombres,
			'apellidoPaterno' =>$apellido_paterno,
			'apellidoMaterno' =>$apellido_materno,
			'email' =>$email,
			'nroCelular' =>$celular,
			'telefonoReferencia' =>$telefono
			);

			$ultimoid = $this->Personas_model->save($data);
			$this->salvar_usuario($ultimoid, $nombre_usuario,$contrasena,$imagen,$rol_usuario);

			//redirect('mantenimiento/usuarios','refresh');
	}

	//para guardar datos en tabla cliente y cargar metodo en funcion store clientes
	protected function salvar_usuario($ultimoid,$nombre_usuario,$contrasena,$imagen,$rol_usuario){
		$data = array(
			'idUsuario' => $ultimoid,
			'nombreUsuario' =>$nombre_usuario,
			'contrasena' =>$contrasena,
			'imagenUsuario'=> $imagen,
			'idRol' => $rol_usuario
		);
		$this->Usuarios_model->save($data);
	}

	public function edit($idPersona){
		$data = array(
			'persona' => $this->Personas_model->get_persona($idPersona),
			'usuario' => $this->Usuarios_model->get_usuario($idPersona),
			'roles' => $this->Usuarios_model->getRol($idPersona)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/edit",$data);
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
