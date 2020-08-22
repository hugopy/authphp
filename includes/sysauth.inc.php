<?php session_start() ?>
<?php require 'db-conn.inc.php' ?>


<?php if(isset($_POST['user']) && isset($_POST['passwd']) && $_POST['user'] !== "" && $_POST['passwd'] !== "") {

	$conn = OpenConn();

	$sql = "SELECT * FROM sysadmin";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();


	if(password_verify($_POST['user'], $row['user']) && password_verify($_POST['passwd'], $row['passwd'])) {
		echo "Success";
	} else { header("Location: ../sysadmin.php?error=error"); }

	CloseConn($conn);

} else {
	header("Location: ../index.php");
	exit();
}