<?php


 	require 'config/config.php';
 	 
 	 if(isset($_POST['bttn'])){
 		echo "clicked";
	 }
 	

 	 if (isset($_SESSION['username'])){
 	 	$userLoggedIn = $_SESSION['username'];
 	 	$user_details_query = mysqli_query($con,"SELECT * FROM usergeneral WHERE U_name = '$userLoggedIn' ");
 	 	$user = mysqli_fetch_array($user_details_query);

 	 }




?>

<!DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/card.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	

	<!-- JAVASCRIPT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	
</head>
<body>
	<div class="navbar sticky-top">
		<div class="container">
		<!-- logo -->		
			<div class="navbar-brand d-none d-lg-block d-xl-block">
				<img style="height: 30px; width: 30px;" src="assets/pictures/logo/logo.png" alt='logo'">
				<a href="index.php">!BuffeeD</a>			
			</div>
			
			<nav  >	<!-- navigations -->
				<div class="d-flex justify-content-md-between align-items-center">
			<ul >
				<li><img style="height: 30px; width: 30px; border: 1px solid grey;" src="<?php echo $user['Photo'];?>" class='rounded-circle d-none d-lg-block d-xl-block ' ></li>				
					
				<li><a href="#"  class='d-none d-lg-block d-xl-block' >
						<?php echo $user['Name'];	?>
				</a></li>
					
						<!--https://ionicons.com/ -->
				<li><a href="index.php"><ion-icon name="home"></ion-icon></ion-icon></a> </li>
				<li><a href="#"><ion-icon name="mail"></ion-icon></a></li>
				<li><a href="#"><ion-icon name="notifications"></ion-icon></a></li>
				<li><a href="#"><ion-icon name="settings"></ion-icon></a></li>
				<li><a href="#"><ion-icon name="help-circle"></ion-icon></a></li>
				<li><a href="includes/handlers/logout.php"><ion-icon name="log-out"></ion-icon></ion-icon></a></li>
				
			</ul>	
			</div>
				
						
			</nav>
		</div>
		
		
	</div>
<form action="demo.php" method="POST">
	<input type="text" name="text" placeholder="Add asome text">
	<input type="submit" name="bttn" value="Post">
	<a href="#"><ion-icon name="home"></ion-icon></ion-icon></a>  <!--https://ionicons.com/usage -->
			<a href="#"><ion-icon name="mail"></ion-icon>fdf</a>
			<a href="#"><ion-icon name="notifications"></ion-icon>dfd</a>
			<a href="#"><ion-icon name="settings"></ion-icon>gg</a>
			<a href="#"><ion-icon name="help-circle"></ion-icon>ss</a>
			<a href="includes/handlers/logout.php"><ion-icon name="log-out"></ion-icon>dfdf</a>
			
</form>
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>
</html>