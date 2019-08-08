<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	function guardar($data){

		$this->db->insert("usuarios", $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}

	}
}