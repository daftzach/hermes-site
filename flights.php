<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Flight List</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<!-- Output nav -->
	<?php
	include('navigation.php');

	$loggedIn = false;

	if (isset($_SESSION['userID'])) {
		$loggedIn = true;			
	}
	?>

	<div class="jumbotron">
		<h1>Flight Directory</h1>
	</div>

	<div class="container" id="wrapper">
		<?php 
			require_once( __DIR__ . '/scripts/flightsTable.php');

			if ($loggedIn) {
				$myFlightsHeaders = array("Mission Name", "Launch Vehicle");
				$myFlights  = displayFlightTable("../../dev/hermes/creds.ini", $_SESSION['userID'], $myFlightsHeaders);
			} else {
				$myFlights = "";
			}

			$flightsHeaders = array("Mission Name", "Launch Vehicle", "Owner");
			$allFlights = displayFlightTable("../../dev/hermes/creds.ini", -1, $flightsHeaders);

			if($loggedIn) {
				echo("<h1>My Flights</h1>");
				echo($myFlights);
			}

			echo("<h1>All Flights</h1>");
			echo($allFlights);
		?>

	</div>

	<!-- Output footer -->
	<?php
	include('footer.php');
	?>
</body>
</html>