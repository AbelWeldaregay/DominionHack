<?php

//enables error reporting
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
include_once "connect.php";

class SqlService {

	public function loginUserSql($email, $password) {

		$sql = "SELECT * FROM Customers WHERE email = '$email' AND password = '$password'";
		return $sql;

	}
	
}


?>