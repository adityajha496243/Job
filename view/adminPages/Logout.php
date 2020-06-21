<?php
	session_start();
	if (isset($_SESSION["usertype"]) ) {
		session_destroy();
		unset($_SESSION["usertype"]);
		header("location:../index.php?function=login");
	}else{
		session_destroy();
		session_unset($_SESSION['loggedin']);
		header("location:index.php?login=admin&&function=adminLogin");
	}
?>