<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>New Flight</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<!-- Output nav -->
	<?php
	include('navigation.php');
	if(!isset($_SESSION['loggedIn'])) {
		header("Location: http://itp.zacl.me/hermes/login.php");
		exit;
	}

	include ( __DIR__ . '/scripts/flightCreate.php' );
	?>

	<div class="jumbotron">
		<div class="text-center">
			<h1>Flight Registration</h1>
		</div>
	</div>

	<div class="container" id="wrapper">
		<p>Below is a form the create a new flight. A new flight must be created if you would like to log data seperately outside of an existing mission. The IMEI is crucial: double, triple, quadruple check it was typed in correctly, or Hermes will not be able to log your telemetry! The flight should become visible under the flights directory immediately after it is successfully registered.</p>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<fieldset>
				<legend>New Flight</legend>
				<?php 
					if(strlen($errorHTML) > 1) {
						echo($errorHTML); 
					}
					if(strlen($infoHTML) > 1) {
						echo($infoHTML); 
					}
				?>
				<div class="form-group">
					<label for="mission">Mission Name:</label>
					<input type="text" id="mission" name="mission" class="form-control">
				</div>

				<div class="form-group">
					<label for="vessel">Vessel Name:</label>
					<input type="text" id="vessel" name="vessel" class="form-control">
				</div>

				<div class="form-group">
					<label for="imei">Device IMEI:</label>
					<input type="text" id="imei" name="imei" class="form-control">
				</div>

				<div class="form-group">
					<input type="submit" value="Create" class="btn btn-primary">
				</div>
			</fieldset>
		</form>
	</div>

	<!-- Output footer -->
	<?php
	include('footer.php');
	?>
</body>
</html>