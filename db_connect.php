<?php

// Enter correct details below ...
$servername = "localhost";
$username = "csucleed_student02";
$password = "!Knife%Yellow26";
$dbname = "csucleed_student02";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
	echo "<p>Database connected at ";
	echo date('H:i, jS F Y');
	echo "</p>";
}

?>