<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fecha_test extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('fechaes_helper');
	}

	public function mostrar(){
		$fecha = date("Y-m-d");
	echo fecha_es($fecha, "d M a"); //Resultado: 25 Jun 2014

	$fecha = date("Y-m-d H:i:s");
	echo fecha_es($fecha, "d M a", TRUE); //Resultado: 25 Jun 2014 13:30:40
	}
}
