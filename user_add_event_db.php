<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Login - Prayatna' 23</title>
</head>
<body>
<?php
    require('db.php');
    session_start();
	$mobile=$_SESSION['mobile'];
    // When form submitted, check and create user session.
        // Check user is exist in the database
		//$selectedRow=$_POST['selectdelete'];
		//$query    = "DELETE FROM coord WHERE cid='$selectedRow'";
if(isset($_POST['submitadd'])){
//echo implode(", ",$selectdelete);
//echo $selectdelete[0];
  if(isset($_POST['selectadd'])){
	  //echo $selectdelete[0];
    foreach($_POST['selectadd'] as $addid){
      echo "id ".$addid." ";
	  echo "comp ".strcmp("PR101",'$addid')." - ";
	  //$query    = "SELECT * FROM `participant` where strcmp(ecode,'$addid')";
	  	  $query    = "SELECT * FROM `participant` where ecode = '$addid' AND CHAR_LENGTH(`ecode`)=CHAR_LENGTH('$addid')";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
		  echo "rows ".$rows ;
		if($rows==0)
		{
      $addEvent = "INSERT into `participant` (umobile, ecode, attended) VALUES ('$mobile', '$addid', 0)";
      $result=mysqli_query($con,$addEvent) or die(mysql_error());
		}
    }
  }
 }
        //$result = mysqli_query($con, $query) or die(mysql_error());
            echo "<div class='form'>
                  <h3>Event added</h3><br/>
				  <p class='link'>Click here to <a href='user_dashboard.php'>Go to User Dashboard</a> again.</p>
                  </div>";
?>
</body>
</html>