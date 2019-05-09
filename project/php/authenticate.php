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
	include 'functions.php';
	$user = $_POST["username"];
	$pass = $_POST["password"];
	if (islegit($user) && islegit($pass)) {
	$servername = "mars.cs.qc.cuny.edu";
	$username = "kiye0230"; // your venus login
	$password = "23550230"; // your venus password

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	$db_selected = mysqli_select_db($conn, 'kiye0230');//Venus username
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
			//echo '<a href="../html/home.html">Login as ', $_SESSION["user"], '</a>';
			header('Location: ../html/home.html');
		} else {
			//echo 'Not a valid account, please <a href="../html/login.html">try again</a>';
			header('Location: ../html/rejected.html');
		} 
	}
	$conn->close();
} else {
	//echo 'Yo u trying to hack us';
	header('Location: ../html/rejected.html');
}	
?>
	
</body>
</html>