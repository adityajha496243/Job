<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "client" || $_SESSION["usertype"] == "admin") {

	$stmt = $pdo->prepare('DELETE FROM enquiry WHERE id = :id');
	$stmt->execute(['id' => $_POST['id']]);


	header('location: index.php?login=admin&&function=enquiry');
}


