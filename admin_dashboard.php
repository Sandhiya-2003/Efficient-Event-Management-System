<?php
//include auth_session.php file on all user panel pages
include("admin_auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Admin Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['adminid']; ?>!</p>
        <p>You are now admin dashboard page.</p>
		<p><a href="admin_add_coord.php">Add Co-ordinators</a></p>
		<p><a href="admin_list_coord.php">List Co-ordinators</a></p>
		<p><a href="admin_delete_coord.php">Delete Co-ordinators</a></p>
		<p><a href="admin_add_event.php">Add Event</a></p>
		<p><a href="admin_list_event.php">List Event</a></p>
		<p><a href="admin_delete_event.php">Delete Event</a></p>
		<p><a href="admin_list_user.php">List User</a></p>
		<p><a href="admin_delete_user.php">Delete User</a></p>
		<p><a href="admin_approve_user.php">Approve User</a></p>
        <p><a href="admin_logout.php">Logout</a></p>
    </div>
</body>
</html>