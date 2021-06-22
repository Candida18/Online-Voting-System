<?php
	$conn = new mysqli('localhost', 'root', '', 'votesystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>