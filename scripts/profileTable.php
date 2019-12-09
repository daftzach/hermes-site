<?php
require_once( __DIR__ . '/sqlConfig.php');

// Return a string that can be used as an HTML table
// $iniPath is given to config.php for MySQL db credentials
// $sql is sql query being used
// $headingNames corresponds to the labels for the header names for the HTML table
// $dbColumns corresponds to the actual name of the columns in the SQL table
function displayTelemetryTable($iniPath, $id, $headingNames, $dbColumns) {
	// Establish DB connection and run desired query
	$connection = connectDB($iniPath);
	$sql = "SELECT * FROM flight_data WHERE flight_id = ?";
	$records = $connection->prepare($sql);
	$records->execute(array($id));
	// Create the table and first row manually
	$table = "<table class='table table-striped table-sm'>";
	$table .= "<thead><tr>";
	// Create HTML table columns according to array
	foreach ($headingNames as $names) {
		$table .= "<th scope='col'>" . $names . "</th>";
	}
	$table .= "</tr></thead>";
	// Search for column named 'log_time'
	$idColumn = array_search('log_time', $dbColumns);
	// Each record is a new table row
	$table .= "<tbody>";
	foreach( $records as $row )
	{
	    $table .= "<tr>";
	    // Create new table row based off of 'log_time'
	    $table .= "<th scope='row'>" . $row[$dbColumns[$idColumn]] . "</th>";
	    foreach ($dbColumns as $column) {
	    		if ($column != 'log_time') {
	    				$table .= "<td>" . $row[$column] . "</td>";
	    		}
	    }
	    $table .= "</tr>";
	}
	unset($records);
	unset($connection);
	// Close table tag
	$table .= "</tbody></table>";
	return $table;
}
?>