


<div class="container">

<div id="top_menu_gallery">

<div class="nav-controls">

<?= anchor(base_url(), "<span class='glyphicon glyphicon-chevron-left'> </span> Back", array("class" => "backHome")  );?>

</div>

</div>

<div id="photo_gallery" class="carousel slide" data-ride="carousel">




 
   
    


 
<div class="carousel-inner">
<?php


$slide = 1;


foreach ($data as $photo) :

?>

  
    <div class="item <?php if ($slide == 1) { echo "active";} ?>">

<img src="<?=base_url()."albums/{$photo['albumName']}/{$photo['Picname']}.{$photo['extension']}" ?>" class="img-responsive" />

</div>

<?php $slide++; ?>

<?php endforeach; ?>

</div>

  <!-- Left and right controls -->

 <a class="left carousel-control" href="#photo_gallery" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#photo_gallery" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div id="thumbnails">
<ul>
<?php


$slide = 0;


foreach ($data as $photo) :

?>


 <li data-target="#photo_gallery" data-slide-to="<?= $slide;?>" 

 class="<?php if ($slide == 0) { echo "active";} ?>"> <img src="<?=base_url()."albums/{$photo['albumName']}/{$photo['Picname']}.{$photo['extension']}" ?>"  /> </li>

<?php $slide++; ?>
<?php endforeach; ?>
</ul>
</div>
</div>