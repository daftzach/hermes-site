<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="styles/register.css" rel="stylesheet">
</head>
<body class="text-center">
	<form class="form-register">
		<h1 class="text-white">Create Account</h1>

		<div class="form-group">
			<label for="username" class="sr-only">Username</label>
			<input type="email" id="username" class="form-control" placeholder="Username" required autofocus>
		</div>

		<div class="form-group">
			<label for="email" class="sr-only">Email</label>
			<input type="email" id="email" class="form-control" placeholder="Email address" required autofocus>
		</div>

		<div class="form-group">
			<label for="password" class="sr-only">Password</label>
			<input type="password" id="password" class="form-control" placeholder="Password" required>
		</div>

		<div class="form-group">
			<label for="confirmPassword" class="sr-only">Confirm Password</label>
			<input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
		</div>

		<div class="form-group">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		</div>
	</form>
</body>
</html>