<?php

//session_start();
include 'dbcon.php';
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$password = $_POST['password'];
	$stmt=$pdo->prepare("SELECT * FROM multiuserlogin WHERE username=:name");
	$stmt->execute(array('name' => $name));

	$row = $stmt->fetch();
	//echo $row['username'];
	if(password_verify($password,$row['password'] )){
		
		session_regenerate_id(true);
		$_SESSION["authorized"]= true;
		$_SESSION['id']= $row['id']; 
		$_SESSION["sess_name"]= $row['username'];
		$_SESSION["sess_password"]= $row['password'];
		$_SESSION["usertype"]= $row['usertype'];
		session_write_close();
		if ($row['usertype']=="admin") {
			//$_SESSION['loggedin'] = true;
			header("Location:../../admin/index.php?login=admin&&function=categories");
		}
		else{
			//echo "world hello";
			header("Location:../../admin/index.php?login=admin&&function=jobs");
		}
		
	}else{
		header("Location:../../admin/index.php?function=login");
	}
}
else{
	echo"Something went wrong.";
}


?>