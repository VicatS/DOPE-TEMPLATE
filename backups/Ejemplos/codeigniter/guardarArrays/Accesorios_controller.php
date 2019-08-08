<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accesorios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Modelos_model");
		$this->load->model("Colores_model");
		$this->load->model("Accesorios_model");
		$this->load->library("upload");
	}


	public function store(){
		$imagenNombre=$_FILES['foto']['name'];
	    $foto="imagenes/modelos/$imagenNombre";
	    move_uploaded_file($_FILES['foto']['tmp_name'],$foto);
		
		$idmodelos= $this->input->post("id_modelos");
		$imagen= $foto;
		$colores = $this->input->post("colores");
		$precios= $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$idusuario = $this->session->userdata("id");

		for ($i=0; $i < count($idmodelos) ; $i++) { 
			$data = array(
				'idModelo' => $idmodelos,
				'imagen' => $imagen[$i],
				'idColor' => $colores[$i],
				'precio' => $precios[$i],
				'stock' => $cantidades[$i],
				'idUsuario' =>  $idusuario
			);		
		if ($this->Accesorios_model->save($data)) {
				redirect(base_url()."mantenimiento/modelos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/accesorios/add");
			}
		}
		
	}
}