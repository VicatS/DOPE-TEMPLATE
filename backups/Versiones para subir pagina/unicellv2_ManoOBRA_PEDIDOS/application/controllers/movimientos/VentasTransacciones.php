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
		$this->load->model("Modelos_model");
		$this->load->model("Accesorios_model");
		$this->load->helper('fechaes_helper');
	}

	//vista principal 
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

	public function get_modelos(){
		//capturamos variable post por medio de valor
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->get_accesorios($valor);
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

		$idAccesorio = $this->input->post("idAccesorio");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");

		$venta = array(
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

		for ($i=0; $i < count($idAccesorio) ; $i++) { 
		$detalleventa = array(
			'idAccesorio' => $idAccesorio[$i],
			'idVenta' => $idVenta,
			'precio' => $precios[$i],
			'cantidad' => $cantidades[$i],
			'importe' => $importes[$i] 
		);
		}

		$resultado = $this->Ventas_model->transaccion($venta,$detalleventa);
		if ($resultado) {
			echo "Venta realizada con éxito.";
		}else{
			echo "La venta no se realizó.";
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
	protected function save_detalle($accesorios,$idVenta,$precios,$cantidades,$importes){
		for ($i=0; $i < count($accesorios) ; $i++) { 
			$data = array(
				'idAccesorio' => $accesorios[$i],
				'idVenta' => $idVenta,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe' =>  $importes[$i]
			);
			$this->Ventas_model->save_detalle($data);
			//modificar stock
			$this->updateAccesorio($accesorios[$i], $cantidades[$i]);
		}
	}

	//actualizar la cantidad de stock de accesorios
	protected function updateAccesorio($idAccesorio,$cantidad){
		$modeloActual = $this->Accesorios_model->get_accesorio($idAccesorio);
		$data = array(
			'stock' => $modeloActual->stock - $cantidad 
		);
		$this->Accesorios_model->update($idAccesorio,$data);
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
			$infoaccesorio = $this->Accesorios_model->get_accesorio($detalle->idAccesorio);

			$accesoriosAsociados = $this->Accesorios_model->get_accesorios($detalle->idAccesorio);

			$dataAccesorio = array(
				'stock' => $infoaccesorio->stock + $detalle->cantidad
			);

			$this->Accesorios_model->update($detalle->idAccesorio,$dataAccesorio);
		}
	}
	
}