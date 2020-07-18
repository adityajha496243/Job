<?php 
include_once'adminPages/dbcon.php';
if(isset($_POST['requests'])){
	
	if(empty($_POST['requests'])){
		$request="";
	}
	else{
		$request="=";
	}



	$stmt = $pdo->prepare("SELECT * FROM job WHERE location = :location AND closingDate > :date ORDER BY closingDate ASC");

	//print_r($stmt);
	//exit();

	$date = new DateTime();

	$values = [
		'location' => $_POST['requests'],
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
}

?>