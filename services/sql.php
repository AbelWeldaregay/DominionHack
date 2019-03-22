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

	public function fetchAllProvidersSql() {

		$sql = "SELECT * FROM Providers";

		return $sql;

	}

	public function insertAppointmentSql($serviceId, $appointmentTime, $appointmentDate, $status) {

		$sql = "INSERT INTO serviceLogs (customerId, providerId, status, appointmentTime, appointmentDate) 
		VALUES ('1', '$serviceId', 1, '$appointmentTime', '$appointmentDate')";

		return $sql;

	}

	public function providerExistsSql($email) {

		$sql = "SELECT * FROM Providers WHERE email = '$email'";
		return $sql;
	}

	public function userExistsSql($email) {

		$sql = "SELECT * FROM Customers WHERE email = '$email'";
		return $sql;
	}

	public function insertProviderSql($name, $email, $phoneNumber, $address, $age, $gender, $password, $service, $experience) {

		$sql = "INSERT INTO Providers (name, email, password, age, gender, address, cellPhone, experience, service ) VALUES ('$name', '$email', '$password', '$age', '$gender', '$address','$phoneNumber', '$experience', '$service')";

		return $sql;

	}
	
}


?>