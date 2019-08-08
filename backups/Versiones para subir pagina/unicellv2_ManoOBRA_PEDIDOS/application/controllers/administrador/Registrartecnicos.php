<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrartecnicos extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->load->model("Personas_model");
		$this->load->model("Usuarios_model");
	}


	public function storeTecnicos(){

		$nombres=$this->input->post("nombres");
		$apellido_paterno=$this->input->post("apellido_paterno");
		$email=$this->input->post("email");
		$celular=$this->input->post("celular");

		

		$nombre_usuario=$this->input->post("nombreUsuario");
		$contrasena=$this->input->post("contrasena");
		$rol_usuario=$this->input->post("rol");
		$estado_usuario=$this->input->post("estado");
		
			$data = array(
				'nombres' =>$nombres,
				'apellidoPaterno' =>$apellido_paterno,
				'email' =>$email,
				'nroCelular' =>$celular,
				);
			if($ultimoid = $this->Personas_model->save($data)){
				$this->salvar_usuario_tecnico($ultimoid, $nombre_usuario,$contrasena,$rol_usuario,$estado_usuario);

				redirect('inicio','refresh');
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."registrar");
			}
	}

	//para guardar datos en tabla usuario-tecnico y cargar metodo en funcion store usuarios
	protected function salvar_usuario_tecnico($ultimoid,$nombre_usuario,$contrasena,$rol_usuario,$estado_usuario){
		$data = array(
			'idUsuario' => $ultimoid,
			'nombreUsuario' =>$nombre_usuario,
			'contrasena' => sha1($contrasena),
			'idRol' => $rol_usuario,
			'estado' => $estado_usuario
		);
		$this->Usuarios_model->save($data);
	}

}
