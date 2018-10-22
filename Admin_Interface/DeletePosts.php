<!DOCTYPE html>

<html>
	<head>
		<title>  Delete Posts result </title>
	</head>

	<body>
        <h2> Delete Posts result </h2>
         <?php
             $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");
             /* check connection */
             if ($mysqli->connect_errno) {
                 printf("Connect failed: %s\n", $mysqli->connect_errno);
                 exit();
             }

             // Loop through each item in the check_list
             foreach($_POST['check_list'] as $selected){
                // delete each post of the check list
                $delete_post = "DELETE FROM Posts WHERE post_id=$selected";

                if ($mysqli->query($delete_post) === TRUE) {
                    echo "Post " . $selected . " deleted successfully <br> ";
                } else {
                    echo "Error deleting post: " . $selected . "<br>";
                }

             }

             /* close connection */
             $mysqli->close();
         ?>

	</body>
</html>
