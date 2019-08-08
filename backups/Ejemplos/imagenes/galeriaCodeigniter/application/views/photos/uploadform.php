
<div class="container">

	<div class="Wrapper"> 

<h1> Welcome to the images uploads page</h1>

<p> Here you can upload images to your gallery</p>

<p> Please in order to get the bests results with  your galery view, upload images with widescreen (480p, 720p, 1080p) </p>
<p> Its only permited images with .jpg .png .gif extensions </p>

<br />


	<div class="formUploadObj">

	

<?php

echo form_open_multipart("photos/do_upload/", array('class' => 'form_upload'));

echo form_label("Image to Upload", "file"); ?>



	<input type="file" name="photo" size="2000" id="file"/>
    
    <input type="hidden" name="albumId" id="album" value="<?=$id_album?>" />

    <input type="hidden" name="URL" id="URL" value="<?=base_url("index.php/photos/do_upload")?>" />

<?php


// HTML Icon from font Awesome to include on uploads button

$fontAwesomeIcoHTML = '<i class="fa fa-upload" aria-hidden="true"></i>';


echo  form_button(array(

'type' => 'submit',
'class' => 'btn btn-primary btn-submit',
'content' => $fontAwesomeIcoHTML.' Upload'


	));

echo form_close();



?>




<div class="sideMessage"> 


</div>

</div> 



</div> 
<br />
<button id="addUploadForm" class="btn btn-success"> Add New Image Form </button>

</div> 


