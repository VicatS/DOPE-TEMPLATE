<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {


public function queryAll($page) {

$index = $page -1;

$this->db->order_by("albums.id", "DESC");
return $this->db->get("albums")->result_array();

}

public function getById($id) 

{

$this->db->from("albums");
$this->db->where("id", $id);
return $this->db->get()->row_array();

}

public function count($name) {

$this->db->from("albums");
$this->db->where("name", $name);
return $this->db->count_all_results();


}


public function getByName($name) {

$this->db->from("albums");
$this->db->where("name", $name);
return $this->db->get()->result();

}

public function insert($data) { 

$this->db->insert("albums", $data);

}

public function delete($album_id) {

$this->db->from("albums");
$this->db->where("id", $album_id);
return $this->db->delete();


}

public function update($album_id, $data) {

$this->db->where("id", $album_id);
$this->db->update("albums", $data);

}



}