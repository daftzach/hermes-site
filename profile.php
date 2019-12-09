<?php 
	if(!isset($_GET['flight'])) {
		header("Location: http://itp.zacl.me/hermes/");
		exit;
	}

	$flight_id = $_GET['flight'];

	require_once( __DIR__ . '/scripts/sqlConfig.php');

	$connection = connectDB("../../dev/hermes/creds.ini");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT mission_name FROM flight WHERE flight_id = ?";
	$statement = $connection->prepare($sql);
	$statement->execute(array($flight_id));

	if($statement->rowCount() == 0) {
		header("Location: http://itp.zacl.me/hermes/");
		exit;
	} else {
		$mission_name = $statement->fetchColumn();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo($mission_name . " Profile"); ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link href="styles/profile.css" rel="stylesheet">
	<script src="../chartjs/Chart.min.js"></script>
</head>
<body>

	<div class="d-flex" id="wrapper">
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"><strong>Mission Dashboard</strong></div>
			<div class="list-group list-group-flush">
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=overview"); ?> class="list-group-item list-group-item-action bg-light">Overview</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=pos"); ?> class="list-group-item list-group-item-action bg-light">Positional</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=atm"); ?> class="list-group-item list-group-item-action bg-light">Atmospheric</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=accel"); ?> class="list-group-item list-group-item-action bg-light">Acceleration</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=gyro"); ?> class="list-group-item list-group-item-action bg-light">Gyroscopic</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=pwr"); ?> class="list-group-item list-group-item-action bg-light">Power</a>
				<!-- TODO: check if user owns, can set to private -->
			</div>
		</div>

		<div id="page-content-wrapper">
			<!-- Output nav -->
			<?php
			include('navigation.php');
			?>

			<div class="container-fluid">
				<h2 class="border-bottom"><?php echo($mission_name) ?> Flight Data</h2>
				<?php 


					require_once( __DIR__ . '/scripts/profileGraph.php');
					require_once( __DIR__ . '/scripts/profileTable.php');
					$toDisplay = $_GET['view'];
					switch($toDisplay) {
						case 'pos': 
							echo("<h3>Positional Telemetry</h3>");
							$json = getJSON("../../dev/hermes/creds.ini", $toDisplay, $flight_id);
							include('scripts/graphPositionalTelemetry.php');
							$headerNames = array("Time (UTC)", "Altitude (m)");
							$dbColumns = array('log_time', 'altitude'); 
							$result = displayTelemetryTable("../../dev/hermes/creds.ini", $flight_id, $headerNames, $dbColumns);							
							break;
						case 'atm':
							echo("<h3>Atmospheric Telemetry</h3>");
							$json = getJSON("../../dev/hermes/creds.ini", $toDisplay, $flight_id);
							include('scripts/graphAtmosphericTelemetry.php');
							$headerNames = array("Time (UTC)", "Altitude (m)", "Temperature (c)", "Pressure (hPa)", "Humidity (%)", "VOC Gas (KOhms)");
							$dbColumns = array('log_time', 'altitude', 'temperature', 'pressure', 'humidity', 'gas'); 
							$result = displayTelemetryTable("../../dev/hermes/creds.ini", $flight_id, $headerNames, $dbColumns);						
							break;
						case 'accel':
							echo("<h3>Acceleration Telemetry</h3>");
							$json = getJSON("../../dev/hermes/creds.ini", $toDisplay, $flight_id);
							include('scripts/graphAccelerationTelemetry.php');
							$headerNames = array("Time (UTC)", "Altitude", "X Acceleration", "Y Acceleration", "Z Acceleration");
							$dbColumns = array('log_time', 'altitude', 'accelX', 'accelY', 'accelZ'); 
							$result = displayTelemetryTable("../../dev/hermes/creds.ini", $flight_id, $headerNames, $dbColumns);						
							break;			
						case 'gyro':
							echo("<h3>Gyroscopic Telemetry</h3>");
							$json = getJSON("../../dev/hermes/creds.ini", $toDisplay, $flight_id);
							include('scripts/graphGyroscopeTelemetry.php');
							$headerNames = array("Time (UTC)", "Altitude", "X Gyroscope", "Y Gyroscope", "Z Gyroscope");
							$dbColumns = array('log_time', 'altitude', 'gyroX', 'gyroY', 'gyroZ'); 
							$result = displayTelemetryTable("../../dev/hermes/creds.ini", $flight_id, $headerNames, $dbColumns);						
							break;			
						case 'pwr':
							echo("<h3>Power Telemetry</h3>");
							$json = getJSON("../../dev/hermes/creds.ini", $toDisplay, $flight_id);
							include('scripts/graphPowerTelemetry.php');
							$headerNames = array("Time (UTC)", "Altitude", "Charge (%)", "Voltage (mV)");
							$dbColumns = array('log_time', 'altitude', 'charge', 'voltage'); 
							$result = displayTelemetryTable("../../dev/hermes/creds.ini", $flight_id, $headerNames, $dbColumns);						
							break;
						default:
							echo("<h3>Overview</h3>");
							$headerNames = array("Time (UTC)", "Temperature (c)", "Pressure (hPa)", "Humidity (%)", "VOC Gas (KOhms)", "Altitude (m)", "X Acceleration", "Y Acceleration", "Z Acceleration", "X Gyroscope", "Y Gyroscope", "Z Gyroscope", "Battery Charge (%)", "Battery Voltage (mV)");
							$dbColumns = array('log_time', 'temperature', 'pressure', 'humidity', 'gas', 'altitude', 'accelX', 'accelY', 'accelZ', 'gyroX', 'gyroY', 'gyroZ', 'charge', 'voltage'); 
							$result = displayTelemetryTable("../../dev/hermes/creds.ini", $flight_id, $headerNames, $dbColumns);							
					}
				?>
				<h4>Raw Telemetry</h4>
				<div class="table-responsive">
				<?php echo($result); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Output footer -->
	<?php
	include('footer.php');
	?>
</body>
</html>