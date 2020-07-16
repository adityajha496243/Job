<?php
include 'dbcon.php';
$username = $_POST['name'];
$password = $_POST['password']; //entered password by the user
$hpassword = password_hash($password, PASSWORD_DEFAULT); //saving as hashed
$stmt=$pdo->prepare("INSERT INTO multiuserlogin (username, password, usertype) VALUES ('$username', '$hpassword', 'client')");
$stmt->execute();
header("location:../../index.php?function=login");

?>
