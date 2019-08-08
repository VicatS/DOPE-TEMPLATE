<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelos_model extends CI_Model {

	//recuperar articulos
	public function get_modelos(){
		$this->db->select("mo.*,c.nombreCategoria AS categoria, m.nombreMarca AS marca, IFNULL(SUM(ac.stock),0) AS total");
		$this->db->from("modelo mo");
		$this->db->join("categoria c","c.idCategoria=mo.idCategoria");
		$this->db->join("marca m","m.idMarca=mo.idMarca");
		$this->db->join("accesorio ac","ac.idModelo=mo.idModelo","left");
		$this->db->where("mo.estado","1");
		//$this->db->where("a.stock>=","1");
		$this->db->order_by("mo.nombreModelo","desc");
		$this->db->group_by("mo.idModelo");
		$resultados=$this->db->get();
		return $resultados->result();
	}

	public function get_accesorios($id){
		$this->db->select("ac.*, SUM(ac.stock) AS stock, co.*");
		$this->db->from("accesorio ac");
		$this->db->join("modelo mo","mo.idModelo=ac.idModelo","left");
		$this->db->join("color co","co.idColor=ac.idColor","left");
		$this->db->where("ac.idModelo",$id);
		$this->db->group_by("ac.idColor");
		$resultados = $this->db->get();
		//metodo result cuando son mas de un registro
		return $resultados->result();
	}
	
	//insertar datos nuevos
	public function save($data){
		return $this->db->insert("modelo",$data);
	}

	//insertar datos nuevos
	public function saveAccesorio($data){
		return $this->db->insert("accesorio",$data);
	}

	//actualizar datos
	public function update($idmodelo,$data){
		$this->db->where("idModelo",$idmodelo);
		return $this->db->update("modelo",$data);
	}

	public function get_idmodelo($idModelo){
		$this->db->where("idModelo",$idModelo);
		$resultado=$this->db->get("modelo");
		return $resultado->row();
	}

}

