<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {

	$attendBy = $_SESSION["sess_name"];
	$stmt = $pdo->prepare('UPDATE enquiry SET status=1 WHERE id = :id'); //&& attendBy= "$attendBy"
	$stmt->execute(['id' => $_POST['id']]);


	header('location: index.php?login=admin&&function=enquiry');
}



