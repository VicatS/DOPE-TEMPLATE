<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos_model extends CI_Model {


public function queryBy($album_id) {


$this->db->from("photos");
$this->db->select(array("photos.name as Picname" , "album_id", "extension", "photos.date as photoDate"));
$this->db->from("albums");
$this->db->select(array("albums.name as albumName" , "albums.id", "albums.date as albumDate"));
$this->db->where('album_id', $album_id);
$this->db->where('albums.id', $album_id);
$query = $this->db->get();
return $query->result_array();


}

public function insertPhoto($data) {

$this->db->insert("photos", $data);


}


public function checkPhotoName($album, $photo) {
$this->db->select("photos.*, albums.id");
$this->db->from("photos");
$this->db->join("albums", "photos.album_id = albums.id");
$this->db->where("album_id", $album);
$this->db->where("photos.name", $photo);
return $this->db->count_all_results();

}

public function delete($photo_id) {

$this->db->where("id", $photo_id);
$this->db->delete("photos");

}


public function getRow($album_id, $photo_id) {

$this->db->from("photos");
$this->db->select(array("photos.name as Picname" , "album_id", "extension", "photos.date as photoDate"));
$this->db->from("albums");
$this->db->select(array("albums.name as albumName" , "albums.id", "albums.date as albumDate"));
$this->db->where("albums.id", $album_id);
$this->db->where("photos.id", $photo_id);
return $this->db->get()->row_array();

}

public function deleteByAlbumId($album_id) {

$this->db->where("album_id", $album_id);
$this->db->delete("photos");

}

public function getAllByalbumId($album_id) {

$this->db->where("album_id", $album_id);

return $this->db->get("photos")->result_array();
}


}