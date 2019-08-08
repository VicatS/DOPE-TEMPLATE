<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model("Empleados_model");
	  	if (!$this->session->userdata("login")) {
	  		redirect(base_url());
	  	}

	}

	function index()
	{

			$this->load->view('frontend/empleados');
	}

	function guardar(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$nombres = $this->input->post("nombres");
			$apellidos = $this->input->post("apellidos");
			$dni = $this->input->post("dni");
			$telefono = $this->input->post("telefono");
			$email = $this->input->post("email");

			$datos = array(
				"nombres_empleado" => $nombres,
				"apellidos_empleado" => $apellidos,
				"dni_empleado" => $dni,
				"telefono_empleado" => $telefono,
				"email_empleado" => $email,
				"id_usuario" => $this->session->userdata('id')
				);
			if($this->Empleados_model->guardar($datos)==true)
				echo "Registro Guardado";
			else
				echo "No se pudo guardar los datos";
		}
		else
		{
			show_404();
		}


	}

	function mostrar(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post("buscar");
			$datos = $this->Empleados_model->mostrar($buscar);
			echo json_encode($datos);
			
		}
		else
		{
			show_404();
		}
	}

	function actualizar(){
		if ($this->input->is_ajax_request()) {
			$idsele = $this->input->post("idsele");
			$nombres = $this->input->post("nombressele");
			$apellidos = $this->input->post("apellidossele");
			$dni = $this->input->post("dnisele");
			$telefono = $this->input->post("telefonosele");
			$email = $this->input->post("emailsele");
			$datos = array(
				"nombres_empleado" => $nombres,
				"apellidos_empleado" => $apellidos,
				"dni_empleado" => $dni,
				"telefono_empleado" => $telefono,
				"email_empleado" => $email
				);
			if($this->Empleados_model->actualizar($idsele,$datos) == true)
				echo "Registro Actualizado";
			else
				echo "No se pudo actualizar los datos";
			
		}
		else
		{
			show_404();
		}
	}

	function eliminar(){
		if ($this->input->is_ajax_request()) {
			$idsele = $this->input->post("id");
			if($this->Empleados_model->eliminar($idsele) == true)
				echo "Registro Eliminado";
			else
				echo "No se pudo eliminar los datos";
			
		}
		else
		{
			show_404();
		}
	}

}

