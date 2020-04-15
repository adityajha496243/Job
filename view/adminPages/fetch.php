<?php 
include_once'dbcon.php';
if(isset($_POST['request'])){
	echo '<table id="myTable">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Title</th>';
	echo '<th style="width: 15%">Salary</th>';
	echo '<th style="width: 15%">Category</th>';
	echo '<th style="width: 15%">Visiblity</th>';
	echo '<th style="width: 5%">&nbsp;</th>';
	echo '<th style="width: 15%">&nbsp;</th>';
	echo '<th style="width: 5%">&nbsp;</th>';
	echo '<th style="width: 5%">&nbsp;</th>';
	echo '</tr>';

	
	if(empty($_POST['request'])){
		$request="";
	}
	else{
		$request=" = ".$_POST['request'];
	}
	$stmt = $pdo->query('SELECT * FROM job where categoryId'.$request);
	foreach ($stmt as $job) {
		$applicants = $pdo->prepare('SELECT count(*) as count FROM applicants WHERE jobId = :jobId');

		$applicants->execute(['jobId' => $job['id']]);

		$applicantCount = $applicants->fetch();

		echo '<tr>';
		echo '<td>' . $job['title'] . '</td>';
		echo '<td>' . $job['salary'] . '</td>';
		$query = $pdo->prepare("SELECT name FROM category where id=".$job['categoryId']);
		$query->execute();
		$name = $query->fetch();
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
}else{
	echo "opps! something went really wrong";
}

?>