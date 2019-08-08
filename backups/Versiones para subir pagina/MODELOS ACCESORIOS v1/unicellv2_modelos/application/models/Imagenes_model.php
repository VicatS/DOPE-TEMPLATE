<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagenes_model extends CI_Model {

	public function save($data){
		return $this->db->insert("imagen",$data);
	}
	
}