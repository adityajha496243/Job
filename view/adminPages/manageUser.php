	<main class="sidebar">
		
		<?php include('sidebar.php'); ?>

		<section class="right">

			<?php


			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {
				?>


				<h2>Users</h2>

				<a class="new" href="index.php?login=admin&&function=register">Add User</a><br><br>
				
				<div id="tableContainer">

					
					<?php
					echo '<table>';
					echo '<thead>';
					echo '<tr>';
					echo '<th>Name</th>';
					echo '<th>Type</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
					echo '</tr>';

					$multiusers = $pdo->query('SELECT * FROM multiuserlogin');

					foreach ($multiusers as $multiuser) {
						echo '<tr>';
						echo '<td>' . $multiuser['username'] . '</td>';
						echo '<td>' . $multiuser['usertype'] . '</td>';
						echo '<td><a style="float: right" href="index.php?login=admin&&function=editUser&&id=' . $multiuser['id'] . '">Edit</a></td>';
						echo '<td><form method="post" action="index.php?login=admin&&function=deleteUser">
						<input type="hidden" name="id" value="' . $multiuser['id'] . '" />
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


