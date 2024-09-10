<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - User Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['uname']; $mobile=$_SESSION['mobile'];?>!</p>
        <p>You are now user dashboard page.</p>
		<p><a href="user_add_event.php">Choose Events</a></p>
        <p><a href="user_logout.php">Logout</a></p>
    </div>
</body>
</html>