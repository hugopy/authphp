<?php require 'header.php' ?>


<section id="login">


<form action="includes/sysauth.inc.php" method="post">
	<label for="user">User:</label>
	<input type="password" name="user">
	<label for="passwd">Pwd:</label>
	<input type="password" name="passwd">
	<input type="submit">
</form>

</section>

<?php require 'footer.php' ?>