<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_errno);
        exit();
    }

    $username = $_POST["username"];
    $message = $_POST["message"];

    // Check if message is not empty
    if (!empty($message)){
        $query = "SELECT * FROM Users WHERE user_id = $username" ;

        // Username exists
        $result = mysqli_query($mysqli, "SELECT * FROM Users WHERE user_id='$username';");
        if (mysqli_num_rows($result)){
            // Create post
            $post = "INSERT INTO Posts (content,author_id) VALUES ('$message','$username')";
            if ($mysqli->query($post) === TRUE) {
                echo "New record created successfully";
            }
            else {
                echo "Error";
            }
        }

        // Invalid username
        else {
            echo "Username doesn't exist";
        }

    }
    else
    {
        echo "Empty message";
    }


    /* close connection */
    $mysqli->close();

?>
