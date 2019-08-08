<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Articulos_model");
		$this->load->model("Marcas_model");
		$this->load->model("Categorias_model");
		$this->load->model("Colores_model");
		$this->load->library("upload");
	}

	public function index(){
		$data = array(
			'articulos' => $this->Articulos_model->get_articulos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/articulos/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data = array(
			'marcas' => $this->Marcas_model->get_marcas(),
			'categorias' => $this->Categorias_model->get_categorias(),
			'colores' => $this->Colores_model->get_colores() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/articulos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$imagenNombre=$_FILES['foto']['name'];
	    $foto="imagenes/$imagenNombre";
	    move_uploaded_file($_FILES['foto']['tmp_name'],$foto);


		$codigo=$this->input->post("codigo");
		$modelo=$this->input->post("modelo");
		$imagen=$foto;
		$marca=$this->input->post("marca");
		$color=$this->input->post("color");
		$precio=$this->input->post("precio");
		$stock=$this->input->post("stock");
		$categoria=$this->input->post("categoria");
		$descripcion=$this->input->post("descripcion");
		$idusuario = $this->session->userdata("id");


		//declaramos valores a validar y reglas correspondientes
		$this->form_validation->set_rules("codigo","Codigo","required|numeric|is_unique[articulo.codigo]");
		$this->form_validation->set_rules("modelo","Modelo","required");
		$this->form_validation->set_rules("precio","Precio","required|decimal");
		$this->form_validation->set_rules("stock","Stock","required|integer");

		if ($this->form_validation->run()) {
			$data = array(
			'codigo' =>$codigo,
			'modelo' =>$modelo,
			'urlImagen'=>$imagen,
			'idMarca' =>$marca,
			'idColor' =>$color,
			'precio' =>$precio,
			'stock' =>$stock,
			'idCategoria' =>$categoria,
			'descripcion' =>$descripcion,
			'idUsuario' => $idusuario  
			);

			if ($this->Articulos_model->save($data)) {
				redirect(base_url()."mantenimiento/articulos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/articulos/add");
			}
		}else{
			$this->add();
		}
	}

	public function edit($idArticulo){
		$data = array(
			'articulo' => $this->Articulos_model->get_articulo($idArticulo),
			'marcas' => $this->Marcas_model->get_marcas(),
			'categorias' => $this->Categorias_model->get_categorias(),
			'colores' => $this->Colores_model->get_colores() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/articulos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idArticulo=$this->input->post("idArticulo");
		$codigo=$this->input->post("codigo");
		$modelo=$this->input->post("modelo");
		$marca=$this->input->post("marca");
		$color=$this->input->post("color");
		$precio=$this->input->post("precio");
		$stock=$this->input->post("stock");
		$categoria=$this->input->post("categoria");
		$descripcion=$this->input->post("descripcion");

		$articuloActual= $this->Articulos_model->get_articulo($idArticulo);

		if ($codigo == $articuloActual->codigo) {
			$is_unique='';
		}else{
			$is_unique='is_unique[articulo.codigo]';
		}

		//declaramos valores a validar y reglas correspondientes
		$this->form_validation->set_rules("codigo","Codigo","required");
		$this->form_validation->set_rules("modelo","Modelo","required".$is_unique);//contatenamos la regla de articulo actual
		$this->form_validation->set_rules("precio","Precio","required|decimal");
		$this->form_validation->set_rules("stock","Stock","required|integer");

		if ($this->form_validation->run()) {
			$data = array(
			'codigo' =>$codigo,
			'modelo' =>$modelo,
			'idMarca' =>$marca,
			'idColor' =>$color,
			'precio' =>$precio,
			'stock' =>$stock,
			'idCategoria' =>$categoria,
			'descripcion' =>$descripcion  
			);

			if ($this->Articulos_model->update($idArticulo,$data)) {
				redirect(base_url()."mantenimiento/articulos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/articulos/edit/".$idArticulo);
			}
		}else{
			$this->edit($idArticulo);
		}
	}

	public function delete($idArticulo){
		$data = array(
			'estado' => "0", 
		);
		$this->Articulos_model->update($idArticulo,$data);
		echo "mantenimiento/articulos";
	}

	public function reporteArticulos(){
		$data = array(
			'articulos' => $this->Articulos_model->get_articulos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/articulos/reporte",$data);
		$this->load->view("layouts/footer");
	}
}
