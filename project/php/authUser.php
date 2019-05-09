<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
	//if (islegit($user) && islegit($pass)) {echo 'cleantestPASS';} else {echo 'cleantestFAIL';}
	talk();

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	$db_selected = mysqli_select_db($conn, 'kiye0230'); // your venus login
	if (!$db_selected) {
    	die ('Can\'t use DB : ' . mysql_error());
	}
	else{

		$sql = "SELECT * FROM accounts WHERE username = '$user'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    echo 'UserName is taken, <a href="../html/signup.html">try again</a>';
		} else {
	    	$sql = "INSERT INTO accounts (username, coins, password) VALUES ('$user', 100, '$pass')";
	    	if ($conn->query($sql) === TRUE) {
	    		
	    		echo 'New record created successfully<br><a href="../html/home.html">Click to return to home</a>';
			} else {
	    		echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} 
	}
	$conn->close();
  } else {
	 //echo 'Account not entered. Please do not include slashes and html tags in username.';
	 header('Location: ../html/rejected.html');
 }	 
?>

</body>
</html>