<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_model extends CI_Model {

	public function get_marcas(){
	$this->db->where("estado","1");
	$this->db->order_by("nombreMarca","asc");
	$resultados=$this->db->get("marca");
	return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("marca",$data);
	}

	public function get_marca($idMarca){
		$this->db->where("idMarca",$idMarca);
		$resultado=$this->db->get("marca");
		return $resultado->row();
	}

	public function update($id_marca,$data){
		$this->db->where("idMarca",$id_marca);
		return $this->db->update("marca",$data);
	}
}