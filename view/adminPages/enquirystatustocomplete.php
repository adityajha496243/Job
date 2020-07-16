<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {

	if (!isset($_SESSION)) {
		session_start();
		$attendBy = $_SESSION['id'];
		print_r($attendBy);
	}
	else{
		$attendBy = $_SESSION['id'];
		print_r($attendBy);
	}

	$stmt = $pdo->prepare('UPDATE enquiry SET status=1,attendBy = :attendBy WHERE id = :id'); 
	$stmt->execute(["attendBy"=>$attendBy,'id' => $_POST['id']]);


	header('location: index.php?login=admin&&function=enquiry');
}



