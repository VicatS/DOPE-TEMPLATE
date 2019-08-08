<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}

	public function index(){
		if ($this->session->userdata("login")) {
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view("admin/login");
		}
		
	}

	public function login(){
		$nombre_usuario = $this->input->post("nombre_usuario");
		$contrasena = $this->input->post("contrasena");
		$res = $this->Usuarios_model->login($nombre_usuario, sha1($contrasena));

		if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url()."auth");
		}
		else{
			$data  = array(
				'nombre' =>$res->nombres,
				'id' => $res->idUsuario, 
				'nombreRol' => $res->nombreRol,//
				'rol' => $res->idRol,//
				'imagen' => $res->imagenUsuario,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."dashboard");
		}
	}

	public function cerrar_sesion(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
