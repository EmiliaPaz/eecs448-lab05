<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");

    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $username = $_POST["username"];
    $query = "SELECT * FROM Users WHERE user_id = $username" ;

    if ($result = $mysqli->query($query)) {

        /* fetch associative array */
        if ($row = $result->fetch_assoc()) {
            // tell the user its not valid, and stay there
            echo "Username already exists" ;
        }
        else {
            // create entry
            $entry = "INSERT INTO Users(user_id) VALUES ('$username')";
        }

        if ($mysqli->query($entry) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " ;
        }

        /* free result set */
        $result->free();
    }

    /* close connection */
    $mysqli->close();

?>
