<?php

class Migration_createAdminTables extends CI_Migration {


public function up() {


$id = array("type" => "INT", "auto_increment" => true);
$login = array("type" => "VARCHAR", "constraint" => "255", "unique" => true);
$password = array("type" => "VARCHAR", "constraint" => "255");
$name = array("type" => "VARCHAR", "constraint" => "255");

$fields = array (

"admin_id" => $id,
"login" => $login,
"password" => $password,
"name" => $name

);

$this->dbforge->add_field($fields);

$this->dbforge->add_key('admin_id', true);
$this->dbforge->create_table("admin");

}

public function down() {

$this->dbforge->drop_table("admin");

}



}