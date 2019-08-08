<?php


class Admin_model extends CI_Model { 


public function login($login, $password) { 

$this->db->where("login", $login);
$this->db->where("password", $password);
return $this->db->get("admin")->row_array();


}



}