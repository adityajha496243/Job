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
					<li><a href="index.php?login=admin&&function=manageUser">Manage User</a></li>
					<li><a href="index.php?login=admin&&function=categories">Categories</a></li>
					<li><a href="index.php?login=admin&&function=jobs">Jobs</a></li>
					<li><a href="index.php?login=admin&&function=recycle">Recycled Jobs</a></li>
					<li><a href="index.php?login=admin&&function=enquiry">Enquries</a></li>

				</ul>
			</section>

			<section class="right">
				<h2>You are now logged in</h2>
			</section>
			<?php
		}

		else {
			?>
			<main class="sidebar">
				<h2>Log in</h2>

				<form action="index.php?login=admin&&function=adminLogin" method="post" style="padding: 40px">

					<label>Enter Password</label>
					<input type="password" name="password" />

					<input type="submit" name="submit" value="Log In" />
				</form>
			</main>
			<?php	
		}
		?>


	</main>