<?php
	ob_start(); // Turns on output buffer
	$timezone = date_default_timezone_set("Asia/Kolkata");

	if(!isset($_SESSION)){
 		session_start();
 		}
 	$con = mysqli_connect("localhost", "root", "", "internet");
 	if(mysqli_connect_errno()){ echo "db connection failed".mysqli_connect_errno(); }
 	// else{ echo "Connected to database 'internet'. ";}






/*
later tabe paste in register handler after submit form
<?php if(in_array($error_array, "Account Created Successfully")) {
				 			echo "Account Created Successfully";
				 		}
				 ?>
*/
?>



