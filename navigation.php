<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Hermes</a>
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class ="nav-link" href="index.php">Home</a>
		</li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<!-- Only display if user logged out -->
		<?php if (!isset($_SESSION['loggedIn'])) {
			echo("<div class='btn-group' role='group' aria-label='Account'>
				<a class='btn btn-info ml-auto mr-1' href='register.php' role='button'>Register</a>
				<a class='btn btn-info ml-auto mr-1' href='login.php' role='button'>Login</a>
				</div>");
		} else {
			echo("<li>
				<div class='btn-group' role='group'>
					<button class='btn btn-info dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" .
						$_SESSION['username'] .
					"</button>
					<div class='dropdown-menu dropdown-menu-right'>
						<a class='dropdown-item' href='newflight.php'>New Launch</a>
						<a class='dropdown-item' href='flights.php'>Flights</a>
						<a class='dropdown-item' href='scripts/userLogout.php'>Logout</a>
					</div>					
				</div>
			</li>");
		}
		?>
	</ul>
</nav>