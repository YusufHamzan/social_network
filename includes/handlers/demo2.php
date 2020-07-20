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
</head>
<body>
<form action="demo.php" method="POST">
	<input type="text" name="text" placeholder="Add asome text">
	<input type="submit" name="bttn" value="Post">
	<a href="#"><ion-icon name="home"></ion-icon></ion-icon>y</a>  <!--https://ionicons.com/usage -->
			<a href="#"><ion-icon name="mail"></ion-icon>z</a>
			<a href="#"><ion-icon name="notifications"></ion-icon>a</a>
			<a href="#"><ion-icon name="settings"></ion-icon>b</a>
			<a href="#"><ion-icon name="help-circle"></ion-icon>c</a>
			<a href="includes/handlers/logout.php"><ion-icon name="log-out"></ion-icon>d</a>
			
</form>
</body>
</html>