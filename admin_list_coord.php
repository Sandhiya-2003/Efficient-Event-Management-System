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
        $query    = "SELECT * FROM `coord`";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            echo "<table border='1'><tr><th>COORDINATOR NAME</th><th>MOBILE NUMBER</th></tr>";
			while($record = mysqli_fetch_array($result))
			{
			echo "<tr><td><center>" . $record['cname'] . "</center></td><td><center>" . $record['mobile'] . "</center></td></tr>";
			}
			echo "</table>";
        } else {
            echo "<div class='form'>
                  <h3>No coordinators are added</h3><br/>
                  </div>";
        }
         echo "<div class='form'>
 	    <p class='link'>Click here to <a href='admin_dashboard.php'>Go to Admin Dashboard</a> again.</p>
        <p class='link'>Click here to <a href='admin_add_coord.php'>Add Coordinator</a> Now.</p>
        </div>";
?>
</body>
</html>