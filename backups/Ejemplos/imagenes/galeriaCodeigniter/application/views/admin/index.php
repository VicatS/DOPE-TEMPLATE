




<div class="container">

	<h1> Photo Gallery Admin page </h1>

<?php



echo form_open("admin/login");

$login = array("type" => "text", "name" => "login", "class"  => "form-control", "id" => "login", "maxlength" => "255");
$password = array("type" => "password", "name" => "password", "class" => "form-control", "maxlength" => "12");

echo form_label("Login" , "login");
echo form_input($login);
echo form_label("Password" , "password");
echo form_input($password);

echo form_button( array (


'type' => 'submit',
'class' => 'btn btn-primary',
'content' => 'Login'


) );

echo form_close();

?>

</div>