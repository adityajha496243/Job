<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$stmt = $pdo->prepare('DELETE FROM enquiry WHERE id = :id');
	$stmt->execute(['id' => $_POST['id']]);


	header('location: index.php?login=admin&&function=enquiry');
}


