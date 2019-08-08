<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	function ingresar(){
		$email = $this->input->post("email");
		$password= sha1($this->input->post("password"));
		$resp = $this->Login_model->login($email, $password);
		if($resp){
			$data = [
				"id" => $resp->id_usuario,
				"name" => $resp->nombres,
				"login" => TRUE
			];

			$this->session->set_userdata($data);
		}
		else{
			echo "error";
		}
	}

	function cerrar(){
		$this->session->sess_destroy();
	}
}