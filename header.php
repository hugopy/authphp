<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Website</title>
</head>
<body>

	<header>
		<div class="container">
			<div class="logo"><h1>Website</h1></div>

			<a href="signup.php">Sign Up</a>

			<?php if(!isset($_SESSION['id'])) ?>
			<form action="includes/sign-in.inc.php" method="post">
				<input type="text" name="email" placeholder="Email:">
				<input type="password" name="passwd" placeholder="Password:">
				<input type="submit" name="signin-submit">
			</form>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php">About</a></li>
					<li><a href="index.php">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>
