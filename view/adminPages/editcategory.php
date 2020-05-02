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
