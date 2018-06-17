<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Page | State Cyber Cell</title>
  
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<link rel='stylesheet prefetch' href='http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>

      <link rel="stylesheet" href="css/login.css">

  
</head>

<body>
  
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mdpass = mysqli_real_escape_string($db,$_POST['password']);
     $mypassword = md5($mdpass);
      
      $sql = "SELECT officer_id FROM login_detail WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        //session_register("Myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
  <div class="container-fluid">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-6">
      <div class="h-100vh row justify-content-center align-items-center">
        <div class="col-md-6 b-left order-2">
         
          <form action="" method="post" name="login">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                                    <i class="ion-ios-email-outline"></i>
                                </span>
              <input type="text" class="form-control" name="username" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                                    <i class="ion-ios-locked-outline"></i>
                                </span>
              <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
            </div>
            <button type="submit" name="submit"  class="btn w-100">Login</button>
          </form>
        </div>
        <div class="col-md-6 order-1">
       <center><img src="logo.png"></center>  
          <div class="text">
            <h1 class="text-center">State Cyber Cell,Indore</h1>
            <p class="text-center">Welcomes You</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>
