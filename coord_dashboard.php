<?php
//include auth_session.php file on all user panel pages
include("coord_auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Coordinator Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['cname']; ?>!</p>
        <p>You are now coordinator dashboard page.</p>
		<p><a href="coord_view_event.php">View My Events</a></p>
		<p><a href="coord_event_attendees.php">View Event Attendees</a></p>
		<p><a href="admin_event_attendance.php">Enter Participant Attendance</a></p>
        <p><a href="coord_logout.php">Logout</a></p>
    </div>
</body>
</html>