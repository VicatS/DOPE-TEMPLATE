<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Usuarios_model');
	}

	public function index(){
		$this->load->view('frontend/usuarios');
	}

	public function guardar(){
		if ($this->input->is_ajax_request()) {
			$email = $this->input->post("email");
			$nombres = $this->input->post("nombres");
			$apellidos = $this->input->post("apellidos");
			$password = $this->input->post("password");
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('nombres', 'Nombres', 'required');
			$this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
			$this->form_validation->set_rules('password', 'Contraseña', 'required');

			$this->form_validation->set_message('nombres', 'El campo %s es necesario');

			if ($this->form_validation->run() == TRUE) {
				$data = [
					"nombres" => $nombres,
					"apellidos" => $apellidos,
					"email" => $email, 
					"password" => sha1($password),
				];

				if ($this->Usuarios_model->guardar($data) == true) {
					echo "Exito";
				}
				else{
					echo "Error";
				}
			}
			else{
				echo validation_errors("<li>","</li>");
			}

			
		}
		else{
			show_404();		
		}

			
	}
}