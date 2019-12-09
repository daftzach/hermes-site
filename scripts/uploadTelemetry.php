<?php  
require_once( __DIR__ . '/sqlConfig.php');

$requiredFields = ['imei', 'fi', 'xA', 'yA', 'zA', 'xG', 'yG', 'zG', 'a', 't', 'p', 'h', 'g', 'c', 'v'];

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
	if(!isset($_POST["fi"]) || strlen(trim($_POST["fi"])) == 0) {
		echo("fi is empty! Aborting!");
		die();
	} else {
		// Validate flight exists in devices in valid devices table
		$sql = "SELECT imei FROM flight WHERE flight_id = ?";
		$statement = $connection->prepare($sql);
		$statement->execute(array($_POST["fi"]));
		if ($statement->rowCount() <= 0) {
			echo("Invalid flight id! Aborting!");
			die();
		} else {
			// Verify imei is associated with this flight_id
			$flight_id_row = $statement->fetch();
			if ($flight_id_row['imei'] != $imei) {
				echo($flight_id_row['imei']);
				echo($imei);
				echo("This device has no authority over this flight number! Aborting!");
				die();
			}
			unset($flight_id_row);
		}

	// Verify all fields are set
	foreach($requiredFields as $field) {
		if(!isset($_POST[$field]) || strlen(trim($_POST[$field])) == 0) {
			echo($field . " is empty! Aborting!");
			die();
		}
	}

	$flight_id = $_POST["fi"];
	$temperature = $_POST["t"];
	$pressure = $_POST["p"];
	$humidity = $_POST["h"];
	$gas = $_POST["g"];
	$altitude = $_POST["a"];
	$accelX = $_POST["xA"];
	$accelY = $_POST["yA"];
	$accelZ = $_POST["zA"];
	$gyroX = $_POST["xG"];
	$gyroY = $_POST["yG"];
	$gyroZ = $_POST["zG"];
	$charge = $_POST["c"];
	$voltage = $_POST["v"];

//$requiredFields = ['imei', 'fi', 'xA', 'yA', 'zA', 'xG', 'yG', 'zG', 'a', 't', 'p', 'h', 'g', 'c', 'v'];
	$sql = "INSERT INTO flight_data(flight_id, temperature, pressure, humidity, gas, altitude, accelX, accelY, accelZ, gyroX, gyroY, gyroZ, charge, voltage)";
	$sql .= "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	try {
		$statement = $connection->prepare($sql);
		$statement->execute(array($flight_id, $temperature, $pressure, $humidity, $gas, $altitude, $accelX, $accelY, $accelZ, $gyroX, $gyroY, $gyroZ, $charge, $voltage));
	} catch (PDOException $e) {
		echo($e->getMessage());
	}

	echo("TELEMETRY SENT!");

	unset($statement);
	unset($connection);
	}
}
?>