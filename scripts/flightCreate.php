<?php  
require_once( __DIR__ . '/sqlConfig.php');

$errors = array();
$errorHTML = "";
$infoHTML = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$connection = connectDB("../../dev/hermes/creds.ini");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(!isset($_POST["mission"]) || strlen(trim($_POST["mission"])) == 0) {
			array_push($errors, "Mission Name is empty.");
	} else {
		$missionName = $_POST["mission"];
	}

	if(!isset($_POST["vessel"]) || strlen(trim($_POST["vessel"])) == 0) {
			array_push($errors, "Vessel Name is empty.");
	} else {
		$vesselName = $_POST["vessel"];
	}

	if(!isset($_POST["imei"]) || strlen(trim($_POST["imei"])) == 0) {
		array_push($errors, "IMEI is empty.");
	} else {
		$imei = trim($_POST["imei"]);
	}

	if(sizeof($errors) == 0) {
		$sql = "INSERT INTO flight(mission_name, vessel_name, imei, owner)";
		$sql .= "VALUES(?, ?, ?, ?)";
		try {
			$statement = $connection->prepare($sql);
			$statement->execute(array($missionName, $vesselName, $imei, $_SESSION['userID']));
			$infoHTML .= "<div class='alert alert-success'>";
			$infoHTML .= "<strong>Success!</strong> Mission <strong>";
			$infoHTML .= $missionName . "</strong> has been created!</div>\n";
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