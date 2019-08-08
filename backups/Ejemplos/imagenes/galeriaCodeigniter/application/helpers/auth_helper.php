<?php 


function sessionExists($session="user_loggedOn") {

$ci = get_instance();

$user = $ci->session->userdata($session);

return $user;

}




function sessionCheck($session="user_loggedOn")  {

$ci = get_instance();

$user = $ci->session->userdata($session);

if (!$user) {


$ci->session->set_flashdata("alert", "You must be logged on to access this page");
redirect("/");

}

return $user;

}

