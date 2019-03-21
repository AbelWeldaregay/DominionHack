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

	public function insertCustomerSql($name, $email, $phoneNumber, $address, $age, $gender, $password) {

		$sql = "INSERT INTO Customers (name, email, password, age, gender, address, cellPhone) VALUES ('$name', '$email', '$password', '$age', '$gender', '$address', '$phoneNumber')";

		return $sql;

	}

	public function userExistsSql($email) {

		$sql = "SELECT * FROM Customers WHERE email = '$email'";
		return $sql;
	}
	
}


?>