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

				if (!isset($_POST['submit'])){

					?>


					<h2>Add Job</h2>

					<form action="" method="POST"">
						<label>Title</label>
						<input type="text" name="title" />

						<label>Description</label>
						<textarea name="description"></textarea>

						<label>Salary</label>
						<input type="text" name="salary" />

						<label>Location</label>
						<input type="text" name="location" />

						<label>Category</label>

						<select name="categoryId">
							<?php
							$stmt = $pdo->prepare('SELECT * FROM category');
							$stmt->execute();

							foreach ($stmt as $row) {
								echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
							}

							?>

						</select>

						<label>Closing Date</label>
						<input type="date" name="closingDate" />

						<input type="submit" name="submit" value="Add" />

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

