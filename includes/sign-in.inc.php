<?php require 'db-conn.inc.php'; ?>

<?php

$email = $_POST['email'];
$passwd = $_POST['passwd'];

if(empty($email) || empty($passwd)) {
	header("Location: ../index.php?error=emptyfield&email=".$email."");
	exit();
}

$conn = OpenConn();

$sql = "SELECT * FROM accounts WHERE email=?";

if(!$stmt = $conn->prepare($sql)) {
	header("Location: ../index.php?error=sqlfatalerror");
	exit();
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();


if($row = $result->fetch_assoc()) { // If there's a corresponding email, then check the hashed passwd
	
	$passwd_check = password_verify($passwd, $row['passwd']); // If the passwords match, then login is successful
	
	if($passwd_check) { 
		$stmt->close();
		echo "Success.";
	} 

	else { header("Location: ../index.php?error=invaliduserorpass"); exit(); }

} else { header("Location: ../index.php?error=invaliduserorpass"); exit(); }

CloseConn($conn);