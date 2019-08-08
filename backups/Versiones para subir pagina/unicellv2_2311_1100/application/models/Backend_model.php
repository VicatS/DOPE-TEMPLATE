<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {


	//para recuperar ID
	public function getID($link){
		$this->db->like("link",$link);
		$resultado = $this->db->get("menu");
		return $resultado->row();
	}

	// para contar el total de cada tabla
	public function rowCount($tabla){
		if ($tabla !="ventas") {
			$this->db->where("estado","1");
		}elseif ($tabla !="ordenes") {
			$this->db->where("estado","1");
		}
		$this->db->where("estado","1");
		$resultados = $this->db->get($tabla);
		return $resultados ->num_rows();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("idMenu",$menu);
		$this->db->where("idRol",$rol);
		$resultado = $this->db->get("permiso");
		return $resultado->row();
	}
}