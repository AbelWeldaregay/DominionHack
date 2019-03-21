<?php 
//enables error reporting
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
include_once "connect.php";
include_once "services.php";

 if(isset($_POST['loginRequest'])) {

 	$email = $_POST['email'];
 	$password = $_POST['password'];

 	$webService = new webService();
 	$login = $webService -> loginUser($email, $password);

 	echo $login;

 }



?>