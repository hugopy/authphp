<?php require 'header.php' ?>

<style>



	.form-container {
		margin: auto;
		width: 25%;
		background: #EDEDED;
		padding: 12px;
		display: flex;
		flex-direction: column;
		align-items: center;
	}


	#main form {
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	#main form input {
		margin-top: 5px;
		font-size: 25px;
		line-height: 25px;
		width: 80%;
	}

	#main form input[type="submit"] {
		width: 25%;
	}

</style>

<section id="main">
	<div class="form-container">
		<h2>Sign Up</h2>
		<form action="includes/sign-up.inc.php" method="post">
			<label for="name">Name:</label>
			<input type="text" name="name">
			<label for="name">Surname:</label>
			<input type="text" name="surname">
			<label for="name">Email:</label>
			<input type="email" name="email">
			<label for="name">Password:</label>
			<input type="password" name="passwd">
			<label for="name">Re-enter password:</label>
			<input type="password" name="passwd-check">
			<input type="submit" name="signup-submit">
		</form>
	</div>
</section>

<?php require 'footer.php' ?>