<!DOCTYPE html>

<html>
	<head>
		<title>  View User Posts </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="ViewUsers.css">
	</head>

	<body>
        <h2> User Posts </h2>

         <?php
             $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");
             /* check connection */
             if ($mysqli->connect_errno) {
                 printf("Connect failed: %s\n", $mysqli->connect_errno);
                 exit();
             }
         ?>
         <form action="ViewUserPosts.php" method="post">
             <select name="username">
                <?php
                     $posts = "SELECT * FROM Users";
                     if ($result = $mysqli->query($posts)) {
                         // Get all users
                         while ($posts_row = $result->fetch_assoc()) {
                             $author_id = $posts_row['user_id'];
                             ?>
                             <option value=" <?php echo $author_id; ?>"> <?php echo $author_id; ?> </option>
                         <?php
                         }
                         /* free result set */
                         $result->free();
                     }
                 ?>
             </select>
             <input type="submit" value="Submit">
         </form>
         </p> <a href="AdminHome.html"> Go back </a> </p>

         <?php
         /* close connection */
         $mysqli->close();
         ?>

         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>
