<?php
$mysqli = new mysqli("remotemysql.com", "BuYLnm8fmi", "byEsTIfXUu", "BuYLnm8fmi");

if(mysqli -> connect_errno) {
	echo "Failed to Connect to MySQL: " .$mysqli -> connect_error;
	exit();
} else {
	echo "Wahoo! Your database is connected";
}

?>
