<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION["user"], '\'s Wallet'; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
</head>
<body>
<div class="container">
	<a class="btn btn-primary" href="home.php"><h3>Home</h3></a>
</div>
<div class="container">
	<?php
		if($_SESSION["user"] == ""){
			echo '<h1>You must be logged in. </h1><br><a href="../html/login.html">LogIn</a>';
		}
		else{

			$user = $_SESSION["user"];
			$servername = "mars.cs.qc.cuny.edu";
			$username = "geau6127";
			$password = "23096127";

			// Create connection
			$conn = new mysqli($servername, $username, $password);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} else {
		
				$db_selected = mysqli_select_db($conn, 'geau6127');
				if (!$db_selected) {
			    	die ('Can\'t use DB : ' . mysql_error());
				} else{
					
					$sql = "SELECT coins FROM accounts WHERE username = '$user'";
					$result = $conn->query($sql);
					//echo $result;
					if ($result->num_rows > 0) {
						$result = $result->fetch_assoc();
					    echo '<h1>', $_SESSION["user"], '\'s balance is: ', $result["coins"], ' QCoins</h1>';
					} else {
				    	echo "Error";
					}
				}
			}
			$conn->close();
		}
	?>
</div>
</body>
</html>