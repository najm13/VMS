<!DOCTYPE html>

<?php 
session_start();

include("includes/db.php");
	
?>

<html>
	<head>
	<title>Forget Password</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="signin.css">
		<link rel="stylesheet" type="text/css" href="search.css">
	</head>

	
	
<body>
	
	
	
		
	<div class="row">
		<div class="logo">
		<h1>VMS</h1>
		
		</div>
			
	<div class="menubar">
		
		<ul id="menu">
			<li><a href="index.php">HOME</a></li>
			
		
			<div class="right">
				
				<li><a href=""><img src="staff.png" width="50"></a></li>	
				
			</div>
				<div class="right">
					
					 <?php 
                            if(!isset($_SESSION['customer_email'])){
                                echo "<li><a href='signin.php'>SIGN IN</a></li>";
                            }
                            else {
                                echo "<li><a href='signout.php' >SIGN OUT</a></li>";
                            }
                 ?>
				
				
			</div>
		</ul>	
	</div>
		
	
	
	
	<div class="search">
		
	
	
	
	
	</div>
		
		<div id="content_area">
		
		
		<div id="product_box">
			
			
			
			
		</div>
		
		</div>
		

		
		
		  
        
            <form class="box" action="password.php" method="post">
  <h1>Reset Password</h1>
  <input type="text" name="email" placeholder="staff email" >
    <input type="password" name="password" placeholder="OldPassword" >
  <input type="password" name="newpassword" placeholder="New Password" >
<input type="password" name="repassword" placeholder="New Password Confirm" >
  <input type="submit" name="reset" value="Submit">
		

				<p class="signuphere" style="float:right;">
                         <a href="signin.php" class="signuphere-link">Sign in</a>
                    </p>
           
		</form>
        
        </div>
		
		
    <div id="footer">
		
		<h2 style="text-align:center; padding-top:30px; color:midnightblue;">&copy; 2019 by Najm Ameen</h2>
		
		</div>

    
    </body>



</html>
<?php

if (isset($_POST['reset'])){

$email =$_POST ['email'];
$password =$_POST ['password'];
$newpassword =$_POST ['newpassword'];
$repassword =$_POST ['repassword'];

$password_query = mysqli_query($con,"select * from staff where email='$email'");
	$password_row = mysqli_fetch_array($password_query);
	$database_password = $password_row['password'];
	if ($database_password == $password)
		{
		if ($newpassword == $repassword)
			{
			$update_pwd = mysqli_query($con,"update staff set password='$newpassword' where email='$email'");
			echo "<script>alert('Password has been updated Sucessfully'); window.location='signin.php'</script>";
			}
		  else
			{
			echo "<script>alert('Your new and Retype Password is not match'); window.location='password.php'</script>";
			}
		}
	  else
		{
		echo "<script>alert('Your old password is wrong'); window.location='password.php'</script>";
		}
	}

?>

