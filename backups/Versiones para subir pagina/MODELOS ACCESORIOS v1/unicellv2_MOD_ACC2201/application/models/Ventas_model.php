<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {


	public function get_ventas(){
		$this->db->select("CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("v.*,cl.razonSocial as RAZON, tc.nombreComprobante as TIPOCOMPROBANTE");
		$this->db->select("DATE_FORMAT(v.fechaUpdate, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->select('FORMAT(v.total,2)',FALSE);
		$this->db->from("venta v");
		$this->db->join("cliente cl","cl.idCliente=v.idCliente");
		$this->db->join('persona p','p.idPersona=cl.idCliente');
		$this->db->join("comprobante tc","tc.idComprobante=v.idComprobante");
		$this->db->order_by("fechaUpdate","desc");
		$this->db->order_by("numDocumento","desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows()>0) {
			return $resultados->result();
		}else{
			return false;
		}
	}

	//para reportes
	public function get_ventas_reporte(){
		$this->db->select("CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("v.*,cl.razonSocial as RAZON, tc.nombreComprobante as TIPOCOMPROBANTE, u.nombreUsuario as USUARIO");
		$this->db->select("DATE_FORMAT(v.fechaUpdate, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->from("venta v");
		$this->db->join("cliente cl","cl.idCliente=v.idCliente");
		$this->db->join('persona p','p.idPersona=cl.idCliente');
		$this->db->join("comprobante tc","tc.idComprobante=v.idComprobante");
		$this->db->join("usuario u","u.idUsuario=v.idUsuario");
		$this->db->where("v.estado","1");
		$this->db->order_by("fechaUpdate","desc");
		$this->db->order_by("numDocumento","desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows()>0) {
			return $resultados->result();
		}else{
			return false;
		}
	}

	//para recuperar rango de fechas
	public function getVentasByDate($fechainicio,$fechafin){
		$this->db->select("CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("v.*,cl.razonSocial as RAZON, tc.nombreComprobante as TIPOCOMPROBANTE, u.nombreUsuario as USUARIO");
		$this->db->select("DATE_FORMAT(v.fechaUpdate, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->from("venta v");
		$this->db->join("cliente cl","cl.idCliente=v.idCliente");
		$this->db->join('persona p','p.idPersona=cl.idCliente');
		$this->db->join("comprobante tc","tc.idComprobante=v.idComprobante");
		$this->db->join("usuario u","u.idUsuario=v.idUsuario");
		$this->db->where("v.estado","1");
		$this->db->where("v.fechaUpdate >=", $fechainicio);
		$this->db->where("v.fechaUpdate <=", $fechafin);
		$this->db->order_by("fechaUpdate","desc");
		$this->db->order_by("numDocumento","desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows()>0) {
			return $resultados->result();
		}else{
			return false;
		}
	}

	//para recuperar rango de fechas
	public function getClientesVentaAltaByDate($fechainicio,$fechafin){
		$this->db->select("*");
		$this->db->from("vwclienteventas");
		$this->db->where("fechaUpdate >=", $fechainicio);
		$this->db->where("fechaUpdate <=", $fechafin);
		
		$resultados = $this->db->get();
		if ($resultados->num_rows()>0) {
			return $resultados->result();
		}else{
			return false;
		}
	}


	public function get_venta($id){
		$this->db->select("CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("v.*,cl.razonSocial as RAZON, cl.numDocumento as NUMDOC,tc.nombreComprobante as TIPOCOMPROBANTE");
		$this->db->select("DATE_FORMAT(v.fechaUpdate, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->from("venta v");
		$this->db->join("cliente cl","cl.idCliente=v.idCliente");
		$this->db->join('persona p','p.idPersona=cl.idCliente');
		$this->db->join("comprobante tc","tc.idComprobante=v.idComprobante");
		$this->db->where("v.idVenta",$id);
		$this->db->order_by("v.fecha","desc");		
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function get_detalle($id){
		$this->db->select("dv.*,a.codigo, a.modelo,c.*");
		$this->db->from("detalleventa dv");
		$this->db->join("articulo a","a.idArticulo=dv.idArticulo");
		$this->db->join("categoria c","c.idCategoria=a.idCategoria");
		$this->db->where("dv.idVenta",$id);
		$resultados = $this->db->get();
		//metodo result cuando son mas de un registro
		return $resultados->result();
	}

	//recuperamos datos de base de datos COMPROBANTES
	public function get_comprobantes(){
		$this->db->select("*");
		$this->db->from("comprobante");
		$this->db->where("idComprobante","2");
		$resultados = $this->db->get();
		return $resultados->result();
		//$resultados=$this->db->get("comprobante");
		//return $resultados->result();
	}

	//recuperamos datos de base de datos ORDEN DE SERVICIO
	public function get_ordenes(){
		$this->db->select("*");
		$this->db->from("comprobante");
		$this->db->where("idComprobante","3");
		$resultados = $this->db->get();
		return $resultados->result();
		
	}

	//recibimos un POST(json) valor desde nuestro controlador
	public function get_articulos($valor){
		$this->db->select("a.idArticulo as idArticulo, a.codigo as codigo, CONCAT(a.modelo,' ',co.nombreColor,' ',c.nombreCategoria) as label,a.precio as precio, a.stock as stock",FALSE);
		$this->db->select("c.nombreCategoria");
		$this->db->from("articulo a");
		$this->db->join("categoria c","c.idCategoria=a.idCategoria");
		$this->db->join("color co","co.idColor=a.idColor");
		$this->db->where("stock>=","1");
		$this->db->like("c.nombreCategoria",$valor);
		$resultados=$this->db->get();
		//recuperar valor en array
		return $resultados->result_array();
	}

	//para guardar datos de venta
	public function save($data){
		/*$this->db->trans_begin();
		$this->db->insert("venta",$data);
		if ($this->db->trans_status()=== FALSE) {
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}*/
		return $this->db->insert("venta",$data);
	}

	//recuperar ultimoID de venta
	public function lastID(){
		return $this->db->insert_id();
	}

	//recuperar un comprobante
	public function get_comprobante($idcomprobante){
		$this->db->where("idComprobante",$idcomprobante);
		$resultado = $this->db->get("comprobante");
		return $resultado->row();
	}

	//actualizar un comprobante
	public function updateComprobante($idcomprobante,$data){
		$this->db->where("idComprobante",$idcomprobante);
		$this->db->update("comprobante",$data);
	}
	
	// para guardar detalle de venta
	public function save_detalle($data){
		$this->db->insert("detalleventa",$data);
	}

	//recuperar años 
	public function years(){
		$this->db->select("YEAR(fechaUpdate) as year");
		$this->db->from("venta");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	//funcion para montos en grafico estadistico
	public function montos($year){
		$this->db->select("MONTH(fechaUpdate) as mes, SUM(total) as monto");
		$this->db->from("venta");
		$this->db->where("fechaUpdate >=",$year."-01-01");
		$this->db->where("fechaUpdate <=",$year."-12-31");
		$this->db->group_by("mes");
		$this->db->order_by("mes");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function articuloMasVendido(){
		$this->db->select("a.modelo as modelo, SUM(dv.cantidad) as mayor, C.nombreCategoria as categoria");
		$this->db->from("detalleventa dv");
		$this->db->join("venta v","v.idVenta=dv.idVenta","left");
		$this->db->join("articulo a","a.idArticulo=dv.idArticulo","left");
		$this->db->join("categoria c","a.idCategoria=c.idCategoria","left");
		$this->db->group_by("dv.idArticulo");
		$this->db->order_by("mayor","desc");
		$this->db->limit("5");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	//actualizar datos
	public function delete($idVenta,$data){
		$this->db->where("idVenta",$idVenta);
		return $this->db->update("venta",$data);
	}

}
