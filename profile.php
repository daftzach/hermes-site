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
	$mission_name = $statement->fetchColumn();
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
</head>
<body>

	<div class="d-flex" id="wrapper">
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"><strong>Mission Dashboard</strong></div>
			<div class="list-group list-group-flush">
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=overview"); ?> class="list-group-item list-group-item-action bg-light">Overview</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=alt"); ?> class="list-group-item list-group-item-action bg-light">Altitude</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=temp"); ?> class="list-group-item list-group-item-action bg-light">Temperature</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=accel"); ?> class="list-group-item list-group-item-action bg-light">Acceleration</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=gyro"); ?> class="list-group-item list-group-item-action bg-light">Gyroscope</a>
				<a href=<?php echo("profile.php" . "?flight=" . $flight_id . "&view=pwr"); ?> class="list-group-item list-group-item-action bg-light">Power</a>
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
						case "alt": 
							echo("<h2>Altitude</h2>");
							displayChart('altitude');
							break;
						case 'temp':
							echo("<h2>Temperature</h2>");
							displayChart('temperature');
							break;
						case 'accel':
							echo("<h2>Acceleration</h2>");
							displayChart('acceleration');
							break;				
						case 'gyro':
							echo("<h2>Gyroscope</h2>");
							displayChart('gyroscope');
							break;			
						case 'pwr':
							echo("<h2>Power</h2>");
							displayChart('power');
							break;
						default:
							echo("<h2>Overview</h2>");
							displayChart('hello');
					}

					displayTable($flight_id); 
				?>
			</div>
		</div>
	</div>
	<!-- Output footer -->
	<?php
	include('footer.php');
	?>
</body>
</html>