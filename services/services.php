<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
	include_once "connect.php";
	include_once "sql.php";

class WebService {


	public function loginUser($email, $password) {
		
		$database_connection = new DatabaseConnection();
  	    $conn = $database_connection->getConnection();
		$sql_service = new SqlService();
		$loginUserSql = $sql_service->loginUserSql($email, $password);

		$result = $conn->query($loginUserSql);

		if ($result->num_rows > 0) {
			 
			echo "true";
		} else {
			echo "false";
		}

		$conn->close();

	}


	public function insertProvider($name, $email, $phoneNumber, $address, $age, $gender, $password, $service, $experience) {

		$database_connection = new DatabaseConnection();
  	    $conn = $database_connection->getConnection();
		$sql_service = new SqlService();
		
		$providerExistsSql = $sql_service->providerExistsSql($email);

		$providerExistsResult = $conn->query($providerExistsSql);

		if($providerExistsResult->num_rows > 0) {
		
			echo "providerExists";
		
		} else {

			$insertProviderSql = $sql_service->insertProviderSql($name, $email, $phoneNumber, $address, $age, $gender, $password, $service, $experience);

			$result = $conn->query($insertProviderSql);

			echo "success";


		}		


	}

	public function insertCustomer($name, $email, $phoneNumber, $address, $age, $gender, $password){

		$database_connection = new DatabaseConnection();
  	    $conn = $database_connection->getConnection();
		$sql_service = new SqlService();

		$userExistsSql = $sql_service->userExistsSql($email);

		$userExistsResult = $conn->query($userExistsSql);

		if($userExistsResult->num_rows > 0) {
		
			echo "customerExists";
		
		} else {
			
			$insertCustomerSql = $sql_service->insertCustomerSql($name, $email, $phoneNumber, $address, $age, $gender, $password);

			$result = $conn->query($insertCustomerSql);
			
			echo "success";

		}

		$conn->close();

	}



}

?>