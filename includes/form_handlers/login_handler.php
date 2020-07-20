<?php
	if(isset($_POST['login_bttn'])) {
		$em = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL);
		$_SESSION['login_email'] = $em ;
		$password = $_POST['login_password'];
		$password = md5($password);
		$sql_query_login = mysqli_query($con, "SELECT * FROM usergeneral WHERE Email = '$em' and password = '$password'");
		$rows = mysqli_num_rows($sql_query_login);
		if($rows == 1) {
			echo "matched 1 result. ";
			$sql_result = mysqli_fetch_array($sql_query_login);
			$username = $sql_result['U_name'];		

			$_SESSION['username'] = $username;
			
			header("Location: index.php"); 
			exit();
		}
		else{
			array_push($error_array, "Incorrect Email or Password");
		}

	}

?>