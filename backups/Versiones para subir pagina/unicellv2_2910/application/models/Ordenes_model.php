<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_ordenes(){
		$this->db->select("o.*, cl.*,cl.razonSocial as cliente,tc.nombreComprobante as TIPOCOMPROBANTE, o.idCliente as CLIENTE");
		$this->db->select("CONCAT(P.nombres,' ', p.apellidoPaterno,' ', p.apellidoMaterno) AS nombrecompleto", FALSE);
		$this->db->select("p.*");
		$this->db->select("DATE_FORMAT(o.fechaRecepcion, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->select("eo.*");
		$this->db->from("ordenservicio o");
		$this->db->join("cliente cl","cl.idCliente=o.idCliente");
		$this->db->join("persona p","cl.idCliente=p.idPersona");
		$this->db->join("comprobante tc","tc.idComprobante=o.idComprobante");
		$this->db->join("estadoordenservicio eo","eo.idEstadoOrdenServicio=o.idEstadoOrdenServicio");
		$this->db->order_by("o.fechaRecepcion","desc");
		$resultados=$this->db->get();
		if ($resultados->num_rows()>0) {
			return $resultados->result();
		}else{
			return false;
		}
	}

	

	public function get_servicios($valor){
		$this->db->select("idServicio, nombreServicio as label, precio");
		$this->db->from("servicio");
		$this->db->where("estado","1");
		$this->db->like("nombreServicio",$valor);
		$resultados=$this->db->get();
		//recuperar valor en array
		return $resultados->result_array();
	}

	// guardar datos despues de recibir datos de funcion store-ordenServicio
	public function save($data){
		return $this->db->insert("ordenservicio",$data);
	}


	//recuperar ultimoID OrdenServicio para guardar en detalleOrdenServicio
	public function lastID(){
		return $this->db->insert_id();
	}


	//recuperar un comprobante para llenar aumentar la cantidad de ordenes emitidas
	public function get_comprobante($idcomprobante){
		$this->db->where("idComprobante",$idcomprobante);
		$resultado = $this->db->get("comprobante");
		return $resultado->row();
	}

	// para guardar detalle de venta
	public function save_detalle_orden_servicio($data){
		$this->db->insert("detalleordenservicio",$data);
	}

	// recupera elementos de orden de servicio para modal
	public function get_ordenservicio($idOrdenServicio){
		$this->db->select("o.*,cl.razonSocial as RAZON, cl.numDocumento as NUMDOC,tc.nombreComprobante as TIPOCOMPROBANTE");
		$this->db->select("CONCAT(p.nombres,' ', p.apellidoPaterno,' ', p.apellidoMaterno) AS nombrecompleto", FALSE);
		$this->db->select("p.*");
		$this->db->select("u.*");
		$this->db->select("eo.*");
		$this->db->select("DATE_FORMAT(o.fechaRecepcion, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->select("DATE_FORMAT(o.fechaEntrega, '%d-%m-%Y') as fecha_entrega", FALSE);
		$this->db->from("ordenservicio o");
		$this->db->join("cliente cl","cl.idCliente=o.idCliente");
		$this->db->join("usuario u","u.idUsuario=o.idUsuario");
		$this->db->join("persona p","p.idPersona=cl.idCliente");
		$this->db->join("comprobante tc","tc.idComprobante=o.idComprobante");
		$this->db->join("estadoordenservicio eo","eo.idEstadoOrdenServicio=o.idEstadoOrdenServicio");
		$this->db->where("o.idOrdenServicio",$idOrdenServicio);
		$this->db->order_by("o.fechaRecepcion","desc");		
		$resultado = $this->db->get();
		return $resultado->row();
	}

	//recuperar elementos de detalleordenservicio para modal
	public function get_detalle($idOrdenServicio){
		$this->db->select("do.*, s.nombreServicio");
		$this->db->from("detalleordenservicio do");
		$this->db->join("servicio s","s.idServicio=do.idServicio");
		$this->db->where("do.idOrdenServicio",$idOrdenServicio);
		$resultado = $this->db->get();
		//metodo result() para recuperar mas de un registro
		return $resultado->result();

	}

	//recuperar IMEI vendidos-clientes
	public function get_articulocliente(){
		$this->db->select('*');
		$this->db->from('vwconsultaventa');
		$resultado = $this->db->get();
		//metodo result() para recuperar mas de un registro
		return $resultado->result();
	}

	//recuperar valores estado
	public function get_estados(){
		$this->db->where("estado","1");
		$this->db->order_by("nombreEstado","asc");
		$resultados=$this->db->get("estadoordenservicio");
		return $resultados->result();
	}

	//UPDATE ordenservicio 
	//SET idEstadoOrdenServicio=2
	//WHERE idOrdenServicio='3';
	public function updateEstado($idOrdenServicio,$data){
		$this->db->where("idOrdenServicio",$idOrdenServicio);
		return $this->db->update("ordenservicio",$data);
	}

}