	<main class="sidebar">

		<?php include('sidebar.php'); ?>

		<section class="right">
			<div id="right_message"></div>

			<?php

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {

				if (!isset($_POST['submit'])) {
					$currentCategory = $pdo->query('SELECT * FROM category WHERE id = ' . $_GET['id'])->fetch();
					?>


					<h2>Edit Category</h2>

					<form action="" method="POST">

						<input type="hidden" name="id" value="<?php echo $currentCategory['id']; ?>" />
						<label>Name</label>
						<input type="text" name="name" value="<?php echo $currentCategory['name']; ?>" />


						<input type="submit" name="submit" value="Save Category" />

					</form>
					<?php


				}
			}

			else {
				header("Location:index.php?function=login");
			}

			?>


		</section>
	</main>
