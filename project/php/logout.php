<?php
	session_start();
	$_SESSION["user"] = "";
	$_SESSION["loggedin"] = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>You are now logged out, <a href="home.php">Click</a> to return to the homepage</h3>

</body>
</html>