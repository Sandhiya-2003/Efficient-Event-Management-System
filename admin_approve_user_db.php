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
		//$selectedRow=$_POST['selectdelete'];
		//$query    = "DELETE FROM coord WHERE cid='$selectedRow'";
if(isset($_POST['submitapprove'])){
//echo implode(", ",$selectdelete);
//echo $selectdelete[0];
  if(isset($_POST['selectapprove'])){
	  //echo $selectdelete[0];
    foreach($_POST['selectapprove'] as $approveid){
      //echo "id ".$deleteid." ";
      //$deleteUser = "DELETE from user WHERE userid='$deleteid'";
	  $updateUser = "UPDATE user SET accept=1 WHERE userid='$approveid'";
      $result=mysqli_query($con,$updateUser) or die(mysql_error());
    }
  }
 }
        //$result = mysqli_query($con, $query) or die(mysql_error());
            echo "<div class='form'>
                  <h3>User deleted</h3><br/>
				  <p class='link'>Click here to <a href='admin_dashboard.php'>Go to Admin Dashboard</a> again.</p>
                  </div>";
?>
</body>
</html>