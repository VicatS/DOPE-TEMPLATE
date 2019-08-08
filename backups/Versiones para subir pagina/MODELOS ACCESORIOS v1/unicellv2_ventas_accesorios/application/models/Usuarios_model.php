<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function login($nombre_usuario, $contrasena){
		//seleccionamos todos los datos correspondientes a usuario(persona,usuario y rol)
		$this->db->select("u.*,p.*,r.*");
		$this->db->from("usuario u");
		$this->db->join("persona p","u.idUsuario=p.idPersona");
		$this->db->join("rol r","r.idRol=u.idRol");
		$this->db->where("u.nombreUsuario", $nombre_usuario);
		$this->db->where("u.contrasena", $contrasena);
		$this->db->where("u.estado","1");
		$resultados = $this->db->get("usuario");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}


	//recuperar usuarios
	public function get_usuarios(){
		//$this->db->select("CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("u.*,p.*,r.*,u.estado as status,CONCAT(p.nombres,' ', p.apellidoPaterno,' ',IFNULL(p.apellidoMaterno,' ')) AS nombrecompleto", FALSE);
		$this->db->from("persona p");
		$this->db->join("usuario u","u.idUsuario=p.idPersona");
		$this->db->join("rol r","r.idRol=u.idRol");
		$this->db->order_by("u.nombreUsuario");
		$resultados = $this->db->get();
		if ($resultados->num_rows()>0) {
			return $resultados->result();
		}else{
			return false;
		}
	}

	public function getRol(){
		$this->db->select("r.*");
		$this->db->from("rol r");
		$this->db->order_by("r.nombreRol","asc");
		$resultados=$this->db->get();
		return $resultados->result();
	}

	//insertar datos nuevos
	public function save($datos){
		return $this->db->insert("usuario",$datos);
	}


	public function get_usuario($idPersona){
		$this->db->where("idUsuario",$idPersona);
		$resultado=$this->db->get("usuario");
		return $resultado->row();
	}

	public function get_rol($idPersona){
		$this->db->where("idPersona",$idPersona);
		$resultado=$this->db->get("rol");
		return $resultado->row();
	}
	
	//actualizar datos
	public function update($id_usuario,$data){
		$this->db->where("idUsuario",$id_usuario);
		return $this->db->update("usuario",$data);
	}


	//actualizar datos
	public function delete($idUsuario,$data){
		$this->db->where("idUsuario",$idUsuario);
		return $this->db->update("usuario",$data);
	}
}
