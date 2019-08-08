<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accesorios_model extends CI_Model {

	//insertar datos nuevos
	public function save($data){
		return $this->db->insert("accesorio",$data);
	}

	
	}

}