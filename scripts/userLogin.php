<?php  
require_once( __DIR__ . '/sqlConfig.php');

$errors = array();
$errorHTML = "";
$infoHTML = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$connection = connectDB("../../dev/hermes/creds.ini");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Check that username field has been filled
	if(!isset($_POST["username"]) || strlen(trim($_POST["username"])) == 0) {
		array_push($errors, "Username is empty.");
	} else {
		$username = trim($_POST["username"]);
	}

	// Check that password field has been filled
	if(!isset($_POST["password"]) || strlen(trim($_POST["password"])) == 0) {
		array_push($errors, "Password is empty.");
	} else {
		$password = trim($_POST["password"]);
	}

	if(sizeof($errors) == 0) {
		$sql = "SELECT user_id, username, password FROM users WHERE username = ?";
		try {
			$statement = $connection->prepare($sql);
			$statement->execute(array($username));
		} catch (PDOException $e) {
			array_push($errors, $e->getMessage());
		}
		if($statement->rowCount() == 1) {
			$row = $statement->fetch();
			$user_id = $row["user_id"];
			$hashedPassword = $row["password"];
			if(password_verify($password, $hashedPassword)) {
				session_start();
				$_SESSION['loggedIn'] = true;
				$_SESSION['username'] = $username;
			} else {
				array_push($errors, "Password is incorrect.");
			}
		} else {
			array_push($errors, "Username does not exist.");
		}
	} 

	foreach($errors as $error) {
		$errorHTML .= "<div class='alert alert-danger'>";
		$errorHTML .= "<Strong>Error!</strong> ";
		$errorHTML .= $error . "</div>\n";
	}

	unset($statement);
	unset($connection);
}
?>