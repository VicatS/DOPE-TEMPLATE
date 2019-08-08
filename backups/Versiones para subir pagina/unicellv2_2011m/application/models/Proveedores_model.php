<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores_model extends CI_Model {

	//insertar datos nuevos
	public function save($data){
		return $this->db->insert("proveedor",$data);
		return $this->db->insert_id();
	}

}