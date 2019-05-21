<?php
	session_start();
	if($_SESSION["user"] == ""){
        echo '<h1>You must be logged in. </h1><br><a href="../html/login.html">Log In</a>';
		
    } else {
		include 'functions.php';
		$amt = $_POST["amountToBuy"];
		
        $user = $_SESSION["user"];
		
        $servername = "mars.cs.qc.cuny.edu";
        $username = "kiye0230";
        $password = "23550230";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
    
            $db_selected = mysqli_select_db($conn, 'kiye0230');
            if (!$db_selected) {
                die ('Can\'t use DB : ' . mysql_error());
            } else{
                //here good
                 
                $sql = "SELECT coins FROM accounts WHERE username = '$user';";
                $result =  $conn->query($sql);
				
				if(!$result) {
					echo 'Could not run query: ' . mysql_error();
					exit;
				}
				
				$row=$result->fetch_assoc();
                $userbank = (int) $row['coins'];
				
				$total = $userbank + $amt;
				
				$sql = "UPDATE accounts SET coins = $total WHERE username = '$user';";
                $conn->query($sql);
				
				$sql = "INSERT INTO transactions(id, sender, receiver, amount) VALUES (DEFAULT, 'QCOIN', '$user', $amt);";
                $conn->query($sql);
				
				echo '<p>Transaction completed.</p><a href="../html/buysell.html">Click to return to the Buy/Sell page.</a>';
                
             
          
				//here good                    
            }
        }
    }    
        



?>