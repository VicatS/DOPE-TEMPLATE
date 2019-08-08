<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

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
}