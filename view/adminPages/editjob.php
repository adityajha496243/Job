	<main class="sidebar">

		<?php include('sidebar.php'); ?>

		<section class="right">
			<div id="right_message"></div>

			<?php


			if (!isset($_POST['submit'])) {
				if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {

					$stmt = $pdo->prepare('SELECT * FROM job WHERE id = :id');

					$stmt->execute(array("id"=>$_GET['id']));

					$job = $stmt->fetch();
					?>

					<h2>Edit Job</h2>

					<form action="" method="POST">

						<input type="hidden" name="id" value="<?php echo $job['id']; ?>" />
						<label>Title</label>
						<input type="text" name="title" value="<?php echo $job['title']; ?>" />

						<label>Description</label>
						<textarea name="description"><?php echo $job['description']; ?></textarea>

						<label>Location</label>
						<input type="text" name="location" value="<?php echo $job['location']; ?>" />


						<label>Salary</label>
						<input type="text" name="salary" value="<?php echo $job['salary']; ?>" />

						<label>Category</label>

						<select name="categoryId">
							<?php
							$stmt = $pdo->prepare('SELECT * FROM category');
							$stmt->execute();

							foreach ($stmt as $row) {
								if ($job['categoryId'] == $row['id']) {
									echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
								}
								else {
									echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
								}

							}

							?>

						</select>

						<label>Closing Date</label>
						<input type="date" name="closingDate" value="<?php echo $job['closingDate']; ?>"  />
						

						<input type="submit" name="submit" value="Save" />

					</form>

					<?php
				}

				else {
					header("Location:index.php?function=login");
				}

			}
			?>

		</section>
	</main>

