<?php  
require_once( __DIR__ . '/sqlConfig.php');

$errors = array();
$errorHTML = "";
$infoHTML = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$connection = connectDB("../../dev/hermes/creds.ini");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(!isset($_POST["username"]) || strlen(trim($_POST["username"])) == 0) {
			array_push($errors, "Username is empty.");
	} else {
		// Validate username does not already exist
		$sql = "SELECT username FROM users WHERE username = ?";
		$statement = $connection->prepare($sql);
		$statement->execute(array($_POST["username"]));
		if ($statement->rowCount() > 0) {
			array_push($errors, "Username is taken.");
		} else {
			$username = trim($_POST["username"]);
		}
	}

	if(!isset($_POST["email"]) || strlen(trim($_POST["email"])) == 0) {
			array_push($errors, "email is empty.");
	} else {
		// Validate email does not already exist
		$sql = "SELECT email FROM users WHERE email = ?";
		$statement = $connection->prepare($sql);
		$statement->execute(array($_POST["email"]));
		if ($statement->rowCount() > 0) {
			array_push($errors, "Email is already in use.");
		} else {
			$email = trim($_POST["email"]);
		}
	}

	if(!isset($_POST["password"]) || strlen(trim($_POST["password"])) == 0) {
		array_push($errors, "Password is empty.");
	} elseif(!isset($_POST["confirmPassword"]) || strlen(trim($_POST["confirmPassword"])) == 0) {
		array_push($errors, "Password confirmation is empty.");
	} elseif(trim($_POST["password"]) != trim($_POST["confirmPassword"])) {
		array_push($errors, "Passwords do not match.");
	} else {
		$password = trim($_POST["password"]);
	}

	if(sizeof($errors) == 0) {
		$sql = "INSERT INTO users(username, email, password)";
		$sql .= "VALUES(?, ?, ?)";
		try {
			$statement = $connection->prepare($sql);
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$statement->execute(array($username, $email, $hashedPassword));
			$infoHTML .= "<div class='alert alert-success'>";
			$infoHTML .= "<strong>Success!</strong> Account for <strong>";
			$infoHTML .= $username . "</strong> has been created!</div>\n";
		} catch (PDOException $e) {
			array_push($errors, $e->getMessage());
		}
	} else {
		foreach($errors as $error) {
			$errorHTML .= "<div class='alert alert-danger'>";
			$errorHTML .= "<Strong>Error!</strong> ";
			$errorHTML .= $error . "</div>\n";
		}
	}

	unset($statement);
	unset($connection);
}
?>