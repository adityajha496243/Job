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


			<h2>Jobs</h2>

			<a class="new" href="index.php?login=admin&&function=addjob">Add new job</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Title</th>';
			echo '<th style="width: 15%">Salary</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 15%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$stmt = $pdo->query('SELECT * FROM job');

			foreach ($stmt as $job) {
				$applicants = $pdo->prepare('SELECT count(*) as count FROM applicants WHERE jobId = :jobId');

				$applicants->execute(['jobId' => $job['id']]);

				$applicantCount = $applicants->fetch();

				echo '<tr>';
				echo '<td>' . $job['title'] . '</td>';
				echo '<td>' . $job['salary'] . '</td>';
				echo '<td><a style="float: right" href="index.php?login=admin&&function=editjob&&id=' . $job['id'] . '">Edit</a></td>';
				echo '<td><a style="float: right" href="index.php?login=admin&&function=applicants&&id=' . $job['id'] . '">View applicants (' . $applicantCount['count'] . ')</a></td>';
				echo '<td><form method="post" action="index.php?login=admin&&function=deletejob">
				<input type="hidden" name="id" value="' . $job['id'] . '" />
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

