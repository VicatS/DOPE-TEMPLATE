<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos_model extends CI_Model {

	//recuperar articulos
	public function get_articulos(){
		$this->db->select("a.*,c.nombreCategoria AS categoria, m.nombreMarca AS marca,co.nombreColor AS color");
		$this->db->from("articulo a");
		$this->db->join("categoria c","c.idCategoria=a.idCategoria");
		$this->db->join("marca m","m.idMarca=a.idMarca");
		$this->db->join("color co","co.idColor=a.idColor");
		$this->db->where("a.estado","1");
		//$this->db->where("a.stock>=","1");
		$this->db->order_by("a.fechaUpdate","desc");
		$resultados=$this->db->get();
		return $resultados->result();
	}

	//recuperar articulos solo equipos
	public function get_articulos_equipos(){
		$this->db->select("a.*");
		$this->db->from("articulo a");
		$this->db->join("categoria c","c.idCategoria=a.idCategoria");
		$this->db->join("marca m","m.idMarca=a.idMarca");
		$this->db->join("color co","co.idColor=a.idColor");
		$this->db->where("a.idCategoria","6");
		//$this->db->where("a.stock>=","1");
		$this->db->order_by("a.modelo","asc");
		$resultados=$this->db->get();
		return $resultados->result();
	}

	//recuperar solo un articulo
	public function get_articulo($idArticulo){
		$this->db->where("idArticulo",$idArticulo);
		$resultado=$this->db->get("articulo");
		return $resultado->row();
	}
	//insertar datos nuevos
	public function save($data){
		return $this->db->insert("articulo",$data);
	}

	//actualizar datos
	public function update($idArticulo,$data){
		$this->db->where("idArticulo",$idArticulo);
		return $this->db->update("articulo",$data);
	}

}