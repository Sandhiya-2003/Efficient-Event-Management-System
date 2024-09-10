<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['mobile'])) {
        $mobile = stripslashes($_REQUEST['mobile']);    // removes backslashes
        $mobile = mysqli_real_escape_string($con, $mobile);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `user` WHERE mobile='$mobile'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['mobile'] = $mobile;
			$record = $result->fetch_assoc();
			$_SESSION['uname'] = $record["uname"];
            // Redirect to user dashboard page
            header("Location: user_dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='user_login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div id="login">
    <form class="form" method="post" name="login">
        <h1 class="login-title">LOGIN</h1>
        <input type="tel" id="mobile" name="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" required>
		<br><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
		<br><br>
        <input type="submit" value="LOGIN" name="submit" class="login-button"/>
		<br>
        <p class="link"><a href="user_registration.php">NEW REGISTRATION</a></p>
    </form>
    </div>
<?php
    }
?>
</body>
</html>