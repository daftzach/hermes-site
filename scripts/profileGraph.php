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
		echo("TODO");
	} else if ($type == 'accel') {
		echo("TODO");
	} elseif ($type == 'gyro') {
		echo("TODO");
	} elseif ($type == 'pwr') {
		echo("TODO");
	} else {
		echo("ERROR! Invalid graph data type.");
	}

	unset($records);
	unset($connection);

	return $jsonData;
}
?>