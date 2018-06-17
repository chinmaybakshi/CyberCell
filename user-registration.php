<html>
<head>
<title>
User Registration    
</title>    
    
</head>
   <body>
    <?php
       require('config.php');
      if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
    $fullname = stripslashes($_REQUEST['fullname']);
    $fullname = mysqli_real_escape_string($con,$fullname);        
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$regDate  = date("Y-m-d H:i:s");
        $query = "INSERT into `login_detail` (username,fullname, password, regDate )
VALUES ('$username', '$fullname' , '".md5($password)."', '$regDate ')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="fullname" placeholder="Full Name" required />
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
