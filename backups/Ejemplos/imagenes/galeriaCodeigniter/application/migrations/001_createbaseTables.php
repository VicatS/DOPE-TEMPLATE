<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_createbaseTables extends CI_Migration {


public function up() {

$id = array('type' => 'INT', 'auto_increment' => true);
$name_album = array('type' => 'VARCHAR', 'constraint' => '255', 'unique' => true);
$name_photo = array('type' => 'VARCHAR', 'constraint' => '255');
$albumid = array('type' => 'INT');
$this->dbforge->add_field(array('id' => $id, 'name' => $name_album));
$this->dbforge->add_key('id', true);
$this->dbforge->create_table("albums");

$this->dbforge->add_field(array('id' => $id, 'name' => $name_photo, 'album_id' => $albumid));
$this->dbforge->add_key('id', true);
$this->dbforge->create_table("photos");

$this->db->query("alter table photos add foreign key (album_id) references albums(id)");

}


public function down() {

$this->dbforge->drop_table("photos");
$this->dbforge->drop_table("albums");



}

}