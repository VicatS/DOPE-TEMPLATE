<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function get_pedidos_usuarioTecnico($idusuario){
		
		$this->db->select("CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("pe.*");
		$this->db->select("DATE_FORMAT(pe.fechaUpdate, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->select('FORMAT(pe.total,2)',FALSE);
		$this->db->from("persona p");
		$this->db->join("usuario u","u.idUsuario=p.idPersona","left");
		$this->db->join('pedido pe','pe.idUsuario=u.idUsuario',"left");
		$this->db->where('pe.idUsuario',$idusuario);
		//$this->db->where("p.idPersona",$idusuario);
		//$this->db->order_by("fechaUpdate","desc");
		//$this->db->order_by("numDocumento","desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows()>0) {
			return $resultados->result();
		}else{
			return false;
		}
	}

	//recuperar comprobante Nota de pedidos
	public function getComprobantePedido(){
		$this->db->select("*");
		$this->db->from("comprobante");
		$this->db->where("idComprobante","4");
		$this->db->limit(1);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function get_clientes(){
		//esta funcion recupera todos los atributos de cliente y solo algunos atributos no asi su ID principal de otras tablas
		$this->db->select("cl.*,tcl.nombreTipo as TIPOCLIENTE, td.nombreDocumento AS TIPODOCUMENTO, CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("DATE_FORMAT(cl.fechaUpdate, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->select('p.*');
		$this->db->from('cliente cl');
		
		//$this->db->set('P.apellidoMaterno', 'IFNULL(P.apellidoMaterno,NULO)');
		$this->db->join('persona p','p.idPersona=cl.idCliente');
		$this->db->join('tipocliente tcl','tcl.idTipoCliente=cl.idTipoCliente');
		$this->db->join('tipodocumento td','td.idTipoDocumento=cl.idTipoDocumento');
		$this->db->where('cl.estado','1');
		$this->db->limit(1);
		$consulta=$this->db->get();
		$resultado=$consulta->result();
		return $resultado;
	}

	//para guardar datos de pedido
	public function save($data){
		return $this->db->insert("pedido",$data);
	}

	//recuperar ultimoID de pedido
	public function lastID(){
		return $this->db->insert_id();
	}

	// para guardar detalle de pedido
	public function save_detalle($data){
		$this->db->insert("detallepedido",$data);
	}

	//recibimos un POST(json) valor desde nuestro controlador para buscar accesorios 
	public function get_accesorios($valor){
		$this->db->select("ac.idAccesorio as idAccesorio, mo.idModelo as idModelo, CONCAT(mo.nombreModelo,' ', mo.calidad,' ', co.nombreColor,' ',ca.nombreCategoria) as label, ac.precio as precio, ac.stock as stock",FALSE);
		$this->db->select("mo.nombreModelo");
		$this->db->from("accesorio ac");
		$this->db->join("modelo mo","ac.idModelo=mo.idModelo");
		$this->db->join("categoria ca","ca.idCategoria=mo.idCategoria");
		$this->db->join("color co","co.idColor=ac.idColor");
		$this->db->where("ac.stock>=","1");
		$this->db->where("ac.estado","1");
		$this->db->like('mo.nombreModelo', $valor, 'both');
		$resultados=$this->db->get();
		//recuperar valor en array
		return $resultados->result_array();
	}

	//recpuerar un solo pedido
	public function get_pedido($idpedido){
		$this->db->select("CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("pe.*,u.nombreUsuario as USUARIO");
		$this->db->select("DATE_FORMAT(pe.fechaUpdate, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->from("pedido pe");
		$this->db->join("usuario u","u.idUsuario=pe.idUsuario");
		$this->db->join('persona p',"p.idPersona=u.idUsuario");
		
		$this->db->where("pe.idPedido",$idpedido);
		$this->db->order_by("pe.fechaUpdate","desc");		
		$resultado = $this->db->get();
		return $resultado->row();
	}

	//recuperar el detalle de un pedido(n-muchos)
	public function get_detalle($idpedido){
		$this->db->select("dp.*,ac.idModelo,ac.precio as precio, ac.idAccesorio as idAccesorio, CONCAT(ca.nombreCategoria,' ',mo.nombreModelo,' ',co.nombreColor,' ',mo.calidad) as detalleaccesorio",FALSE);
		$this->db->from("detallepedido dp");
		$this->db->join("accesorio ac","ac.idAccesorio=dp.idAccesorio");
		$this->db->join("modelo mo","mo.idModelo=ac.idModelo");
		$this->db->join("categoria ca","ca.idCategoria=mo.idCategoria");
		$this->db->join("color co","co.idColor=ac.idColor");
		$this->db->where("dp.idPedido",$idpedido);
		$resultados = $this->db->get();
		//metodo result cuando son mas de un registro
		return $resultados->result();
	}
}

