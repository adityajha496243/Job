<main class="sidebar">

	<section class="right">

		
		<ul class="listing">

			<?php 
			echo "<h1>Jobs</h1>";

			$stmt = $pdo->prepare("SELECT * FROM job WHERE closingDate > :date ORDER BY closingDate ASC");
			$date = new DateTime();
			$values = [
				'date' => $date->format('Y-m-d')
			];
			$stmt->execute($values);

			foreach ($stmt as $job) {
				if($job['visiblity'] == 0){
					echo '<li>';

					echo '<div class="details">';
					echo '<h2>' . $job['title'] . '</h2>';
					echo '<h3>' . $job['salary'] . '</h3>';
					echo '<p>' . nl2br($job['description']) . '</p>';
					if(isset($_GET["login"]) && $_GET["login"]=="admin"){

						echo '<a class="more" href="index.php?login=admin&&function=apply&&id=' . $job['id'] . '">Apply for this job</a>';
					}else{
						echo '<a class="more" href="index.php?function=apply&&id=' . $job['id'] . '">Apply for this job</a>';

					}

					echo '</div>';
					echo '</li>';
				}
			}

			?>
		</ul>

	</section>
</main>