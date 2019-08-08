<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Ordenservicio extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Clientes_model");
		$this->load->model("Articulos_model");
		$this->load->helper('fechaes_helper');
		$this->load->model("Servicios_model");
		$this->load->model("Ordenes_model");
		$this->load->model("Ventas_model");
	}

	public function reporteOrden(){
		$data = array(
			'ordenes' => $this->Ordenes_model->get_ordenes_reporte() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ordenes/reporte");
		$this->load->view("layouts/footer");
	}

	public function index(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
		$data = array(
			'permisos' => $this->permisos,
			'ordenes' => $this->Ordenes_model->get_ordenes() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ordenes/list",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==3){
		$data = array(
			'permisos' => $this->permisos,
			'ordenes' => $this->Ordenes_model->get_ordenes() 
		);	
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnico");
		$this->load->view("admin/ordenes/list",$data);
		$this->load->view("layouts/footer");
		}
	}

	public function add(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
		$data = array(
			'clientes' => $this->Clientes_model->get_clientes(),
			'articulos' => $this->Articulos_model->get_articulos_equipos(),
			'comprobantes' => $this->Ventas_model->get_ordenes(),
			'vendidos' => $this->Ordenes_model->get_articulocliente()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ordenes/add",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==3){
		$data = array(
			'clientes' => $this->Clientes_model->get_clientes(),
			'articulos' => $this->Articulos_model->get_articulos_equipos(),
			'comprobantes' => $this->Ventas_model->get_ordenes(),
			'vendidos' => $this->Ordenes_model->get_articulocliente()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnico");
		$this->load->view("admin/ordenes/add",$data);
		$this->load->view("layouts/footer");	
		}
	}

	public function get_servicios(){
		//capturamos variable post por medio de valor
		$valor = $this->input->post("valor");
		$clientes = $this->Ordenes_model->get_servicios($valor);
		//retornar valor en tipo json array
		echo json_encode($clientes);
	}

	public function store(){
		//elementos para tabla ordenservicio
		$idcliente = $this->input->post("idcliente");
		$modelo = $this->input->post("modelo");
		$imei_software = $this->input->post("imei_software");
		$imei_impreso = $this->input->post("imei_impreso");
		$descripcion = $this->input->post("descripcion");
		$idusuario = $this->session->userdata("id");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$serie = $this->input->post("serie");
		$idcomprobante = $this->input->post("idcomprobante");
		$nroordenservicio = $this->input->post("numero");
		$f_entrega = $this->input->post("fecha_entrega");
		
		//elementos para tabla detalleordenservicio
		$idServicio = $this->input->post("idServicio");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");
		$idusuario = $this->session->userdata("id");

		$this->form_validation->set_rules("modelo","Modelo","required");
		if ($this->form_validation->run() == TRUE) {
			$data = array(
			'idCliente' => $idcliente,
			'modeloEquipo' => $modelo,
			'imeiSoftware' => $imei_software,
			'imeiImpreso' => $imei_impreso,
			'descripcion' => $descripcion,
			'idUsuario' => $idusuario,
			'descuento' => $descuento,
			'total' => $total,
			'serie' => $serie,
			'idComprobante' => $idcomprobante,
			'nroOrdenServicio' => $nroordenservicio,
			'fechaEntrega' => $f_entrega
		);

			if($this->Ordenes_model->save($data)){
				$idOrdenServicio=$this->Ordenes_model->lastID();
				$this->updateComprobante($idcomprobante);
				$this->save_detalle_orden($idServicio,$idOrdenServicio,$precios,$cantidades,$importes,$idusuario);
				redirect(base_url()."movimientos/ordenservicio");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."movimientos/ordenservicio/add");
		}
		}else{
			$this->add();
		}
	}

	//actualizar numeracion comprobante ORDEN DE SERVICIO
	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Ventas_model->get_comprobante($idcomprobante);
		$data = array(
			'cantidad' => $comprobanteActual->cantidad + 1 
		);
		$this->Ventas_model->updateComprobante($idcomprobante,$data);
	}


	//guardar el detalleOrdenServicio
	protected function save_detalle_orden($servicios,$idOrdenServicio,$precios,$cantidades,$importes,$idusuario){
		for ($i=0; $i < count($servicios) ; $i++) { 
			$data = array(
				'idServicio' => $servicios[$i],
				'idOrdenServicio' => $idOrdenServicio,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe' =>  $importes[$i],
				'idUsuario' => $idusuario,
			);
			$this->Ordenes_model->save_detalle_orden_servicio($data);
		}
	}

	public function view($idOrdenServicio){
		$data = array(
			// llamamos a los metodos para recuperar los valores correspondientes
			'orden' => $this->Ordenes_model->get_ordenservicio($idOrdenServicio),
			'detalles' => $this->Ordenes_model->get_detalle($idOrdenServicio)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ordenes/listarOrden",$data);
		$this->load->view("layouts/footer");
	}

	//estado avance orden
	public function estado($idOrdenServicio){
		$data = array(
			'orden' => $this->Ordenes_model->get_ordenservicio($idOrdenServicio),
			'estados' => $this->Ordenes_model->get_estados($idOrdenServicio) 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ordenes/estado",$data);
		$this->load->view("layouts/footer");

	}

	public function updateEstado(){
		$idOrdenServicio = $this->input->post("idOrdenServicio");
		$cambiarEstado = $this->input->post("cambiarEstado");

		$data = array(
			'idEstadoOrdenServicio' => $cambiarEstado 
		);
		$this->Ordenes_model->updateEstado($idOrdenServicio,$data);
		redirect(base_url()."movimientos/ordenservicio");
	
	}

	public function delete($idOrdenServicio){
		$data = array(
			'estado' => "0"
		);
		$this->Ordenes_model->updateEstado($idOrdenServicio,$data);
		redirect(base_url()."movimientos/ordenservicio");
	}
}