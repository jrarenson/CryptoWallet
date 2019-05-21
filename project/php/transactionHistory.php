<?php
	session_start();

    $user = $_SESSION["user"];
    $servername = "mars.cs.qc.cuny.edu";
    $username = "kiye0230";
    $password = "23550230";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $username);

    // Check connection
    if (!$conn->connect_error) {

        $sql = "SELECT * FROM transactions WHERE (sender = '$user') OR (receiver = '$user') ORDER BY id DESC LIMIT 10";
                $result = $conn->query($sql);
                //check
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo $row["sender"]. '*' . $row["receiver"] . '*' . $row["amount"] . '^';
                    }
                } else {
                    echo 'No transactions';
                }                    
    }
?>