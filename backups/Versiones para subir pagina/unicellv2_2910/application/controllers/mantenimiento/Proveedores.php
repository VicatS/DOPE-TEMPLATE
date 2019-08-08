<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model('Personas_model');
		$this->load->model('Proveedores_model');
	}

	public function index()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/proveedores/add");
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data = array(
			'tipoclientes' => $this->Proveedores_model->get_tipoclientes(),
			'tipodocumentos' => $this->Proveedores_model->get_tipodocumentos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$nombres=$this->input->post("nombres");
		$apellido_paterno=$this->input->post("apellido_paterno");
		$apellido_materno=$this->input->post("apellido_materno");
		$email=$this->input->post("email");

		$nombre_empresa=$this->input->post("nombre_empresa");
		$representante=$this->input->post("representante");
		$domicilio=$this->input->post("domicilio");
		$telefono_empresarial=$this->input->post("telefono_empresarial");
		$idusuario = $this->session->userdata("id");

			$data = array(
			'nombres' =>$nombres,
			'apellidoPaterno' =>$apellido_paterno,
			'apellidoMaterno' =>$apellido_materno,
			'email' =>$email
			);

			$ultimoid = $this->Personas_model->save($data);
			$this->salvar_proveedor($ultimoid,$nombre_empresa,$representante,$domicilio,$telefono_empresarial,$idusuario);

			redirect('dashboard', 'refresh');
	}

	protected function salvar_proveedor($ultimoid,$nombre_empresa,$representante,$domicilio,$telefono_empresarial,$idusuario){
		$data = array(
			'idProveedor' => $ultimoid,
			'nombreEmpresa' => $nombre_empresa,
			'representanteLegal' => $representante,
			'domicilio' => $domicilio,
			'telefonoEmpresa' => $telefono_empresarial,
			'idUsuario' => $idusuario
		);
		$this->Proveedores_model->save($data);
	}
	


	public function edit($idCliente){
		$data = array(
			'cliente' => $this->Proveedores_model->get_cliente($idCliente),
			'tipoclientes' => $this->Proveedores_model->get_tipoclientes(),
			'tipodocumentos' => $this->Proveedores_model->get_tipodocumentos() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_cliente=$this->input->post("id_cliente");
		$nombres=$this->input->post("nombres");
		$nrodoc=$this->input->post("nrodoc");
		$tipocli=$this->input->post("tipocli");
		$tipodoc=$this->input->post("tipodoc");

		$data = array(
			'nombreCliente' =>$nombres,
			'numDocumento' =>$nrodoc,
			'idTipoCliente' =>$tipocli,
			'idTipoDocumento' =>$tipodoc
		);

		if ($this->Clientes_model->update($id_cliente,$data)) {
			redirect(base_url()."mantenimiento/clientes");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."mantenimiento/clientes/edit/".$id_cliente);
		}
	}

	public function view($idCliente){
		$data = array(
			'categoria' =>$this->Proveedores_model->get_cliente($idCliente), 
		);
		$this->load->view("admin/clientes/view",$data);
	}

	public function delete($idCliente){
		$data = array(
			'estado' => "0", 
		);
		$this->Proveedores_model->update($idCliente,$data);
		echo "mantenimiento/clientes";
	}
}
