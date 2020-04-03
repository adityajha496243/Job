<main class="sidebar">

	<section class="left">
		<ul>
			<li  class="current" ><a href="index.php?function=it">IT</a></li>
			<li><a href="index.php?function=hr">Human Resources</a></li>
			<li><a href="index.php?function=sales">Sales</a></li>
		</ul>
	</section>

	<section class="right">

		
		<ul class="listing">

			<?php 
			echo "<h1>".$name['name'] .' '."Jobs</h1>";

			foreach ($arr as $job) {
				echo '<li>';

				echo '<div class="details">';
				echo '<h2>' . $job['title'] . '</h2>';
				echo '<h3>' . $job['salary'] . '</h3>';
				echo '<p>' . nl2br($job['description']) . '</p>';

				echo '<a class="more" href="index.php?function=apply&&id=' . $job['id'] . '">Apply for this job</a>';

				echo '</div>';
				echo '</li>';
			}

			?>
		</ul>

	</section>
</main>