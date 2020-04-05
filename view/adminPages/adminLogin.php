	<main class="sidebar">



		<?php
		if (isset($_POST['submit'])) {
			if ($_POST['password'] == 'letmein') {
				$_SESSION['loggedin'] = true;
			}
		}


		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			?>

			<section class="left">
				<ul>
					<li><a href="jobs.php">Jobs</a></li>
					<li><a href="index.php?login=admin&&function=categories">Categories</a></li>

				</ul>
			</section>

			<section class="right">
				<h2>You are now logged in</h2>
			</section>
			<?php
		}

		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post" style="padding: 40px">

				<label>Enter Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
			<?php
		}
		?>


	</main>