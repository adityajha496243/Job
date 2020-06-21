	<main class="sidebar">

		<?php include('sidebar.php'); ?>

		<section class="right">
			<div id="right_message"></div>

			<?php

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {

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

