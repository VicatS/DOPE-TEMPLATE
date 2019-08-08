<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colores_model extends CI_Model {

	public function get_colores(){
	$this->db->where("estado","1");
	$this->db->order_by("nombreColor","asc");
	$resultados=$this->db->get("color");
	return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("color",$data);
	}

	public function get_color($idColor){
		$this->db->where("idColor",$idColor);
		$resultado=$this->db->get("color");
		return $resultado->row();
	}

	public function update($id_color,$data){
		$this->db->where("idColor",$id_color);
		return $this->db->update("color",$data);
	}
}
