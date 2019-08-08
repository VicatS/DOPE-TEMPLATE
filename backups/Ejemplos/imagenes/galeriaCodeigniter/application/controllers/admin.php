<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {  


public function index() { 


if (!sessionExists()) { 

$this->load->template("admin/index");

} else { 

$this->session->set_flashdata("alert" , "You are already logged on");
redirect("/");
}



}

public function logout($user) {

$user_data = $this->session->userdata("user_loggedOn");

if ($user === $user_data['login'] ) {

$this->session->unset_userdata("user_loggedOn");
$this->session->set_flashdata("success" , "Logged out");
redirect("/");


} else {


$this->session->set_flashdata("alert" , "Access not permited");
redirect("/");

}


}


public function login() { 

$login = $this->input->post("login");

$password = md5($this->input->post("password"));


$this->load->model("admin_model");

$login = $this->admin_model->login($login, $password);

if ($login) { 

	$this->session->set_userdata("user_loggedOn" , $login);
$this->session->set_flashdata("success" , "Well done you are logged in");
redirect("/");



} else { 

$this->session->set_flashdata("alert" , "It does not work");
redirect("/");

var_dump($login);


}

}




}
