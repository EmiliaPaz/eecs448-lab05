<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_errno);
        exit();
    }

    $username = $_POST["username"];
    $query = "SELECT * FROM Users WHERE user_id = $username" ;

    // User already exists
    $result = mysqli_query($mysqli, "SELECT * FROM Users WHERE user_id='$username';");

    if (mysqli_num_rows($result)>0){
        echo "Username already exists" ;
    }

    // Create user
    else{
        $entry = "INSERT INTO Users (user_id) VALUES ('$username')";
        if ($mysqli->query($entry) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error" ;
        }
    }

    /* close connection */
    $mysqli->close();

?>
