
<div class="container">

<?=  form_open("album/do_update")?>

<?= form_label("Name", "name"); ?>
<?= form_input(array(
"name" => "name",
"id" => "name",
"class" => "form-control",
"value" => $albumObj["name"]

)); ?>

<?=  form_label("Description", "description"); ?>
<?= form_textarea(array(

'name' =>  'description',
'id' => 'description',
'class' => 'form-control',
'value' => $albumObj["description"]


)); ?>
<?=  form_label("Default Image", "default_image"); ?>
<?php 

$options = array();

foreach ($photosObj as $Optphoto) {

$optParam = $Optphoto["name"].".".$Optphoto["extension"];

$options[$optParam] = $optParam;

}



echo form_dropdown(array("options"=>$options, "name" => "default_image", "id" => "default_image", "class"=>"form-control"));



echo form_hidden("id",$albumObj["id"]);

	?>

<?= form_button(array(
"type" => "submit",
"content" => "Update",
"class" => "btn btn-primary"

)); ?>




<?= form_close() ?> 

</div>