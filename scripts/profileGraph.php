<?php  
function getJSON($iniPath, $type, $id) {
	$data = array();

	// Establish DB connection and run desired query
	$connection = connectDB($iniPath);

	if ($type == 'pos') {
		$sql = "SELECT log_time, altitude FROM flight_data WHERE flight_id = ?";
		$records = $connection->prepare($sql);
		$records->execute(array($id));
		$result = $records->fetchAll(PDO::FETCH_OBJ);

		foreach( $result as $row )
		{
			array_push($data, array("time"=> $row->log_time, "altitude"=> $row->altitude));
		}

		$jsonData = json_encode($data);

	} elseif ($type == 'atm') {
		$sql = "SELECT altitude, temperature, pressure, humidity, gas FROM flight_data WHERE flight_id = ?";
		$records = $connection->prepare($sql);
		$records->execute(array($id));
		$result = $records->fetchAll(PDO::FETCH_OBJ);

		foreach( $result as $row )
		{
			array_push($data, array("altitude"=> $row->altitude, "temperature"=> $row->temperature, "pressure"=> $row->pressure, "humidity"=> $row->humidity, "pressure"=> $row->pressure, "gas"=> $row->gas));
		}

		$jsonData = json_encode($data);
	} else if ($type == 'accel') {
		$sql = "SELECT altitude, accelX, accelY, accelZ FROM flight_data WHERE flight_id = ?";
		$records = $connection->prepare($sql);
		$records->execute(array($id));
		$result = $records->fetchAll(PDO::FETCH_OBJ);

		foreach( $result as $row )
		{
			array_push($data, array("altitude"=> $row->altitude, "accelX"=> $row->accelX, "accelY"=> $row->accelY, "accelZ"=> $row->accelZ));
		}

		$jsonData = json_encode($data);
	} elseif ($type == 'gyro') {
		$sql = "SELECT altitude, gyroX, gyroY, gyroZ FROM flight_data WHERE flight_id = ?";
		$records = $connection->prepare($sql);
		$records->execute(array($id));
		$result = $records->fetchAll(PDO::FETCH_OBJ);

		foreach( $result as $row )
		{
			array_push($data, array("altitude"=> $row->altitude, "gyroX"=> $row->gyroX, "gyroY"=> $row->gyroY, "gyroZ"=> $row->gyroZ));
		}

		$jsonData = json_encode($data);
	} elseif ($type == 'pwr') {
		$sql = "SELECT log_time, charge, voltage FROM flight_data WHERE flight_id = ?";
		$records = $connection->prepare($sql);
		$records->execute(array($id));
		$result = $records->fetchAll(PDO::FETCH_OBJ);

		foreach( $result as $row )
		{
			array_push($data, array("time"=> $row->log_time, "charge"=> $row->charge, "voltage"=> $row->voltage));
		}

		$jsonData = json_encode($data);
	} else {
		echo("ERROR! Invalid graph data type.");
	}

	unset($records);
	unset($connection);

	return $jsonData;
}
?>