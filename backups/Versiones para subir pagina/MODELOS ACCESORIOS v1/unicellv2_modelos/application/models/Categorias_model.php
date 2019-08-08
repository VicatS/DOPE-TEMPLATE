<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public function get_categorias(){
	$this->db->where("estado","1");
	$this->db->order_by("nombreCategoria","asc");
	$resultados=$this->db->get("categoria");
	return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("categoria",$data);
	}

	public function get_categoria($idCategoria){
		$this->db->where("idCategoria",$idCategoria);
		$resultado=$this->db->get("categoria");
		return $resultado->row();
	}

	public function update($id_categoria,$data){
		$this->db->where("idCategoria",$id_categoria);
		return $this->db->update("categoria",$data);
	}

	public function get_categorias_servicios(){
	$this->db->where("estado","1");
	$this->db->limit(2);
	$resultados=$this->db->get("categoria");
	return $resultados->result();
	}
}
