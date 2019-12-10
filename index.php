<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Hermes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="styles/custom.css">
</head>
<body>
	<!-- Output nav -->
	<?php
	include('navigation.php');
	?>

	<main role="main">
		<div class="jumbotron">
			<div class="text-center">
				<h1 class="text-light">Hermes</h1>
				<p class="text-light">Easy online rocket telemetry streaming.</p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h3>Logging from Launch to Landing</h3>
					<p>Start and stop logging on command so that you see only the telemetry you want, and nothing extra. Access your telemetry from anywhere, so long as you have an internet connection! Updates in real time.</p>
					<p><a class="btn btn-secondary" href="flights.php" role="button">Flight Logs &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h3>Flexibility to Work in Any Rocket</h3>
					<p>Very compact and light, requiring minimal space for all the telemetry this device transmits. Easy to integrate into your rocket so long as it has a payload bay. Create an account to start the integration process.</p>
					<p><a class="btn btn-secondary" href="register.php" role="button">Create Account &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h3>Open Source</h3>
					<p>Hermes is completely modifiable and is licensed under the MIT license. If Hermes does not provide all necessary tools, you are welcome to modify the project for yourself to suit your needs; or create a fork/pull request for the greater good. The website is, too.</p>
					<p><a class="btn btn-secondary" href="https://github.com/teruh/hermes-site" role="button" target="_blank">GitHub Repo &raquo;</a></p>
				</div>
			</div>
		</div>
	</main>


	<!-- Output footer -->
	<?php
	include('footer.php');
	?>
</body>
</html>