<?php include ( __DIR__ . '/scripts/userLogin.php' ); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<legend class="text-white">Login</legend>
			<p class="text-white"><i>Username is not case-sensitive.</i></p>

			<div class="form-group">
				<label for="username" class="sr-only">Username</label>
				<input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
			</div>

			<div class="form-group">
				<label for="password" class="sr-only">Password</label>
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
			</div>

			<div class="form-group">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
			</div>
		</fieldset>
	</form>
</body>
</html>