<?php


echo form_open("album/login");

echo form_input(

array (

"name" => "login",
"type" => "text",
"class" => "form-control",
"id" => "login",
"maxlength" => "255"


)


);


echo form_input (


array (

"name" => "password",
"id" => "password",
"class" => "form-control",
"type"=> "password",
"maxlength" => "12"


)


);


echo form_button(

array (

"type" => "submit",
"class" => "btn btn-primary"

)

);


echo form_close();