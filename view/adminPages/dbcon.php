<?php
$pdo = new PDO('mysql:dbname=job;host=127.0.0.1', 'root', '' , [PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);

if (!isset($_SESSION)) {
	session_start();
}
?>