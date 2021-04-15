<?php
// you can use constnts to define the database connecion parameters. use below if you want to use constants 

/*
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'school');

$conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
if ($conn){
	echo "connection successful";
}else{
	echo "error connecting".mysqli_connect_error();
	
}
** note the above is procedural mysqli and the one used below is object oriented mysqli
*/

$servername = "localhost";
$username = "root";
$password = "";
$database = "hrms";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>
