<?php 
if (isset($_POST['submit'])) {
 	$imagenArr = $_POST['imagen'];
 	$colorArr = $_POST['color'];
 	$precioArr = $_POST['precio'];
 	$stockArr = $_POST['stock'];
 	if (!empty($imagenArr)) {
 		for ($i=0; $i < count($imagenArr) ; $i++) { 
 			if (!empty($imagenArr[$i])) {
 				$imagen = $imagenArr[$i];
 				$color = $colorArr[$i];
 				$precio = $precioArr[$i];
 				$stock = $stockArr[$i];

 				echo 'Group '.($i+1).': '.$imagen.' ===> '.$color.' ===> '.$precio.' ===> '.$stock.'</br>';
 			}
 		}
 	}
 } 
 ?>