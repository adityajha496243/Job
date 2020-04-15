	<main class="sidebar">
		<section class="left">
			<ul>
				<li><a href="index.php?login=admin&&function=manageAdmin">Admin</a></li>
				<li><a href="index.php?login=admin&&function=jobs">Jobs</a></li>
				<li><a href="index.php?login=admin&&function=categories">Categories</a></li>

			</ul>
		</section>

		<section class="right">

			<?php


			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				?>


				<h2>Users</h2>

				<a class="new" href="index.php?login=admin&&function=register">Add Admin</a><br><br>
				
				<div id="tableContainer">

					
					<?php
					echo '<table>';
					echo '<thead>';
					echo '<tr>';
					echo '<th>Name</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
					echo '</tr>';

					$multiusers = $pdo->query('SELECT * FROM multiuserlogin');

					foreach ($multiusers as $multiuser) {
						echo '<tr>';
						echo '<td>' . $multiuser['username'] . '</td>';
						echo '<td><form method="post" action="index.php?login=admin&&function=deleteAdmin">
						<input type="hidden" name="id" value="' . $multiuser['id'] . '" />
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


