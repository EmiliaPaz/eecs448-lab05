<!DOCTYPE html>

<html>
	<head>
		<title> Delete Post </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="ViewUsers.css">
        <link rel="stylesheet" href="admin.css">
	</head>

	<body>
        <h2> Delete Posts </h2>

         <?php
             $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");
             /* check connection */
             if ($mysqli->connect_errno) {
                 printf("Connect failed: %s\n", $mysqli->connect_errno);
                 exit();
             }
         ?>

         <form action="DeletePosts.php" method="post">
             <table class="table table-striped" >
                 <tr>
                     <th scope="col"> Post ID </th>
                     <th scope="col"> Content </th>
                     <th scope="col"> Author </th>
                     <th scope="col"> Delete </th>
                 </tr>

             <?php
                 $users = "SELECT * FROM Posts";
                 if ($result = $mysqli->query($users)) {
                     // Get all users
                     while ($posts_row = $result->fetch_assoc()) {
                         $post_id = $posts_row['post_id'];
                         $content = $posts_row['content'];
                         $author_id = $posts_row['author_id'];
                         ?>
                         <tr>
                             <td> <?php echo $post_id; ?> </td>
                             <td> <?php echo $content; ?> </td>
                             <td> <?php echo $author_id; ?> </td>
                             <td> <input type="checkbox" name="check_list[]" value=" <?php echo $post_id; ?>"  > </td>
                         </tr>
                     <?php
                     }
                     /* free result set */
                     $result->free();
                 }
                 ?>
             </table>
             <input type="submit" value="Delete">
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
