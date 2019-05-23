<?php
	session_start();
	$_SESSION["user"] = "";
	$_SESSION["loggedin"] = 0;
	header('Location: ../html/home.html');
?>