<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_adddateFields extends CI_Migration {


public function up() {

$this->dbforge->add_column('photos', array('date' => array(

'type' => 'DATE')));

$this->dbforge->add_column('albums', array('date' => array( 'type' => 'DATE')));

}



public function down() {


$this->dbforge->drop_column('photos', 'date');
$this->dbforge->drop_column('albums', 'date');

}


}