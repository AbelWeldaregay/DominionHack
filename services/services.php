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
			 
			echo "customer";
		} else {
			
			$loginProviderSql = $sql_service->loginProviderSql($email, $password);

			$result = $conn->query($loginProviderSql);

			if ($result->num_rows > 0) {
			
				echo "provider";
			
			} else {

				echo "false";
		
			}

		}

		$conn->close();

	}

	public function fetchAllProviders() {

		$database_connection = new DatabaseConnection();
		$conn = $database_connection->getConnection();
		$sql_service = new SqlService();
		$fetchAllProvidersSql = $sql_service->fetchAllProvidersSql();

		$result = $conn->query($fetchAllProvidersSql);

		if($result->num_rows > 0) {

			while ($row = $result->fetch_assoc()) {

				$data["providers"][] = $row;


			}

			$conn->close();
			return json_encode($data);

		}


	}


	public function insertAppointment($serviceId, $appointmentTime, $appointmentDate, $status) {

		$database_connection = new DatabaseConnection();
		$conn = $database_connection->getConnection();
		$sql_service = new SqlService();
		$insertAppointmentSql = $sql_service->insertAppointmentSql($serviceId, $appointmentTime, $appointmentDate, $status);


		$result = $conn->query($insertAppointmentSql);

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