<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Photos extends CI_Controller {


public function index($id_album) {

$this->load->model("photos_model");

$results = $this->photos_model->queryBy($id_album);

if (!$results) {

  $this->load->template("photos/nophotos");

} else {

$data = array("data" => $results);

$this->load->template("photos/index", $data);

}




}


public function upload($id_album) {

  if (!sessionCheck()) { 

$this->session->set_flashdata("alert", "Access not permited");
redirect("/");

} else { 

$this->load->model("album_model");

$album_exists = $this->album_model->getById($id_album);

if (!$album_exists) {  

 $this->session->set_flashdata( 'alert' , 'album doesnt exists');

  redirect('/');


} else { 

$data = array("id_album" => $id_album);

$this->load->template("photos/uploadform", $data);

}

}

}





public function do_upload() {

if (!sessionCheck()) { 

//Uncomment if you want to use only php code with no AJAX

// $this->session->set_flashdata("alert", "Access not permited");
// redirect("/");

$error = "Access not permited";
$data = array("error" => $error);

$this->load->template('error');

} else { 

$this->load->model("photos_model");
$this->load->model("album_model");


$photoStr =  explode("." , $_FILES["photo"]["name"]);
$photoName = $photoStr[0];
$photoExt = $photoStr[1];
$albumId = $this->input->post("albumId");
$album = $this->album_model->getById($albumId);
$photo_exists = $this->photos_model->checkPhotoName($albumId, $photoName);
$data = array(

"name" => $photoName,
"album_id" => $albumId,
"extension" => $photoExt
);



if ($photo_exists) {


$error = "file already exists";
$data = array("error" => $error);

$this->load->view("error" , $data);

} else {


   $config['upload_path']          = './albums/'.$album['name'].'/';
   $config['allowed_types']        = 'gif|jpg|png';
   $config['max_size']             = 8000;
   $config['max_width']            = 1920;
   $config['max_height']           = 1080;

   $this->load->library('upload', $config);


 if ( ! $this->upload->do_upload('photo'))
               

          {
                        echo $this->upload->display_errors();
 
       }
                

                else
                
                {
                      



  $this->photos_model->insertPhoto($data);

  $data = array('upload_data' => $this->upload->data());



//Uncomment this section if you want to you use without AJAX
 
// $this->session->set_flashdata( 'success' , 'upload success');

// redirect('/');

$message = "Success";
$data = array("message" => $message);

$this->load->view('success', $data);
	
 		}


	} 

}

}

public function delete($photo_id, $album_id) { 

  if (!sessionCheck()) { 

$this->session->set_flashdata("alert", "Access not permited");
redirect("/");


} else { 

$this->load->model("photos_model");

$photo = $this->photos_model->getRow($album_id, $photo_id);


if (!$photo) {

$error = "doesnt exists";

$data = array("error" => $error);

$this->load->template("error", $data);

} else {

$this->photos_model->delete($photo_id);

$this->load->helper("file");

$path = "./albums/".$photo["albumName"]."/".$photo["Picname"].".".$photo["extension"];

 if(unlink($path)) {




$this->session->set_flashdata("success" , "Photo deleted");

redirect("/");

} else {

$this->session->set_flashdata("alert" , "Error while deleting photo from directory");

redirect("/");


}



}



}

}




}