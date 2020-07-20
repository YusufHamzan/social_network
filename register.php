<?php
 	require "config/config.php";
 	require "includes/form_handlers/register_handler.php";
 	require "includes/form_handlers/login_handler.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to !buffeed</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body class="body">
	
	<?php
		if(isset($_POST['reg_bttn'])){
			echo '
			<script>
				$(document).ready(function() {
					$("#first").show();
					$("#second").hide();    

					});
			</script>

			';
		} 

		if(in_array("Account Created Successfully", $error_array)) {
			echo "<br><h2 style='color:blue;'>Account Created Successfully</h2>";
			}

	?>




	<div class="wrapper">
		<div class="forms">
			
			<div class="login_header ">
				<img class="logo" src="assets/pictures/logo/logo.png" alt='logo'">
				<h2 style="float: left;" class="logo_title">!BuffeeD</h2>
			</div>

			<div class="first" id="first">
				<!-- __________________________Login form ________________________________-->
				<form action="register.php" method="POST">
					<!--___________________________Login Email________________________ -->
					<input type="email" name="login_email" placeholder="Email" value="<?php
						if(isset($_SESSION['login_email'])){
							echo $_SESSION['login_email'];
						}
					 ?>" required>
					
					<!-- __________________________Login Password______________________ -->
					<input type="password" name="login_password" placeholder="password">
					
					<!-- ______________________________Login Button______________________ -->
					<input type="submit" name="login_bttn" value="Login"><br>
					<?php if(in_array("Incorrect Email or Password", $error_array)) { echo "Incorrect Email or Password<br>";} ?>
					<a href="#" id="signup" class="signup">Need an account? Sign up here</a>
					<p>imran@a.a</p>
				</form><br>				
			</div>
			

			
			<div class="second" id="second">
				<!-- _______________________Sign up form ___________________________-->
				<form action="register.php" method="POST">
					<!-- ___________________Fisrt Name__________________ -->
					<input type="text" name="reg_fname" placeholder="First Name" value="<?php
						if(isset($_SESSION['reg_fname'])){
							echo $_SESSION['reg_fname'];
						}
					 	?>" required><br>

					 <?php if(in_array("First name must be between  2 and 25", $error_array)){
					 			echo "First name must be between  2 and 25";}
					 		if(in_array("Name can only be letters", $error_array)){
					 			echo "Name can only be letters";}
					 ?>
				
					
					
					<!-- _______________________Last Name_____________________________________ -->
					<br><input type="text" name="reg_lname" placeholder="Last Name"  value="<?php
							if(isset($_SESSION['reg_lname'])){
								echo $_SESSION['reg_lname'];
							}						
					 		?>" required><br>
					 		
					 	<?php if(in_array("Last name must be between  2 and 25 only", $error_array)){
					 				echo "Last name must be between  2 and 25 only";
					 			}
					 			if(in_array("Name can only be letters only", $error_array)){
					 				echo "Name can only be letters only";
					 			}
					 	?>
					

					
					<!-- _______________________Email_____________________________________ -->
					<br><input type="email" name="reg_email" placeholder="Email"  value="<?php
						if(isset($_SESSION['reg_email'])){
							echo $_SESSION['reg_email'];
						}
					?>" required><br>
					<?php if(in_array("Invalid email format", $error_array)){
					 			echo "Invalid email format";
					 		}
					 		if(in_array("Email already in use", $error_array)){
					 			echo "Email already in use";
					 		}		 		
					?>
					 

					
					  <!-- _______________________Email 2_____________________________________ -->
					<br><input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
						if(isset($_SESSION['reg_email2'])){
							echo $_SESSION['reg_email2'];
						}
					 ?>" required><br>
					 <?php if(in_array("Email did not match", $error_array)){
					 			echo "Email did not match";
					 		}
					 ?>
					

					<!-- _______________________Password_____________________________________ -->
					<br><input type="password" name="reg_password" placeholder="Enter Password" value="<?php
						if(isset($_SESSION['reg_password'])){
							echo $_SESSION['reg_password'];
						}
					 ?>" required><br><br>
					
					<!-- _______________________Password 2_____________________________________ -->
					<input type="password" name="reg_password2" placeholder="Confirm Password" value="<?php
						if(isset($_SESSION['reg_password2'])){
							echo $_SESSION['reg_password2'];
						}
					 ?>"  required><br>
					 <?php if(in_array("Password must be same", $error_array)){
					 			echo "Password must be same";
					 		}
					 		if(in_array("password must be between 4 and 25", $error_array)){
					 			echo "password must be between 4 and 25";
					 		}
					 		if(in_array("Password can only be letters and numbers", $error_array)){
					 			echo "Password can only be letters and numbers";
					 		}

					?>

					 <!-- _______________________Submit Button_____________________________________ -->
					<br><br><input type="submit" name="reg_bttn" value="Register">
					 <?php if(in_array("Account Created Successfully", $error_array)) {
					 			echo "<br><h2 style='color:blue;'>Account Created Successfully</h2>";
					 		}
					 ?><br>
					<a href="#" id="signin" class="signin">Already have an account? Sign in here</a>
				</form>
				
			</div>
			
		</div>
	</div>

</body>
</html>