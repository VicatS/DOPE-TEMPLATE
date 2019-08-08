<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_addDefaultAlbumImage extends CI_Migration {


public function up() {




$this->dbforge->add_column('albums', array('default_image' => array(

'type' => 'VARCHAR', 'constraint' => '255')));

}


public function down() {

$this->dbforge->drop_column('albums', 'default_image');


}

}