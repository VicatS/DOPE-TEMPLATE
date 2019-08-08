<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos_model extends CI_Model {

	public function get_permisos(){
		$this->db->select("pe.*,me.nombre as menu, r.nombreRol as rol");
		$this->db->from("permiso pe");
		$this->db->join("rol r","r.idRol=pe.idRol");
		$this->db->join("menu me","me.idMenu=pe.idMenu");
		$this->db->order_by("r.nombreRol","asc");
		$this->db->order_by("me.nombre","asc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getMenus(){
		$this->db->order_by("nombre","asc");
		$resultados = $this->db->get("menu");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("permiso",$data);
	}

	public function getPermiso($idPermiso){
		$this->db->where("idPermiso",$idPermiso);
		$resultado = $this->db->get("permiso");
		return $resultado->row();
	}

	public function update($idPermiso,$data){
		$this->db->where("idPermiso",$idPermiso);
		return $this->db->update("permiso",$data);
	}

	public function delete($idPermiso){
		$this->db->where("idPermiso",$idPermiso);
		$this->db->delete("permiso");
	}

}