<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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

		$sql = "SELECT * FROM accounts WHERE username = '$user'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    echo 'UserName is taken, <a href="signup.php">try again</a>';
		} else {
	    	$sql = "INSERT INTO accounts (username, coins, password) VALUES ('$user', 100, '$pass')";
	    	if ($conn->query($sql) === TRUE) {
	    		
	    		echo 'New record created successfully<br><a href="home.php">Home</a>';
			} else {
	    		echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} 
	}
	$conn->close();

?>

</body>
</html>