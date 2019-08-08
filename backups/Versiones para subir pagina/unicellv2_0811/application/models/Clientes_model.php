<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	public function get_clientes(){
		//esta funcion recupera todos los atributos de cliente y solo algunos atributos no asi su ID principal de otras tablas
		$this->db->select("cl.*,tcl.nombreTipo as TIPOCLIENTE, td.nombreDocumento AS TIPODOCUMENTO, CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select('p.*');
		$this->db->from('cliente cl');
		$this->db->where('cl.estado','1');
		//$this->db->set('P.apellidoMaterno', 'IFNULL(P.apellidoMaterno,NULO)');
		$this->db->join('persona p','p.idPersona=cl.idCliente');
		$this->db->join('tipocliente tcl','tcl.idTipoCliente=cl.idTipoCliente');
		$this->db->join('tipodocumento td','td.idTipoDocumento=cl.idTipoDocumento');
		$this->db->order_by('nombrecompleto','cl.razonSocial','asc');
		$consulta=$this->db->get();
		$resultado=$consulta->result();
		return $resultado;
	}


	public function get_tipoclientes(){
		$this->db->where("estado","1");
		$this->db->order_by("nombreTipo","asc");
		$resultados=$this->db->get("tipocliente");
		return $resultados->result();
	}

	public function get_tipodocumentos(){
		$this->db->where("estado","1");
		$this->db->order_by("nombreDocumento","asc");
		$resultados=$this->db->get("tipodocumento");
		return $resultados->result();
	}


	public function get_cliente($idPersona){
		$this->db->where("idCliente",$idPersona);
		$resultado=$this->db->get("cliente");
		return $resultado->row();
	}

	//insertar datos nuevos
	public function save($data){
		return $this->db->insert("cliente",$data);
	}

	//actualizar datos
	public function update($id_cliente,$data){
		$this->db->where("idCliente",$id_cliente);
		return $this->db->update("cliente",$data);
	}
}
