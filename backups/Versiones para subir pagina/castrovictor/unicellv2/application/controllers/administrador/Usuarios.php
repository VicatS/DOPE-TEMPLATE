<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Personas_model");
		$this->load->model("Usuarios_model");
		$this->load->library("upload");
	}

	//mostrar usuarios
	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'usuarios'=> $this->Usuarios_model->get_usuarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("layouts/footer");
	}

	//agregar un nuevo usuario
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
		
		$this->form_validation->set_rules("apellido_paterno","Apellido Paterno","required|alpha|trim");
		$this->form_validation->set_rules("celular","Celular","required|numeric|trim");
		$this->form_validation->set_rules("nombreUsuario","Nombre de Usuario","required|alpha_numeric|is_unique[usuario.nombreUsuario]|trim");
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
				$this->salvar_usuario($ultimoid, $nombre_usuario,$contrasena,$imagen,$rol_usuario);

				redirect('administrador/usuarios','refresh');
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."administrador/usuarios/add");
			}
			}
			else{
				$this->add();	
			}		
	}

	//para guardar datos en tabla cliente y cargar metodo en funcion store clientes
	protected function salvar_usuario($ultimoid,$nombre_usuario,$contrasena,$imagen,$rol_usuario){
		$data = array(
			'idUsuario' => $ultimoid,
			'nombreUsuario' =>$nombre_usuario,
			'password' => $contrasena,
			'contrasena' => sha1($contrasena),
			'imagenUsuario'=> $imagen,
			'idRol' => $rol_usuario
		);
		$this->Usuarios_model->save($data);
	}


	public function view(){
		$idusuario = $this->input->post("idusuario");
		$data = array(
			'usuario' => $this->Usuarios_model->get_usuario($idusuario) 
		);
		$this->load->view('admin/usuarios/view',$data);
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

		$id_usuario=$this->input->post("id_usuario");
		$nombre_usuario=$this->input->post("nombreUsuario");
		$contrasena= $this->input->post("contrasena");

		$data = array(
			'nombres' =>$nombres,
			'apellidoPaterno' =>$apellido_paterno,
			'apellidoMaterno' =>$apellido_materno,
			'email' =>$email,
			'nroCelular' => $celular,
			'telefonoReferencia' => $telefono
		);
		$this->Personas_model->update($id_persona,$data);
		$this->actualizar_usuario($id_usuario,$nombre_usuario,$contrasena);

		redirect('administrador/usuarios', 'refresh');
	}

	protected function actualizar_usuario($id_usuario,$nombre_usuario,$contrasena){
		$data = array(
			'idUsuario' => $id_usuario,
			'nombreUsuario' =>$nombre_usuario,
			'password' => $contrasena,
			'contrasena' => sha1($contrasena)
		);
		$this->Usuarios_model->update($id_usuario,$data);
	}

	public function delete($idUsuario){
		$data = array(
			'estado' => "0", 
		);
		$this->Usuarios_model->delete($idUsuario,$data);
		echo "administrador/usuarios";
	}
}
