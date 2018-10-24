<!DOCTYPE html>

<html>
	<head>
		<title>  View Users </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="ViewUsers.css">
        <link rel="stylesheet" href="admin.css">
	</head>

	<body>
         <?php
             $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");
             /* check connection */
             if ($mysqli->connect_errno) {
                 printf("Connect failed: %s\n", $mysqli->connect_errno);
                 exit();
             }
         ?>

         <table class="table table-striped" >
             <tr>
                 <th scope="col"> Post ID </th>
                 <th scope="col"> Content </th>
             </tr>

         <?php
             $username = $_POST["username"];
             echo " <h2> ". $username . " posts: </h2>";
             $posts = "SELECT * FROM Posts WHERE author_id='$username'";
             echo "Query string: " . $posts . "<br>";


             if ($result = $mysqli->query($posts)) {
                 $row_count = mysqli_num_rows($result);
                 // Get all posts from the user
                  while ($posts_row = $result->fetch_assoc()){
                     $post_id = $posts_row['post_id'];
                     $content = $posts_row['content'];
                     ?>
                     <tr>
                         <th> <?php echo $post_id; ?> </th>
                         <th> <?php echo $content; ?> </th>
                     </tr>
                 <?php
                 }
                 /* free result set */
                 $result->free();
             }
             ?>
         </table>


     </p> <a href="ViewUserPosts_form.php"> Go back </a> </p>

         <?php
         /* close connection */
         $mysqli->close();
         ?>

         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>
