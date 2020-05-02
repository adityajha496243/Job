<main class="sidebar">

	<h2>Registation</h2>

	<form action="../view/adminPages/adminRegisterProcess.php" method="post">

		<label>Select user type:</label> 
		<select name="usertype">
			<option value="admin">admin</option>
			<option value="client">client</option>
		</select>

		<label>Username</label>
		<input type="text" class="input" name="name" required>

		<label>Enter Password</label>
		<input type="password" class="input" name="password" required>

		<input type="submit" value="Register" name="submit">
	</form>

</main>