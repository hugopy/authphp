<?php

mysqli_report(MYSQLI_REPORT_STRICT); // Throws mysqli_sql_exception exceptions intead of warnings

function OpenConn() {

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "@Kate2019";
	$db 	= "MiriamDecor";

	try {
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	} catch (Exception $e) {
		echo "ERROR: failed to connect to the server. Try again later.";
		exit();
	}

	return $conn;

}

function CloseConn($conn) {

	mysqli_close($conn);

}
