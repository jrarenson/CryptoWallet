<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	$user = $_POST["username"];
	$pass = $_POST["password"];

	$servername = "mars.cs.qc.cuny.edu";
	$username = "geau6127";
	$password = "23096127";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	$db_selected = mysqli_select_db($conn, 'geau6127');
	if (!$db_selected) {
    	die ('Can\'t use DB : ' . mysql_error());
	}
	else{
		$sql = "SELECT * FROM accounts WHERE username = '$user' && password = '$pass'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    $_SESSION["user"] = $user;
			$_SESSION["loggedin"] = 1;
			echo '<a href="home.php">Login as ', $_SESSION["user"], '</a>';
		} else {
	    	echo 'Not a valid account, please <a href="../html/login.html">try again</a>';
		} 
	}
	$conn->close();
?>
	
</body>
</html>