	<main class="sidebar">

		<?php include('sidebar.php'); ?>

		<section class="right">
			<div id="right_message"></div>
			<?php

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {


				if (!isset($_POST['submit'])) {
					?>


					<h2>Add Category</h2>

					<form action="" method="POST">
						<label>Name</label>
						<input type="text" name="name" />


						<input type="submit" name="submit" value="Add Category" />

					</form>


					<?php
				}



			}
			else {
				?>
				<h2>Log in</h2>

				<form action="index.php" method="post">
					<label>Password</label>
					<input type="password" name="password" />

					<input type="submit" name="submit" value="Log In" />
				</form>
				<?php
			}
			?>


		</section>
	</main>