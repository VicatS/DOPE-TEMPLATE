<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelos extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Marcas_model");
		$this->load->model("Categorias_model");
		$this->load->model("Colores_model");
		$this->load->model("Modelos_model");
		$this->load->library("upload");
	}

	public function index(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
			$data = array(
			'permisos' => $this->permisos,
			'modelos' => $this->Modelos_model->get_modelos() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/modelos/list",$data);
		$this->load->view("layouts/footer");	

		}else if($this->session->userdata("rol")==4){
		$data = array(
			'permisos' => $this->permisos,
			'modelos' => $this->Modelos_model->get_modelos() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnicosClientes");
		$this->load->view("admin/modelos/list",$data);
		$this->load->view("layouts/footer");	
		}
	}

	//version principal modelos-accesorios
	public function index2(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
			$data = array(
			'permisos' => $this->permisos,
			'modelos' => $this->Modelos_model->get_modelos() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/modelos/list",$data);
		$this->load->view("layouts/footer");	

		}else if($this->session->userdata("rol")==4){
		$data = array(
			'permisos' => $this->permisos,
			'modelos' => $this->Modelos_model->get_modelos() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnicosClientes");
		$this->load->view("admin/modelos/list",$data);
		$this->load->view("layouts/footer");	
		}
	}

	//para mostrar accesorios de modelos
	public function view(){
		$idmodelo = $this->input->post("id");
		$data = array(
			// llamamos a los metodos para recuperar los valores correspondientes
			'accesorios'=> $this->Modelos_model->get_accesorios($idmodelo) 
		);
		$this->load->view("admin/modelos/view",$data);
	}

	//agregar accesorio
	public function add($idModelo){
		$data = array(
			'modelo' => $this->Modelos_model->get_idmodelo($idModelo),
			'colores' => $this->Colores_model->get_colores(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");	
		$this->load->view("admin/modelos/addAccesorio",$data);
		$this->load->view("layouts/footer");
	}

		//agregar modelo
	public function addModelo(){
		
		$data = array(
			'marcas' => $this->Marcas_model->get_marcas(),
			'categorias' => $this->Categorias_model->get_categorias(),
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");	
		$this->load->view("admin/modelos/add",$data);
		$this->load->view("layouts/footer");
	}



	public function store(){
		$imagenNombre=$_FILES['foto']['name'];
	    $foto="imagenes/$imagenNombre";
	    move_uploaded_file($_FILES['foto']['tmp_name'],$foto);

		$nombre = $this->input->post("nombre_modelo");
		$calidad = $this->input->post("calidad");
		$categoria = $this->input->post("categoria");
		$marca = $this->input->post("marca");
		$imagen= $foto;
		$descripcion = $this->input->post("descripcion");
		$idusuario = $this->session->userdata("id");

		$data = array(
			'nombreModelo' => $nombre,
			'calidad' => $calidad, 
			'idCategoria' => $categoria,
			'idMarca' => $marca,
			'rutaImagen' => $imagen,
			'descripcion' => $descripcion,
			'idUsuario' => $idusuario
			
		);
		if ($this->Modelos_model->save($data)) {
			redirect(base_url()."mantenimiento/modelos");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."mantenimiento/modelos/add");
		}

	}


	public function storeAccesorios(){
		$imagenNombre=$_FILES['foto']['name'];
	    $foto="imagenes/modelos/$imagenNombre";
	    move_uploaded_file($_FILES['foto']['tmp_name'],$foto);
		
		$idmodelo = $this->input->post("id_modelo");
		$imagen= $foto;
		$color = $this->input->post("color");
		$precio = $this->input->post("precio");
		$cantidad = $this->input->post("cantidad");
		$idusuario = $this->session->userdata("id");

		$data = array(
			'idModelo' => $idmodelo,
			'imagen' =>$imagen,
			'idColor' => $color,
			'precio' => $precio,
			'stock' => $cantidad,
			'idUsuario' => $idusuario 
		);

		if ($this->Modelos_model->saveAccesorio($data)) {
				redirect(base_url()."mantenimiento/modelos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/modelos/addAccesorio");
			}
	}

}
