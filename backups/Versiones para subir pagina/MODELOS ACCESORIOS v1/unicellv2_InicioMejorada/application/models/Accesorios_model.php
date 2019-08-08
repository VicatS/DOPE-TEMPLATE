<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accesorios_model extends CI_Model {

	//recuperar accesorios para ventas
	public function get_accesorios(){
		$this->db->select("ac.*,c.nombreCategoria AS categoria, m.nombreMarca AS marca,co.nombreColor AS color");
		$this->db->select("mo.nombreModelo as modelo");
		$this->db->from("accesorio ac");
		$this->db->join("modelo mo","mo.idModelo=ac.idModelo");
		$this->db->join("categoria c","c.idCategoria=mo.idCategoria");
		$this->db->join("marca m","m.idMarca=mo.idMarca");
		$this->db->join("color co","co.idColor=ac.idColor");
		$this->db->where("ac.estado","1");
		$this->db->order_by("ac.fechaUpdate","desc");
		$resultados=$this->db->get();
		return $resultados->result();
	}

	//recuperar total accesorios para listadao aun saldo = 0
	public function get_accesorios_list(){
		$this->db->select("ac.*,mo.nombreModelo as modelo, mo.descripcion as descripcion,co.codigoHexadecimal as codhex, co.nombreColor as color");
		$this->db->select("c.nombreCategoria as categoria, m.nombreMarca as marca,mo.calidad as calidad");
		$this->db->from("accesorio ac");
		$this->db->join("modelo mo","mo.idModelo=ac.idModelo");
		$this->db->join("categoria c","c.idCategoria=mo.idCategoria");
		$this->db->join("marca m","m.idMarca=mo.idMarca");
		$this->db->join("color co","co.idColor=ac.idColor");
		$this->db->where("ac.estado","1");
		$this->db->order_by("ac.fechaUpdate","desc");
		$resultados=$this->db->get();
		return $resultados->result();
	}

	//recuperar articulos solo equipos-ciertos categoris en especifico
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

	//recuperar solo un accesorio(edit)
	public function get_accesorio($idAccesorio){
		$this->db->where("idAccesorio",$idAccesorio);
		$resultado=$this->db->get("accesorio");
		return $resultado->row();
	}
	//insertar datos nuevos
	public function save($data){
		return $this->db->insert("accesorio",$data);
	}

	//actualizar datos accesorio
	public function update($idAccesorio,$data){
		$this->db->where("idAccesorio",$idAccesorio);
		return $this->db->update("accesorio",$data);
	}

	//eliminar de forma excepcional para no afectar los datos de modelo
	public function delete($idAccesorio){
		$this->db->where("idAccesorio",$idAccesorio);
		return $this->db->delete('accesorio');
	}

}