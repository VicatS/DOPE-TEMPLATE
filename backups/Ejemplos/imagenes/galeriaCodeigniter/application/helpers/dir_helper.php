<?php

function make($dir) {

	$ci = get_instance();

if (!is_dir($dir)) {
mkdir ($dir, "0755");
} else {

 $ci->session->set_flashdata("alert" , "Directory already exists");
 redirect("/");

}


}

function delempty($dir) {

	$ci = get_instance();

if (is_dir($dir)) { 

if (rmdir ($dir)) {

$ci->session->set_flashdata("success" , "Success");
 redirect("/");

} else {

 $ci->session->set_flashdata("alert" , "error while trying to delete directory");
 redirect("/");

}

} else {


$ci->session->set_flashdata("alert" , "Cannot remove directory, directory doesn't exists or this is not a directory");
 redirect("/");



} }

function delfull($dir) {

	$ci = get_instance();

if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }  

else {

$ci->session->set_flashdata("alert" , "Cannot remove directory, directory doesn't exists or this is not a directory");
 redirect("/");


}



} 






