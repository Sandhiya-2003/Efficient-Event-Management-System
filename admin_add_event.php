<!DOCTYPE html><html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Add Coordinator - Prayatna' 23</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['ecode'])) {
        // removes backslashes
        $ename = stripslashes($_REQUEST['ename']);
        //escapes special characters in a string
        $ename = mysqli_real_escape_string($con, $ename);
		$ecode = stripslashes($_REQUEST['ecode']);
        $ecode = mysqli_real_escape_string($con, $ecode);
		$venue= stripslashes($_REQUEST['venue']);
        $venue = mysqli_real_escape_string($con, $venue);
		$cname = stripslashes($_REQUEST['cname']);
        $cname = mysqli_real_escape_string($con, $cname);
		$duration = stripslashes($_REQUEST['duration']);
        $duration = mysqli_real_escape_string($con, $duration);
		$edate=stripslashes($_REQUEST['edate']);
		$edate = mysqli_real_escape_string($con, $edate);
		$edate = date("Y-m-d",strtotime($edate));
		$stime=stripslashes($_REQUEST['stime']);
		$stime = mysqli_real_escape_string($con, $stime);
		$stime = date("h:i:sa",strtotime($stime));
		$query    = "SELECT * FROM `event` WHERE ecode='$ecode'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
			$query = "INSERT into `event` (ename, ecode, venue, edate, stime, duration, cname) VALUES ('$ename', '$ecode', '$venue','$edate', '$stime', '$duration', '$cname')";
			$result   = mysqli_query($con, $query);
			if ($result) {
				echo "<div class='form'>
					  <h3>Coordinator added successfully.</h3><br/>
					  <p class='link'>Click here to <a href='admin_dashboard.php'>Go to Admin Dashboard</a></p>
					  </div>";
			} else {
				echo "<div class='form'>
					  <h3>Required fields are missing.</h3><br/>
					  <p class='link'>Click here to <a href='admin_add_event.php'>Add Event</a> again.</p>
					  </div>";
            }
		}
		else {
			    echo "<div class='form'>
				<h3>Event already exists.</h3><br/>
				<p class='link'>Click here to <a href='admin_add_event.php'>Add Event</a></p>
				</div>";
		}
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Add Coordinator</h1>
		<label for="ename">Event Name : </label>
        <input type="text" id="ename" name="ename" placeholder="Event Name" required>
		<br><br><br>
		<label for="ecode">Event Code : </label>
        <input type="text" id="ecode" name="ecode" placeholder="Event Code" pattern="[A-Z]{2}[0-9]{3}" required>
		<br><br><br>
		<label for="venue">Venue : </label>
        <input type="text" id="venue" name="venue" placeholder="Venue" required>
		<br><br><br>
		<label for="edate">Event Date : </label>
        <input type="text" id="edate" name="edate" placeholder="Event Date dd-mm-yyyy" required>
		<br><br><br>
		<label for="stime">Event Start Time : </label>
        <input type="text" id="stime" name="stime" placeholder="Event Start Time hh:mm:ss" required>
		<br><br><br>
		<label for="duration">Event Duration : </label>
        <input type="number" id="duration" name="duration" placeholder="Duration" min="1" max="24" required>
		<br><br><br>
		<?php
		//$sql = "SELECT cname FROM `coord`";
        //$all_cname = mysqli_query($con,$sql);
		$query    = "SELECT * FROM `coord`";
        $result = mysqli_query($con, $query) or die(mysql_error());
		?>
		<label for="cname">Coordinator Name : </label>
        <select name="cname">
            <?php 
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($record = mysqli_fetch_array(
                        $result,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $record["cname"]." - ".$record["mobile"];
                ?>">
				<?php echo $record["cname"]." - ".$record["mobile"];
                        // To show the category name to the user
                    ?>
				</option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
		<br><br><br>
        <input type="submit" name="submit" value="Add Event" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>