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
    if (isset($_POST['adminid'])) {
        $adminid = stripslashes($_REQUEST['adminid']);    // removes backslashes
        $adminid = mysqli_real_escape_string($con, $adminid);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `admin` WHERE adminid='$adminid'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['adminid'] = $adminid;
            // Redirect to user dashboard page
            header("Location: admin_dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Admin ID/password.</h3><br/>
                  <p class='link'>Click here to <a href='admin_login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div id="login">
    <form class="form" method="post" name="login">
        <h1 class="login-title">ADMIN LOGIN</h1>
        <input type="text" id="adminid" name="adminid" placeholder="Admin ID" required>
		<br><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
		<br><br>
        <input type="submit" value="LOGIN" name="submit" class="login-button"/>
		<br>
    </form>
    </div>
<?php
    }
?>
</body>
</html>