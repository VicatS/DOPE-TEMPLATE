<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_model extends CI_Model {

	public function get_servicios(){
		$this->db->select("s.*,c.nombreCategoria as CATEGORIA");
		$this->db->from("servicio s");
		$this->db->join("categoria c","c.idCategoria=s.idCategoria");
		$this->db->where("s.estado","1");
		//$this->db->where("a.stock>=","1");
		$this->db->order_by("s.fechaUpdate","desc");
		$resultados=$this->db->get();
		return $resultados->result();
	}

	//recuperar solo un articulo
	public function get_servicio($idServicio){
		$this->db->where("idServicio",$idServicio);
		$resultado=$this->db->get("servicio");
		return $resultado->row();
	}

	//insertar datos nuevos
	public function save($data){
		return $this->db->insert("servicio",$data);
	}

	//actualizar datos
	public function update($idServicio,$data){
		$this->db->where("idServicio",$idServicio);
		return $this->db->update("servicio",$data);
	}
	
}