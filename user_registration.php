<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['uname'])) {
        // removes backslashes
        $uname = stripslashes($_REQUEST['uname']);
        //escapes special characters in a string
        $uname = mysqli_real_escape_string($con, $uname);
		$year    = stripslashes($_REQUEST['year']);
        $year    = mysqli_real_escape_string($con, $year);
        $college    = stripslashes($_REQUEST['college']);
        $college    = mysqli_real_escape_string($con, $college);
        $dept = stripslashes($_REQUEST['dept']);
        $dept = mysqli_real_escape_string($con, $dept);
		$email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
		$mobile = stripslashes($_REQUEST['mobile']);
        $mobile = mysqli_real_escape_string($con, $mobile);
		$password= stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
		$question = stripslashes($_REQUEST['question']);
        $question = mysqli_real_escape_string($con, $question);
		$answer = stripslashes($_REQUEST['answer']);
        $answer = mysqli_real_escape_string($con, $answer);
        $create_datetime = date("Y-m-d H:i:s");
		$query    = "SELECT * FROM `user` WHERE mobile='$mobile'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
			$query = "INSERT into `user` (uname, year, college, dept, email, mobile, password, question, answer, create_datetime)
						 VALUES ('$uname','$year','$college','$dept','$email','$mobile','" . md5($password) . "','" . md5($question) . "','" . md5($answer) . "','$create_datetime')";
			$result   = mysqli_query($con, $query);
			if ($result) {
				echo "<div class='form'>
					  <h3>You are registered successfully.</h3><br/>
					  <p class='link'>Click here to <a href='user_login.php'>Login</a></p>
					  </div>";
			} else {
				echo "<div class='form'>
					  <h3>Required fields are missing.</h3><br/>
					  <p class='link'>Click here to <a href='user_registration.php'>registration</a> again.</p>
					  </div>";
            }
		}
		else {
			    echo "<div class='form'>
				<h3>User already exists.</h3><br/>
				<p class='link'>Click here to <a href='user_login.php'>Login</a></p>
				</div>";
		}
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
		<label for="uname">Name : </label>
        <input type="text" id="uname" name="uname" placeholder="Participant Name" required>
		<br><br><br>
		<label for="year">Year of study : </label>
        <input type="number" id="year" name="year" placeholder="Year of study" min="1" max="4" required>
		<br><br><br>
        <label for="college">College Name : </label>
        <input type="text" id="college" name="college" placeholder="College Name" required>
		<br><br><br>
		<label for="college">Department : </label>
        <select id="dept" name="dept">
		<option value="Computer Science and Engineering">Computer Science and Engineering</option>
        <option value="Information Technology">Information Technology</option>
        <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
		<option value="Electronics and Instrumentation Engineering"> Electronics and Instrumentation Engineering</option>
		<option value="Mechanical Engineering">Mechanical Engineering</option>
		<option value="Aeronautical Engineering">Aeronautical Engineering</option>
		<option value="Automobile Engineering">Automobile Engineering</option>
		<option value="Production Engineering">Production Engineering</option>
		<option value="Rubber and Plastics Technology">Rubber and Plastics Technology</option>
        </select>		
		<br><br><br>
		<label for="email">Email : </label>
        <input type="email" id="email" name="email" placeholder="Email" required>
		<br><br><br>
		<label for="mobile">Mobile Number : </label>
        <input type="tel" id="mobile" name="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" required>
		<br><br><br>
		<label for="password">Password : </label>
        <input type="text" id="password" name="password" placeholder="Password" required>
		<br><br><br>
		<label for="question">Secret Question : </label>
        <input type="text" id="question" name="question" placeholder="Secret question" required>
		<br><br><br>
		<label for="answer">Answer : </label>
        <input type="text" id="answer" name="answer" placeholder="answer" required>
		<br><br><br>
        <input type="submit" name="submit" value="Register" class="login-button">
		<p>Already registered?</p>
        <p class="link"><a href="user_login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>