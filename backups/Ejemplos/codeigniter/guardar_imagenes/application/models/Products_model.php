<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

public function insertUser($data){
		return $this->db->insert("image",$data);
	}




}