<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos_model extends CI_Model {

	public function get_permisos(){
		$this->db->select("pe.*,me.nombre as menu, r.nombreRol as rol");
		$this->db->from("permiso pe");
		$this->db->join("rol r","r.idRol=pe.idRol");
		$this->db->join("menu me","me.idMenu=pe.idMenu");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getMenus(){
		$resultados = $this->db->get("menu");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("permiso",$data);
	}

}