<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Selectores_jquery extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation','database');
		$this->load->model('selectores_jquery_model');
		$this->load->database('default');
	}
	
	public function index()
	{
		$data['titulo'] = 'Añadir campos dinámicamente con jquery';
		$this->load->view('selectores_jquery_view',$data);		
	}
	
	public function array_selectores()
	{
		//validamos los campos
		$this->form_validation->set_rules('nombre[]','nombre','required|xss_clean');
		$this->form_validation->set_rules('puntos[]','puntos','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}else{
			$nombre = $this->input->post('nombre');
			$puntos = $this->input->post('puntos');
							
			$etiquetas = '';
			$i_etiquetas = 0;
			foreach( $nombre as $key => $value ) 
			{
				$etiquetas .= $nombre[$i_etiquetas]."-".$puntos[$key].'*//*';?><br /><?php
				$i_etiquetas++;
			}
			$nombres_etiquetas = $etiquetas;
			$cantidad_etiquetas = $i_etiquetas;
			//envíamos los datos al modelo
			$subir_etiquetas = $this->selectores_jquery_model->subir_etiquetas($nombres_etiquetas,$cantidad_etiquetas);
			if($subir_etiquetas == TRUE)
			{
				redirect(base_url().'selectores_jquery');
			}
		}		
	}
}
