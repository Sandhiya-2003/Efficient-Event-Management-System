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
        $query    = "SELECT * FROM `event`";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
		$mobile=$_SESSION['mobile'];
        if ($rows > 0) {
			echo '<form action = "user_add_event_db.php" method = "POST" name = "eventaddform">';
            echo "<table border='1'><tr><th>DELETE</th><th>EVENT CODE</th><th>EVENT NAME</th><th>VENUE</th><th>DATE</th><th>START TIME</th><th>EVENT DURATION</th><th>COORDINATOR NAME</th></tr>";
			while($record = mysqli_fetch_array($result))
			{
	        echo '<tr><td><center><input type = "checkbox" style = "inline" name ="selectadd[]" value="'.$record['ecode'].'>"</td></center>';
			echo "<td><center>" . $record['ecode'] . "</center></td><td><center>" . $record['ename'] . "</center></td><td><center>" . $record['venue'] . "</center></td><td><center>" . $record['edate'] . "</center></td><td><center>" . $record['stime'] . "</center></td><td><center>" . $record['duration'] . "</center></td><td><center>" . $record['cname'] . "</center></td></tr>";
			}
			echo "</table>";
			echo '<input type = "submit" value = "Add Event" name = "submitadd">';

            echo '</form>';
              
        } else {
            echo "<div class='form'>
                  <h3>No events are added</h3><br/>

                  <p class='link'>Click here to <a href='user_add_event.php'>Add Event</a> Now.</p>
                  </div>";
        }
?>
				  <p class='link'>Click here to <a href='user_dashboard.php'>Go to User Dashboard</a> again.</p>
</body>
</html>