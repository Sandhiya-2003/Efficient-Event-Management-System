<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Login - Prayatna' 23</title>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
        // Check user is exist in the database
        $query    = "SELECT * FROM `user`";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
			echo '<form action = "admin_approve_user_db.php" method = "POST" name = "userapproveform">';
            echo "<table border='1'><tr><th>APPROVE</th><th>USER ID</th><th>USER NAME</th><th>YEAR</th><th>COLLEGE</th><th>DEPARTMENT</th><th>EMAIL</th><th>ACCEPT</th></tr>";
			while($record = mysqli_fetch_array($result))
			{
				if($record['accept']){ $approve="Yes"; } else {$approve="No";}
	        echo '<tr><td><center><input type = "checkbox" style = "inline" name ="selectapprove[]" value="'.$record['userid'].'>"</td></center>';
			echo "<td><center>" . $record['userid'] . "</center></td><td><center>" . $record['uname'] . "</center></td><td><center>" . $record['year'] . "</center></td><td><center>" . $record['college'] . "</center></td><td><center>" . $record['dept'] . "</center></td><td><center>" . $record['email'] . "</center></td><td><center>" . $approve. "</center></td></tr>";
			}
			echo "</table>";
			echo '<input type = "submit" value = "APPROVE User" name = "submitapprove">';

            echo '</form>';
              
        } else {
            echo "<div class='form'>
                  <h3>No users are registered</h3><br/>
				  
                  </div>";
        }
?>
<p class='link'>Click here to <a href='admin_dashboard.php'>Go to Admin Dashboard</a> again.</p>
</body>
</html>