<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_addcustomFields extends CI_Migration {


public function up() {

$this->dbforge->add_column('photos', array('extension' => array(

'type' => 'VARCHAR', 'constraint' => '3')));

$this->dbforge->add_column('albums', array('description' => array( 'type' => 'TEXT')));

}



public function down() {


$this->dbforge->drop_column('photos', 'extension');
$this->dbforge->drop_column('albums', 'description');

}


}