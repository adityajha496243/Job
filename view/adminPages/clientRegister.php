<main class="sidebar">

	<h2>Registation</h2>

	<form action="../view/adminPages/clientRegisterProcess.php" method="post">

		<label>Username</label>
		<input type="text" class="input" name="name" required>

		<label>Enter Password</label>
		<input type="password" class="input" name="password" required>

		<input type="submit" value="Register" name="submit">

		<label><a href="index.php?function=login">Already have an account ?</a></label>
		
	</form>

</main>