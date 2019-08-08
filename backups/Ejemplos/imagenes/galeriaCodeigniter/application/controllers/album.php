<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller {


public function index($index=1) {

if ($index == 1) {

$page = 1;

} else {

$page = $index + 4;

}


$this->load->model("album_model");
$results = $this->album_model->queryAll($page);

if (!$results) {

	show_404();

} else { 


$data = array('data' => $results);
$this->load->template("album/index", $data);

}



}


public function insert() {

if (!sessionCheck()) { 

$this->session->set_flashdata("alert", "Access not permited");
redirect("/");

} else { 

if (!$this->input->post('name') || !$this->input->post('description')) { 

$this->load->template("album/insert");

} else {

$data = array('name' => $this->input->post('name'), 'description' => $this->input->post('description'), 'date' => date("Y-m-d") );



$this->load->model("album_model");
$exists = $this->album_model->count($this->input->post('name'));

if ($exists != 0) {

$this->session->set_flashdata("alert", "Album already exists");
redirect('/');


} else {


	if (mkdir ("./albums/".$this->input->post("name"), "0755")) {

$this->album_model->insert($data);



$this->session->set_flashdata("success", "Album successfully created");
redirect('/');

	} else {

$error =  "It wasn't possible to make dir";

$data = array("error" => $error);

$this->load->view("error");

	}

						} // else mkdir $exists


					} // else check inputs


				} // else session Check


			} // end insert function




public function edit($album_id) {


if (!sessionCheck()) { 

$this->session->set_flashdata("alert", "Access not permited");
redirect("/");


} else { 


$this->load->model("album_model");
$this->load->model("photos_model");

$albumObj = $this->album_model->getbyId($album_id);
$photosObj = $this->photos_model->getAllByalbumId($album_id);

$data = array("albumObj" => $albumObj, "photosObj" => $photosObj);
$this->load->template("album/edit", $data);


}

}

public function do_update() {

if (!sessionCheck()) { 

$this->session->set_flashdata("alert", "Access not permited");
redirect("/");


} else { 

$albumId = $this->input->post("id");
$albumName = $this->input->post("name");
$albumDesc = $this->input->post("description");
$albumImage = $this->input->post("default_image");


$albumData = array(
	"name" => $albumName, 
	"description" => $albumDesc,
	"default_image" => $albumImage);
}

$this->load->model("album_model");

$this->album_model->update($albumId, $albumData);


$this->session->set_flashdata("success", "Album successfuly updated");
redirect("/");



}



public function delete($album_id) {

if (!sessionCheck()) { 

$this->session->set_flashdata("alert", "Access not permited");
redirect("/");


} else {  


$this->load->model("album_model");
$this->load->model("photos_model");

$album_exists = $this->album_model->getById($album_id);

if (!$album_exists) {  

 $this->session->set_flashdata( 'alert' , 'album doesnt exists');

  redirect('/');


} else { 


$this->photos_model->deleteByAlbumId($album_id);

$this->album_model->delete($album_id);



$this->load->helper("dir");

$path = "./albums/".$album_exists["name"];

delfull($path);

$this->session->set_flashdata( 'success' , 'album deleted successfully');

redirect("/");

}



}




}


}