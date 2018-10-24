<!DOCTYPE html>

<html>
	<head>
		<title>  View Users </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="ViewUsers.css">
        <link rel="stylesheet" href="admin.css">
	</head>

	<body>
        <h2> Users </h2>

         <?php
             $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");
             /* check connection */
             if ($mysqli->connect_errni) {
                 printf("Connect failed: %s\n", $mysqli->connect_errno);
                 exit();
             }
         ?>

         <table class="table table-striped" >
             <tr>
                 <th scope="col"> User ID </th>
             </tr>

         <?php
             $users = "SELECT * FROM Users";
             if ($result = $mysqli->query($users)) {
                 // Get all users
                 while ($users_row = $result->fetch_assoc()) {
                     $user_id = $users_row['user_id'];
                     ?>
                     <tr>
                         <td> <?php echo $user_id; ?> </td>
                     </tr>
                 <?php
                 }
                 /* free result set */
                 $result->free();
             }
             ?>
         </table>

        <p> <a href="AdminHome.html"> Go back </a> </p>

         <?php
         /* close connection */
         $mysqli->close();
         ?>

         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>
