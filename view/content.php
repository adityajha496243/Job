<main class="sidebar">

	<section class="left">
		<ul>
			<?php
			if(isset($_GET["login"]) && $_GET["login"]=="admin"){
				?>
				<li  class="current" ><a href="index.php?login=admin&&function=IT">IT</a></li>
				<li><a href="index.php?login=admin&&function=HumanResources">Human Resources</a></li>
				<li><a href="index.php?login=admin&&function=Sales">Sales</a></li>
				<?php
			}else{
				?>
				<li  class="current" ><a href="index.php?function=IT">IT</a></li>
				<li><a href="index.php?function=HumanResources">Human Resources</a></li>
				<li><a href="index.php?function=Sales">Sales</a></li>
				<?php
			}
			?>
		</ul>
	</section>

	<section class="right">

		
		<ul class="listing">

			<?php 
			echo "<h1>".$name['name'] .' '."Jobs</h1>";

			foreach ($arr as $job) {
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