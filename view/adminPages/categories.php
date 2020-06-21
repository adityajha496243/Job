	<main class="sidebar">

		<?php include('sidebar.php'); ?>

		<section class="right">

			<?php

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {
				?>


				<h2>Categories</h2>

				<a class="new" href="index.php?login=admin&&function=addcategory">Add new category</a>

				<?php
				echo '<table>';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Name</th>';
				echo '<th style="width: 5%">&nbsp;</th>';
				echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';

				$categories = $pdo->query('SELECT * FROM category');

				foreach ($categories as $category) {
					echo '<tr>';
					echo '<td>' . $category['name'] . '</td>';
					echo '<td><a style="float: right" href="index.php?login=admin&&function=editcategory&&id=' . $category['id'] . '">Edit</a></td>';
					echo '<td><form method="post" action="index.php?login=admin&&function=deletecategory">
					<input type="hidden" name="id" value="' . $category['id'] . '" />
					<input type="submit" name="submit" value="Delete" />
					</form></td>';
					echo '</tr>';
				}

				echo '</thead>';
				echo '</table>';

			}

			else {
				header("Location:index.php?function=login");
			}
			?>

		</section>
	</main>

