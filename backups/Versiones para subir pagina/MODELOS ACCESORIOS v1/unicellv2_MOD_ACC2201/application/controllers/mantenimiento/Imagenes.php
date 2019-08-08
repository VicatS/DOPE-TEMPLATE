<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagenes extends CI_Controller {

		//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Imagenes_model");
		$this->load->model("Articulos_model");
		$this->load->library("upload");
	}

	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'articulos' => $this->Articulos_model->get_articulos(), 
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/imagenes/add",$data);
		$this->load->view("layouts/footer");
	}


	public function subirImagen(){
		$config['upload_path']='./uploads/imagenes/';
		$config['allowed_types']='gif|jpg|png';
		$config['max_size']='2048';
		$config['max_widht']='2024';
		$config['max_height']='2008';

		$this->load->library('upload',$config);

		if (!$this->upload->do_upload("fileImagen")) {
			$data['error'] = $this->upload->display_errors();
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/imagenes/add",$data);
			$this->load->view("layouts/footer");
		}else{
			$file_info= $this->upload->data();

			$this->crearMiniatura($file_info['file_name']);
			$modelo = $this->input->post('modelo');
			$titulo = $this->input->post('titulo');
			$imagen= $file_info['file_name'];
			//$subir = $this->Imagenes_model->save($modelo,$titulo,$imagen);
			$data = array(
				'idArticulo' => $modelo, 
				'nombreImagen' => $titulo,
				'rutaImagen' => $imagen
			);
			$this->Imagenes_model->save($data);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/imagenes/vImagenSubida",$data);
			$this->load->view("layouts/footer");

		}
	}

	function crearMiniatura($filename){
		$config['image_library']='gd2';
		$config['source_image']='uploads/imagenes/'.$filename;
		$config['create_thumb']= TRUE;
		$config['maintan_ratio']= TRUE;
		$config['new_image']='uploads/imagenes/thumbs';
		$config['thumb_marker']='';
		$config['widht']= 150;
		$config['height']=150;
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
	}	

	


	public function store(){

		$imagenNombre=$_FILES['ruta']['name'];
	    $ruta="imagenes/$imagenNombre";
	    move_uploaded_file($_FILES['ruta']['tmp_name'],$ruta);

		$modelo=$this->input->post("modelo");
		$titulo=$this->input->post("titulo");
		$imagen=$ruta;
		$idusuario = $this->session->userdata("id");

			$data = array(
			'idArticulo' =>$modelo,
			'nombreImagen' =>$titulo,
			'rutaImagen' =>$imagen,
			'idUsuario' => $idusuario  
			);

			if ($this->Imagenes_model->save($data)) {
				redirect(base_url()."mantenimiento/articulos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."mantenimiento/imagenes/add");
			}
	}
}