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

		$resultados = $this->db->get("usuario");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function verificarCodigo($codigo){
		$this->db->select("*");
		//$this->db->from("ordenservicio");
		$this->db->where("nroOrdenServicio", $codigo);

		$resultados = $this->db->get("ordenservicio");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	/*public function verificarCodigo($codigo){
		$this->db->select("o.*, cl.*,cl.razonSocial as cliente,tc.nombreComprobante as TIPOCOMPROBANTE, o.idCliente as CLIENTE");
		$this->db->select("CONCAT(p.nombres,' ', p.apellidoPaterno,' ', p.apellidoMaterno) AS nombrecompleto", FALSE);
		$this->db->select("p.*");
		$this->db->select("DATE_FORMAT(o.fechaRecepcion, '%d-%m-%Y') as formatted_date", FALSE);
		$this->db->select("eo.*");
		$this->db->from("ordenservicio o");
		$this->db->join("cliente cl","cl.idCliente=o.idCliente");
		$this->db->join("persona p","cl.idCliente=p.idPersona");
		$this->db->join("comprobante tc","tc.idComprobante=o.idComprobante");
		$this->db->join("estadoordenservicio eo","eo.idEstadoOrdenServicio=o.idEstadoOrdenServicio");
		$this->db->where("o.nroOrdenServicio", $codigo);
		$resultado = $this->db->get();
		return $resultado->row();
	}*/

	//recuperar usuarios
	public function get_usuarios(){
		$this->db->select("CONCAT(p.apellidoPaterno,' ', p.apellidoMaterno, ' ', p.nombres) AS nombrecompleto", FALSE);
		$this->db->select("u.*,p.*,r.*");
		$this->db->from("persona p");
		$this->db->join("usuario u","u.idUsuario=p.idPersona");
		$this->db->join("rol r","r.idRol=u.idRol");
		$this->db->where("u.estado","1");
		$this->db->order_by("u.nombreUsuario");
		$consulta=$this->db->get();
		$resultado=$consulta->result();
		return $resultado;
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
