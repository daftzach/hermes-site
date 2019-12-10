<?php
require_once( __DIR__ . '/sqlConfig.php');

// Return a string that can be used as an HTML table
// $iniPath is given to config.php for MySQL db credentials
// $headingNames corresponds to the labels for the header names for the HTML table
function displayFlightTable($iniPath, $userID, $headingNames) {
	// Establish DB connection and run desired query
	$connection = connectDB($iniPath);

	$table = "";

	if($userID != -1) {
		$sql = "SELECT flight.flight_id, flight.mission_name, flight.vessel_name, users.username FROM flight INNER JOIN users ON flight.owner = users.user_id WHERE flight.owner = ?";
		$records = $connection->prepare($sql);
		$records->execute(array($userID));
		$result = $records->fetchAll(PDO::FETCH_ASSOC);

		$table .= "<table class='table table-striped table-lg'>";
		$table .= "<thead><tr>";

		foreach ($headingNames as $names) {
			$table .= "<th scope='col'>" . $names . "</th>";
		}

		$table .= "</tr></thead>";
		$table .= "<tbody>";
		
		if ($records->rowCount() <= 0) {
			$table .= "<tr>";
			$table .= "<th scope='row'>No flights yet!</th>";
			$table .= "<td></td>";
			$table .= "</tr>";
		}

		foreach( $result as $row )
		{
			$table .= "<tr>";
			$table .= "<th scope='row'><a href='profile.php?flight=". $row['flight_id'] . "'>" . $row['mission_name'] . "</a></th>";
			$table .= "<td>" . $row['vessel_name'] . "</td>";
			$table .= "</tr>";
		}	
	} else {
		$sql = "SELECT flight.flight_id, flight.mission_name, flight.vessel_name, users.username FROM flight INNER JOIN users ON flight.owner = users.user_id";
		$records = $connection->query($sql);
		$result = $records->fetchAll(PDO::FETCH_ASSOC);

		$table = "<table class='table table-striped table-lg'>";
		$table .= "<thead><tr>";
		foreach ($headingNames as $names) {
			$table .= "<th scope='col'>" . $names . "</th>";
		}
		$table .= "</tr></thead>";
		$table .= "<tbody>";
		foreach( $result as $row )
		{
			$table .= "<tr>";
			$table .= "<th scope='row'><a href='profile.php?flight=". $row['flight_id'] . "'>" . $row['mission_name'] . "</a></th>";
			$table .= "<td>" . $row['vessel_name'] . "</td>";
			$table .= "<td>" . $row['username'] . "</td>";
			$table .= "</tr>";
		}		
	}
	unset($records);
	unset($connection);
	$table .= "</tbody></table>";
	return $table;
}
?>