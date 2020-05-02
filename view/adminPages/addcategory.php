	<main class="sidebar">

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
			<div id="right_message"></div>
			<?php

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


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