<?php 
session_start();

if(isset($_SESSION['password']) && isset($_SESSION['username'])) {
	unset($_SESSION['password']);
	unset($_SESSION['username']);
	session_destroy();
	header('location:login.php');
}
?>