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

			<?php

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				?>


				<h2>Enquries</h2>

				<?php
				echo '<table>';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Name</th>';
				echo '<th>Email</th>';
				echo '<th>Phone</th>';
				echo '<th>Detail</th>';
				echo '<th>Attended By</th>';
				echo '<th>Status</th>';
				echo '<th style="width: 5%">&nbsp;</th>';
				echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';

				$enquiry = $pdo->query('SELECT * FROM enquiry');

				foreach ($enquiry as $enquiry) {
					echo '<tr>';
					echo '<td>' . $enquiry['name'] . '</td>';
					echo '<td>' . $enquiry['email'] . '</td>';
					echo '<td>' . $enquiry['phone'] . '</td>';
					echo '<td>' . $enquiry['details'] . '</td>';
					echo '<td>' . 'Ram' . '</td>';
					if($enquiry['status'] == 0){
						echo '<td>' . 'Not Completed' . '</td>';
					}else{
						echo '<td>' . 'Completed' . '</td>';
					}
					
					if($enquiry['status'] == 0){
						echo '<td><form method="post" action="index.php?login=admin&&function=enquirystatus">
						<input type="hidden" name="id" value="' . $enquiry['id'] . '" />
						<input type="submit" name="submit" value="Complete" />
						</form></td>';
						echo '</tr>';
					}

					echo '<td><form method="post" action="index.php?login=admin&&function=deleteenquiry">
					<input type="hidden" name="id" value="' . $enquiry['id'] . '" />
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

