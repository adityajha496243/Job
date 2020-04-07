	<main class="sidebar">

		<section class="left">
			<ul>
				<li><a href="index.php?login=admin&&function=jobs">Jobs</a></li>
				<li><a href="index.php?login=admin&&function=categories">Categories</a></li>

			</ul>
		</section>

		<section class="right">

			<?php

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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

