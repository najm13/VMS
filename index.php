<!DOCTYPE html>

<?php 
session_start();

	
?>

<html>
	<head>
    <meta charset="utf-8">
	<title>VMS</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="search.css">
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
		
	</head>

	
	
<body>
	
	
	
		
	<div class="row">
		<div class="logo">
		<h1>VMS</h1>
		
		</div>
			
	<div class="menubar">
		
		<ul id="menu">
            
			<li><a class="current"  href="index.php" >HOME</a></li>
			
		
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
        
	</div>
		
		
	
	
	
	<div class="search">
		
	
		
	
	
		
	</div>
		
		
		<h1 class="ml1">
  <span class="text-wrapper">
    <span class="line line1"></span>
    <span class="letters" style="color:midnightblue; font-family: 'Montserrat', sans-serif;">Visitor Management System</span>
    <span class="line line2"></span>
  </span>
</h1>


		


		
		
		
		
		
		<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px; color:midnightblue;">&copy; 2019 by Najm Ameen</h2>
		
		</div>
		
		
<script>
// Wrap every letter in a span
var textWrapper = document.querySelector('.ml1 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml1 .letter',
    scale: [0.3,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 600,
    delay: (el, i) => 70 * (i+1)
  }).add({
    targets: '.ml1 .line',
    scaleX: [0,1],
    opacity: [0.5,1],
    easing: "easeOutExpo",
    duration: 700,
    offset: '-=875',
    delay: (el, i, l) => 80 * (l - i)
  }).add({
    targets: '.ml1',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
</script>
	
	
	
</body>
</html>

