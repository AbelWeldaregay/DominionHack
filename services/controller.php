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

 if(isset($_POST['registerCustomer'])) {

 	$name = $_POST["name"];
 	$email = $_POST["email"];
 	$phoneNumber = $_POST["phoneNumber"];
 	$address = $_POST["address"];
 	$age = $_POST["age"];
 	$gender = $_POST["gender"];
 	$password = $_POST["password"];
	
	$webService = new webService();
	$insertCustomerSql = $webService -> insertCustomer($name, $email, $phoneNumber, $address, $age, $gender, $password);
	echo $insertCustomerSql;

 }

?>