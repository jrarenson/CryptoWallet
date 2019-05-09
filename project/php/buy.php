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
	if($_SESSION["user"] == ""){
		echo '<h1>You must be logged in to buy QCoins</h1><br><a href="../html/login.html">LogIn</a>';
	}
	else{
		$servername = "mars.cs.qc.cuny.edu";
		$username = "kiye0230"; // your venus login
		$password = "23550230"; // your venus password

		// Create connection
		$conn = new mysqli($servername, $username, $password);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {
		
			$db_selected = mysqli_select_db($conn, 'kiye0230');// your venus login
			if (!$db_selected) {
		    	die ('Can\'t use DB : ' . mysql_error());
			} else{
				$sql = "SELECT coins FROM accounts WHERE username = '$user'";
				$result = $conn->query($sql);
				echo $result;
				if ($result->num_rows > 0) {
				    echo '<h1>', $_SESSION["user"], '\'s balance is: ', $result, ' QCoins</h1>';
				} else {
			    	echo "Error";
				}
			}
		}
	}
	$conn->close();	
?>
</body>
</html>
