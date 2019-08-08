<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_Loader extends CI_loader {

public function template($view, $data=array()) {

$this->view("header");
$this->view($view, $data);
$this->view("footer");

}



}