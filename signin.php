<!DOCTYPE html>

<?php 
session_start();

include("includes/db.php");
	
?>

<html>
	<head>
	<title>SignIn</title>
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
		

		
		
		  
        
            <form class="box" action="signin.php" method="post">
  <h1>SIGN IN</h1>
  <input type="text" name="email" placeholder="staff email"  >
  <input type="password" name="password" placeholder="Password" >
  <input type="submit" name="login" value="Sign In">
		

				<p class="signuphere" style="float:right;">
                         <a href="password.php" class="signuphere-link">Reset Password?</a>
                    </p>
           
		</form>
        
        </div>
		
		
    <div id="footer">
		
		<h2 style="text-align:center; padding-top:30px; color:midnightblue;">&copy; 2019 by Najm Ameen</h2>
		
		</div>

    
    </body>



</html>


<?php

if (isset($_POST['login'])){

$email =$_POST ['email'];
$password =$_POST ['password'];

$login = mysqli_query($con,"select * from staff where email='$email' and password='$password'");
$cek = mysqli_num_rows($login);


    if (empty($email) || empty($password) ) {
    echo "<script> alert ('Please fill the fields!')</script>";
    return false;

    }else if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);
 
	   if($data['role']=="Admin"){
 
		
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "Admin";
		
        echo "<script>alert('You logged in successfully as admin, Thanks!')</script>";
        echo "<script>window.open('admin/admin.php','_self')</script>";
		exit();
 
	
	   }else if($data['role']=="Office"){
		
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "Office";
		
        echo "<script>alert('You logged in successfully as office, Thanks!')</script>";
        echo "<script>window.open('Office Staff/officestaff.php','_self')</script>";
		exit();
 
       }else if($data['role']=="Security Post"){
	
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "Security Post";
		
        echo "<script>alert('You logged in successfully as a Security Post, Thanks!')</script>";
        echo "<script>window.open('Security staff/dashboard.php','_self')</script>";
		exit();
		
       } 
        }else {
            echo "<script>alert('Your email or password not correct please try again!')</script>";
        }
}

?>
