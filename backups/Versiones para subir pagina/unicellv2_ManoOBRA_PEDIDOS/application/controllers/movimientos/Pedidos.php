<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	//para dar permisos
	private $permisos;

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Clientes_model");
		$this->load->model("Modelos_model");
		$this->load->model("Accesorios_model");
		$this->load->model("Pedidos_model");
		$this->load->model("Ventas_model");
	}


	public function index(){
		$idusuario = $this->session->userdata("id");
		if ($this->session->userdata("rol")==1) {
			$data = array(
				'pedidos' => $this->Pedidos_model->get_pedidos_usuarioTecnico($idusuario) 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/pedidos/list",$data);
			$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==4){
			$data = array(
				'pedidos' => $this->Pedidos_model->get_pedidos_usuarioTecnico($idusuario) 
			);

			$this->load->view("layouts/header");
			$this->load->view("layouts/asideTecnicosClientes");
			$this->load->view("admin/pedidos/list",$data);
			$this->load->view("layouts/footer");	
		}
	}

	public function add(){
		$idusuario = $this->session->userdata("id");
		if ($this->session->userdata("rol")==1) {
		$data = array(
			'comprobantes' => $this->Pedidos_model->getComprobantePedido(),
			'clientes' => $this->Pedidos_model->get_clientes(),

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/pedidos/add",$data);
		$this->load->view("layouts/footer");

		}else if($this->session->userdata("rol")==4){
		$data = array(
			'comprobantes' => $this->Pedidos_model->getComprobantePedido(),
			'clientes' => $this->Pedidos_model->get_clientes(),

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/asideTecnicosClientes");
		$this->load->view("admin/pedidos/add",$data);
		$this->load->view("layouts/footer");	
		}

	}	

	public function store(){
		$total = $this->input->post("total");
		$idusuario = $this->session->userdata("id");
		$numero = $this->input->post("numero");
		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");


		$idAccesorio = $this->input->post("idAccesorio");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");

		$data = array(
			'total' => $total,
			'idUsuario' => $idusuario,
			'numDocumento' => str_pad($numero,6,"0", STR_PAD_LEFT),
			'total' =>$total
		);

		if ($this->Pedidos_model->save($data)) {
			$idPedido=$this->Pedidos_model->lastID();
			$this->updateComprobante($idcomprobante);
			$this->save_detallePedido($idAccesorio,$idPedido,$cantidades,$importes);//datos para detallePedido
			redirect(base_url()."movimientos/pedidos");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."movimientos/pedidos/add");
		}
	}


	//para sumar la cantidad de nota de pedido
	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Ventas_model->get_comprobante($idcomprobante);
		$data = array(
			'cantidad' => $comprobanteActual->cantidad + 1 
		);
		$this->Ventas_model->updateComprobante($idcomprobante,$data);
	}

	//guardar el dettaleVenta
	protected function save_detallePedido($accesorios,$idPedido,$cantidades,$importes){
		for ($i=0; $i < count($accesorios) ; $i++) { 
			$data = array(
				'idAccesorio' => $accesorios[$i],
				'idPedido' => $idPedido,
				'cantidad' => $cantidades[$i],
				'subTotal' =>  $importes[$i]
			);
			$this->Pedidos_model->save_detalle($data);
			//modificar stock
			//$this->updateAccesorio($accesorios[$i], $cantidades[$i]);
		}
	}

	public function get_accesorios(){
		//capturamos variable post por medio de valor
		$valor = $this->input->post("valor");
		$clientes = $this->Pedidos_model->get_accesorios($valor);
		//retornar valor en tipo json array
		echo json_encode($clientes);
	}

	//para mostrar en modal
	public function view($idpedido){
		$data = array(
			// llamamos a los metodos para recuperar los valores correspondientes
			'pedido' => $this->Pedidos_model->get_pedido($idpedido),
			'detalles'=> $this->Pedidos_model->get_detalle($idpedido) 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/pedidos/view",$data);
		$this->load->view("layouts/footer");
	}

	//prueba 2
	public function view2(){
		$idpedido = $this->input->post("id");
		$data = array(
			// llamamos a los metodos para recuperar los valores correspondientes
			'pedido' => $this->Pedidos_model->get_pedido($idpedido),
			'detalles'=> $this->Pedidos_model->get_detalle($idpedido) 
		);
		
		$this->load->view("admin/pedidos/view2",$data);

	}

}