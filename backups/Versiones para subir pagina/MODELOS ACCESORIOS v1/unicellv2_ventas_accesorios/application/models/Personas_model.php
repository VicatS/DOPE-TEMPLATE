<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_model extends CI_Model {


	public function get_personas()
	{
		$this->db->select('*'); //select
		$this->db->from('persona'); //tabla
		return $this->db->get(); //devuelve el resultado
	}

	//insertar datos nuevos
	public function save($data){
		$this->db->insert("persona",$data);
		return $this->db->insert_id();
	}

	//para recuperar todos los atributos de persona para despues usarlo en clientes, proveedores e usuarios
	public function get_persona($idPersona){
		$this->db->where("idPersona",$idPersona);
		$resultado=$this->db->get("persona");
		return $resultado->row();
	}

	public function update($id_persona,$data){
		$this->db->where("idPersona",$id_persona);
		return $this->db->update("persona",$data);
	}
}