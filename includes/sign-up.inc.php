<?php require 'db-conn.inc.php' ?>

<?php 

if(!isset($_POST["signup-submit"])) {
	header("Location: ../index.php");
} else {

$conn = OpenConn();


$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$passwd_check = $_POST['passwd-check'];


// Checks if input is valid.
// If any of the fields is empty, return error
// If email is not valid, return error
// If passwords won't match, return error

if(empty($name) || empty($surname) || empty($email) || empty($passwd) || empty($passwd_check)) {
	header("Location: ../signup.php?error=emptyfield&name=".$name."&surname=".$surname."&email=".$email."");
	exit();

} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: ../signup.php?error=invalidmail&name=".$name."&surname=".$surname."");
	exit();

} else if($passwd !== $passwd_check) {
	header("Location: ../signup.php?error=passwdnomatch&name=".$name."&surname=".$surname."&email=".$email."");
	exit();



// This section checks if the inserted email already exists in database

} else {

	$sql = "SELECT email FROM accounts WHERE email=?";

	if(!$stmt = $conn->prepare($sql)) {
		header("Location: ../signup.php?error=fatalerror");
	} else {
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$result = $stmt->num_rows();

		if($result > 0) {
			header("Location: ../signup.php?error=emailexists&name=".$name."&surname=".$surname."");
			exit();

		} else {
			$stmt->close();
			// Well, if everything is right, then proceed to signup.
		}
	}

}

$sql = "INSERT INTO accounts (name, surname, email, passwd) VALUES (?, ?, ?, ?)";


if(!$stmt = $conn->prepare($sql)) {
	header("Location: ../signup.php?error=sqlfatalerror");
} else {

	$hash_passwd = password_hash($passwd, PASSWORD_DEFAULT);

	$stmt->bind_param("ssss", $name, $surname, $email, $hash_passwd);
	$stmt->execute();
	$stmt->close();
	header("Location: ../signup.php?signup=success");
	
}

CloseConn($conn);

}

?>




