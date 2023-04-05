<?php
session_start();

include('../includes/connect.php'); 

if(isset($_POST['login'])){ 
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	$users_found = 0;  
	$user_type = "invalid";
	$info = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password' "); 
	while($row = mysqli_fetch_array($info)){ 
		$users_found = $users_found + 1; 
		} 
	if($users_found == 1){ 
            	$_SESSION['admin'] = $username;
                $_SESSION['succeed'] = "You have signed in successfully!";
            	header('location: dashboard.php');
	}
	else{ 
		$_SESSION['fail'] = "Your attempted login does not match any records, Please try again"; 
	}
	
} //if isset post

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Login to WebX
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/jconnect.ico">
	<link rel="stylesheet" type="text/css" href="../css/cms.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
 <body id="login_body">
 	   <div class="logo_intro">
 	   </div>
      <div class="form_holder" id="login_holder">  
      	<div class="form_heading" id="login_heading">
      	    Sign In
      	</div>
          <form method="post" action="login.php" class="admin_form"> 
        	 <?php include('../includes/success_fail.php'); ?>
             <label>Username</label>
             <input type="text" name="username"> 
             <label>Password</label>
             <input type="password" name="password">  
             <button type="submit" name="login"> 
                Login
             </button>
         </form>
       </div> 
 
    </body>
</html>