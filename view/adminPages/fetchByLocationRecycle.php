<?php 
include_once'dbcon.php';
if(isset($_POST['requests'])){
	echo '<table id="myTable">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Title</th>';
	echo '<th style="width: 15%">Salary</th>';
	echo '<th style="width: 15%">Location</th>';
	echo '<th style="width: 15%">Category</th>';
	echo '<th style="width: 5%">&nbsp;</th>';
	echo '<th style="width: 15%">&nbsp;</th>';
	echo '<th style="width: 5%">&nbsp;</th>';
	echo '<th style="width: 5%">&nbsp;</th>';
	echo '</tr>';

	
	if(empty($_POST['requests'])){
		$request="";
	}
	else{
		$request="=";
	}
	//print_r($request);

	$stmt = $pdo->query("SELECT * FROM job WHERE visiblity = 1 && location $request '".$_POST['requests']."'");
	foreach ($stmt as $job) {
		$applicants = $pdo->prepare('SELECT count(*) as count FROM applicants WHERE jobId = :jobId');

		$applicants->execute(['jobId' => $job['id']]);

		$applicantCount = $applicants->fetch();

		echo '<tr>';
		echo '<td>' . $job['title'] . '</td>';
		echo '<td>' . $job['salary'] . '</td>';
		echo '<td>' . $job['location'] . '</td>';


		$query = $pdo->prepare("SELECT name FROM category where id=".$job['categoryId']);
		$query->execute();
		$name = $query->fetch();
		echo '<td>' . $name['name'] . '</td>';

		echo '<td><form method="post" action="index.php?login=admin&&function=jobRestore">
		<input type="hidden" name="id" value="' . $job['id'] . '" />
		<input type="submit" name="submit" value="Restore" />
		</form></td>';
		echo '</tr>';

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
	//print_r($_POST);
}

?>