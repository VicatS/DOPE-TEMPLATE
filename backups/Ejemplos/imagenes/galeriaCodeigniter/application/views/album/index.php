

<?php 

$session_ok = $this->session->flashdata("success");
$session_notok =  $this->session->flashdata("alert");

?>

<?php if ($session_notok) : ?>

<div class="alert alert-danger"> <?= $session_notok; ?></div>

<?php elseif($session_ok) : ?>

<div class="alert alert-success"> <?= $session_ok; ?> </div>

<?php endif; ?> 

<div class="container">




<div class="col-md-12 col-xs-12">

<h1> Easy ease Photo Gallery v 0.9 </h1>

<p>

<?php if(sessionExists()) : ?>

<?= anchor("album/insert" , "Insert new Album", array("class" => 'btn btn-primary')); endif; ?>
<br />

</p>
</div>
<?php 



foreach ($data as $album) :


	?>
<div class='col-sm-3 col-xs-12 albumObj'>


<div class="albumTmb">

    <?php if (!$album['default_image']) :?>

    <?=  anchor("photos/{$album['id']}", "<img src='".base_url("imgDefault/album.jpg")."' class='img-responsive thumbnail'/>" );   ?>      
    
<?php else : ?>

<?=  anchor("photos/{$album['id']}", "<img src='".base_url("albums/".$album['name']."/".$album['default_image'])."' class='img-responsive thumbnail'/>" );   ?> 



<?php endif; ?>

	<p> <?=  anchor("photos/{$album['id']}", $album['name'], array("class" => "albumTitle")) ?> </p>
	<p class="text-justify"> <?=  $album['description'] ?> </p>
	<p> <?php if(sessionExists()) : echo anchor("photos/upload/{$album['id']}", "Upload Photos", array('class' => 'btn btn-primary'));  ?></p>
	<p> <?php echo anchor("album/delete/{$album['id']}" , "Delete album", array('class' => 'btn btn-danger')); ?> </p>
    <p> <?php echo anchor("album/edit/{$album['id']}" , "Edit album", array('class' => 'btn btn-success')); endif; ?> </p>
</div>
</div>
<?php endforeach ?>

</div>