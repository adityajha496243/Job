	<main class="sidebar">

		<section class="left">
			<ul>
				<li><a href="index.php?login=admin&&function=manageAdmin">Admin</a></li>
				<li><a href="jobs.php">Jobs</a></li>
				<li><a href="categories.php">Categories</a></li>

			</ul>
		</section>

		<section class="right">

			<?php

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


				if (isset($_POST['submit'])) {

					$stmt = $pdo->prepare('INSERT INTO category (name) VALUES (:name)');

					$criteria = [
						'name' => $_POST['name']
					];

					$stmt->execute($criteria);
					echo 'Category added';
				}
				else {
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