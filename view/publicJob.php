<main class="sidebar">

	<section class="right">

		
		<ul class="listing">

			<?php 
			echo "<h1>Jobs</h1>";
			?>

			<label>Select with Location: </label>
			<select name="location" id="location" onchange="fetchByLocationPublicJob()">
				<option>Select Location</option>
				<?php
				$stmt = $pdo->query('SELECT DISTINCT location FROM job');
				foreach ($stmt as $job) {
					?>		
					<option value=<?php echo $job['location'] ?>><?php echo $job['location'] ?></option>

					<?php
				}
				?>
			</select><br>

			<div id="tableContainer">
				<?php 
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
			</div>
		</ul>

	</section>
</main>

<script>
	function fetchByLocationPublicJob(){
		var location = document.getElementById("location").value;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST","view/fetchByLocationPublicJob.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
     			//console.log(this.responseText);
     			document.getElementById("tableContainer").innerHTML = this.responseText;
     		}
     	}

     	xmlhttp.send("requests="+location);
     }
 </script>