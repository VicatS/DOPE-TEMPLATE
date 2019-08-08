<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Selectores_jquery_model extends CI_Model 
{
	public function __construct() 
	{
		parent::__construct();
	}
	
	public function subir_etiquetas($nombres_etiquetas,$cantidad_etiquetas)
	{
		$datos = array(
			'nombre_etiquetas'		=>		$nombres_etiquetas,
			'numero_etiquetas'		=>		$cantidad_etiquetas
		);
		return $this->db->insert('etiquetas',$datos);
	}
}
	