<?php include ( __DIR__ . '/scripts/userCreate.php' ); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="styles/register.css" rel="stylesheet">
</head>
<body class="text-center">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form-register">
		<?php 
			if(strlen($errorHTML) > 1) {
				echo($errorHTML); 
			}
			if(strlen($infoHTML) > 1) {
				echo($infoHTML); 
			}
		?>
		<fieldset>
			<legend class="text-white">Create Account</legend>
			<p class="text-white"><i>Username is not case-sensitive.</i></p>

			<div class="form-group">
				<label for="username" class="sr-only">Username</label>
				<input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
			</div>

			<div class="form-group">
				<label for="email" class="sr-only">Email</label>
				<input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
			</div>

			<div class="form-group">
				<label for="password" class="sr-only">Password</label>
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
			</div>

			<div class="form-group">
				<label for="confirmPassword" class="sr-only">Confirm Password</label>
				<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
			</div>

			<div class="form-group">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="Register">
			</div>
		</fieldset>
	</form>
</body>
</html>