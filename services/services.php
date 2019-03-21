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

	}

}

?>