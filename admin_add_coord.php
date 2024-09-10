<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Add Coordinator - Prayatna' 23</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['mobile'])) {
        // removes backslashes
        $cname = stripslashes($_REQUEST['cname']);
        //escapes special characters in a string
        $cname = mysqli_real_escape_string($con, $cname);
		$mobile = stripslashes($_REQUEST['mobile']);
        $mobile = mysqli_real_escape_string($con, $mobile);
		$password= stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
		$query    = "SELECT * FROM `coord` WHERE mobile='$mobile'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
			$query    = "INSERT into `coord` (cname, mobile, password)
						 VALUES ('$cname','$mobile','" . md5($password) . "')";
			$result   = mysqli_query($con, $query);
			if ($result) {
				echo "<div class='form'>
					  <h3>Coordinator added successfully.</h3><br/>
					  <p class='link'>Click here to <a href='admin_dashboard.php'>Go to Admin Dashboard</a></p>
					  </div>";
			} else {
				echo "<div class='form'>
					  <h3>Required fields are missing.</h3><br/>
					  <p class='link'>Click here to <a href='admin_add_coord.php'>Add coordinator</a> again.</p>
					  </div>";
            }
		}
		else {
			    echo "<div class='form'>
				<h3>Coordinator already exists.</h3><br/>
				<p class='link'>Click here to <a href='admin_add_coord.php'>Add coordinator</a></p>
				</div>";
		}
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Add Coordinator</h1>
		<label for="cname">Coodinator Name : </label>
        <input type="text" id="cname" name="cname" placeholder="Coordinator Name" required>
		<br><br><br>
		<label for="mobile">Mobile Number : </label>
        <input type="tel" id="mobile" name="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" required>
		<br><br><br>
		<label for="password">Password : </label>
        <input type="text" id="password" name="password" placeholder="Password" required>
		<br><br><br>
        <input type="submit" name="submit" value="Register" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>