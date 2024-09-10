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
		$cnamemobile= $_SESSION['cname']." - ".$_SESSION['mobile'];
        $query    = "SELECT * FROM `event` where cname='$cnamemobile'"; 
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            echo "<table border='1'><tr><th>EVENT CODE</th><th>EVENT NAME</th><th>VENUE</th><th>DATE</th><th>START TIME</th><th>EVENT DURATION</th></tr>";
			while($record = mysqli_fetch_array($result))
			{
			echo "<tr><td><center>" . $record['ecode'] . "</center></td><td><center>" . $record['ename'] . "</center></td><td><center>" . $record['venue'] . "</center></td><td><center>" . $record['edate'] . "</center></td><td><center>" . $record['stime'] . "</center></td><td><center>" . $record['duration'] . "</center></td></tr>";
			}
			echo "</table>";
        } else {
            echo "<div class='form'>
                  <h3>No Events are assigned</h3><br/>
                  </div>";
        }
         echo "<div class='form'>
 	    <p class='link'>Click here to <a href='coord_dashboard.php'>Go to Coordinator Dashboard</a> again.</p>
        </div>";
?>
</body>
</html>