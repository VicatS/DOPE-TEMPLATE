<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ventas_model");
		$this->load->model("Clientes_model");
		$this->load->model("Articulos_model");
		$this->load->helper('fechaes_helper');
	}

	/*public function mostrarfecha(){
		$fecha = date("d-m-Y");
		//$mensaje = fecha_es($fecha, "d-m-Y"); //Resultado: 25 Jun 2014

		$data = array(
			'fecha' => $fecha 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/add",$data);
		$this->load->view("layouts/footer");
	}*/


	public function index(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
		$data = array(
			'permisos' => $this->permisos,
			'ventas' => $this->Ventas_model->get_ventas() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/list",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==2){
		$data = array(
			'permisos' => $this->permisos,
			'ventas' => $this->Ventas_model->get_ventas() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideVentas");
		$this->load->view("admin/ventas/list",$data);
		$this->load->view("layouts/footer");
		}
	}

	public function add(){
		$idrol = $this->session->userdata("rol");
		if ($this->session->userdata("rol")==1) {
		$data = array(
			'comprobantes' => $this->Ventas_model->get_comprobantes(),
			'clientes' => $this->Clientes_model->get_clientes()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/add",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==2){
		$data = array(
			'comprobantes' => $this->Ventas_model->get_comprobantes(),
			'clientes' => $this->Clientes_model->get_clientes()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideVentas");
		$this->load->view("admin/ventas/add",$data);
		$this->load->view("layouts/footer");
		}
	}

	public function get_articulos(){
		//capturamos variable post por medio de valor
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->get_articulos($valor);
		//retornar valor en tipo json array
		echo json_encode($clientes);
	}

	//para capturar informacion del formulario ventas
	public function store(){
		$subtotal = $this->input->post("subtotal");
		$iva = $this->input->post("iva");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");
		$idcliente = $this->input->post("idcliente");
		$idusuario = $this->session->userdata("id");
		$numero = $this->input->post("numero");
		$serie = $this->input->post("serie");

		$idArticulo = $this->input->post("idArticulo");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");

		//$lang['less_than']			= "El campo %s debe contener un número menor que %s.";
		
		$data = array(
			'subtotal' => $subtotal,
			'iva' => $iva,
			'descuento' => $descuento,
			'total' => $total,
			'idComprobante' => $idcomprobante,
			'idCliente' => $idcliente,
			'idUsuario' => $idusuario,
			'numDocumento' => $numero,
			'serie' => $serie
		);

		if ($this->Ventas_model->save($data)) {
			$idVenta=$this->Ventas_model->lastID();
			$this->updateComprobante($idcomprobante);
			$this->save_detalle($idArticulo,$idVenta,$precios,$cantidades,$importes);
			redirect(base_url()."movimientos/ventas");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."movimientos/ventas/add");
		}
	}

	//para sumar la cantidad de nota de venta emitidas
	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Ventas_model->get_comprobante($idcomprobante);
		$data = array(
			'cantidad' => $comprobanteActual->cantidad + 1 
		);
		$this->Ventas_model->updateComprobante($idcomprobante,$data);
	}

	//guardar el dettaleVenta
	protected function save_detalle($articulos,$idVenta,$precios,$cantidades,$importes){
		for ($i=0; $i < count($articulos) ; $i++) { 
			$data = array(
				'idArticulo' => $articulos[$i],
				'idVenta' => $idVenta,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe' =>  $importes[$i]
			);
			$this->Ventas_model->save_detalle($data);
			//modificar stock
			$this->updateArticulo( $articulos[$i], $cantidades[$i]);
		}
	}

	//actualizar la cantidad de articulos
	protected function updateArticulo($idArticulo,$cantidad){
		$articuloActual = $this->Articulos_model->get_articulo($idArticulo);
		$data = array(
			'stock' => $articuloActual->stock - $cantidad 
		);
		$this->Articulos_model->update($idArticulo,$data);
	}

	//para mostrar en modal
	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			// llamamos a los metodos para recuperar los valores correspondientes
			'venta' => $this->Ventas_model->get_venta($idventa),
			'detalles'=> $this->Ventas_model->get_detalle($idventa) 
		);
		$this->load->view("admin/ventas/view",$data);
	}

	public function delete($idVenta){
		$data = array(
			'estado' => "0", 
		);
		$this->Ventas_model->delete($idVenta,$data);
		$this->retornarStockVenta($idVenta);
		redirect(base_url()."movimientos/ventas");
	}

	protected function retornarStockVenta($idVenta){
		$detalles = $this->Ventas_model->get_detalle($idVenta);

		foreach ($detalles as $detalle) {
			$infoarticulo = $this->Articulos_model->get_articulo($detalle->idArticulo);

			$articulosAsociados = $this->Articulos_model->get_articulos($detalle->idArticulo);

			$dataArticulo = array(
				'stock' => $infoarticulo->stock + $detalle->cantidad
			);

			$this->Articulos_model->update($detalle->idArticulo,$dataArticulo);
		}
	}
	
}