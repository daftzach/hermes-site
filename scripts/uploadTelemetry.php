<?php  
require_once( __DIR__ . '/sqlConfig.php');

$requiredFields = ['altitude'];

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$connection = connectDB("../../../dev/hermes/creds.ini");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Verify IMEI is present and validate it
	if(!isset($_POST["imei"]) || strlen(trim($_POST["imei"])) == 0) {
		echo("IMEI is empty! Aborting!");
		die();
	} else {
		// Validate IMEI exists in devices in valid devices table
		$sql = "SELECT * FROM devices WHERE imei = ?";
		$statement = $connection->prepare($sql);
		$statement->execute(array($_POST["imei"]));
		if ($statement->rowCount() <= 0) {
			echo("Unregistered device! Aborting!");
			die();
		} else {
			$imei = $_POST["imei"];
		}
	}

	// Verify flight_id is present and validate it
	if(!isset($_POST["flight_id"]) || strlen(trim($_POST["flight_id"])) == 0) {
		echo("flight_id is empty! Aborting!");
		die();
	} else {
		// Validate flight exists in devices in valid devices table
		$sql = "SELECT imei FROM flight WHERE flight_id = ?";
		$statement = $connection->prepare($sql);
		$statement->execute(array($_POST["flight_id"]));
		if ($statement->rowCount() <= 0) {
			echo("Invalid flight id! Aborting!");
			die();
		} else {
			// Verify imei is associated with this flight_id
			$flight_id_row = $statement->fetch();
			if ($flight_id_row['imei'] != $imei) {
				echo($flight_id_row['imei']);
				echo($imei);
				echo("This device has no authority over this flight number.");
				die();
			}
			unset($flight_id_row);
			$flight_id = $_POST["flight_id"];
		}

	foreach($requiredFields as $field) {
		
	}

	echo("TELEMETRY SENT!");

	unset($statement);
	unset($connection);
}
?>