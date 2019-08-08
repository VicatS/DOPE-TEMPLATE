

<div class="container">

<h1> Insert new album </h1>

<?php

echo form_open("album/insert", array('id' => 'form_upload'));

echo form_label("Name", "name");

echo form_input(array(

'name' =>  'name',
'id' => 'name',
'class' => 'form-control',
'maxlength' => '255'

));

echo form_label("Description", "description");

echo form_textarea(array(

'name' =>  'description',
'id' => 'description',
'class' => 'form-control'

));

echo form_button(array(

"class" => "btn btn-primary",
"content" => "Insert album",
"type"=> "submit"

));

echo form_close();

?>

</div>