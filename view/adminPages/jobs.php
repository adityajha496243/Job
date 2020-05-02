
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


				<h2>Jobs</h2>

				<a class="new" href="index.php?login=admin&&function=addjob">Add new job</a><br><br>

				<select name="categoryid"  id="categoryid" onchange="fetchByCategory()">
					<option value="">Select Category</option>
					<?php
					$categories = $pdo->query('SELECT * FROM category');
					foreach ($categories as $category) {
						?>		
						<option value=<?php echo $category['id'] ?>><?php echo $category['name'] ?></option>

						<?php
					}
					?>
				</select>

				<select name="location" id="location" onchange="fetchByLocation()">
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


					echo '<table id="myTable">';
					echo '<thead>';
					echo '<tr>';
					echo '<th>Title</th>';
					echo '<th style="width: 15%">Salary</th>';
					echo '<th style="width: 15%">Location</th>';
					echo '<th style="width: 15%">Category</th>';
					echo '<th style="width: 15%">Visiblity</th>';
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
						echo '<td>' . $job['location'] . '</td>';

						$name = $this->obj->getName($job['categoryId']);
						echo '<td>' . $name['name'] . '</td>';

						if($job['visiblity'] == 0){echo '<td>' . "Not Archived" . '</td>';} else{echo '<td>' . "Archived" . '</td>';}
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
					?>

				</div>
				<?php
			}

			else {
				header("Location:index.php?function=login");
			}
			?>


		</section>
	</main>
<script>
	function fetchByCategory(){
		var categoryId = document.getElementById("categoryid").value;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST","../view/adminpages/fetchByCategory.php",true);
     	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    	xmlhttp.onreadystatechange = function() {
     		if (this.readyState == 4 && this.status == 200){
     			// console.log(this.responseText);
     			document.getElementById("tableContainer").innerHTML = this.responseText;
     		}
     	}

     	xmlhttp.send("request="+categoryId);
	}
	function fetchByLocation(){
		var location = document.getElementById("location").value;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST","../view/adminpages/fetchByLocation.php",true);
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

