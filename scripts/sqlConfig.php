<?php 
// Return new PDO connection to MySQL server
function connectDB($iniPath) {
	static $connection;
	// Save .ini file contents to string
	$config = parse_ini_file($iniPath);
	// Save .ini elements to vars
	$server_name = $config['servername'];
	$database_name = $config['dbname'];
	$username = $config['username'];
	$password = $config['password'];
	$connection_string = "mysql:host=$server_name;dbname=$database_name";
	$connection = new PDO($connection_string, $username, $password);
	return $connection;
}
?>