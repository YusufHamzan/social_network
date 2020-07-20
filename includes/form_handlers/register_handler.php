<?php
  $lname = ""; 			// holds last name
	$em = "";				//for email
 	$em2 = ""; 				//confirm email
 	$password = ""; 		// for passord
 	$password2 = ""; 		// for password 2
 	$date = "";				// register date
 	$error_array = array(); 		// hold error array
 
	if(isset($_POST['reg_bttn'])){
 		//First Name
 		$fname = strip_tags($_POST['reg_fname']); //removes html tags if user  entered with tag
 		$fname = str_replace(" ", "", $fname);    // removes spaces
 		$fname = ucfirst(strtolower($fname)); //make allstring to lowercase then first character to Ucase
 		$_SESSION['reg_fname'] = $fname;
 		
 		//Last Name
 		$lname = strip_tags($_POST['reg_lname']); //removes html tags if user  entered with tag
 		$lname = str_replace(" ", "", $lname);    // removes spaces
 		$lname = ucfirst(strtolower($lname)); //make allstring to lowercase then first character to Ucase
 		$_SESSION['reg_lname'] = $lname;
 	
 	
 		//Email
 		$em = strip_tags($_POST['reg_email']); //removes html tags if user  entered with tag
 		$em = str_replace(" ", "", $em);    // removes spaces
 		$em = strtolower($em); //make allstring to lowercase then first character to Ucase
 		$_SESSION['reg_email'] = $em;
 	
 		//Email2
 		$em2 = strip_tags($_POST['reg_email2']); //removes html tags if user  entered with tag
 		$em2 = str_replace(" ", "", $em2);    // removes spaces
 		$em2 = strtolower($em2); //make allstring to lowercase then first character to Ucase
 		$_SESSION['reg_email2'] = $em2;
 	
 		//Password
 		$password = strip_tags($_POST['reg_password']); //removes html tags if user  entered with tag
 		$_SESSION['reg_password'] = $password;					//Password2
 		$password2 = strip_tags($_POST['reg_password2']); //removes html tags if user  entered with tag
 		$_SESSION['reg_password2'] = $password2;
 		
    $date = date('d-m-y');
 	
 		//_______________________first Name Validation_____________________________________
    if(preg_match('/[^A-Za-z]/', $fname)){  //First name only caontain A-Z, a-z
        array_push($error_array, "Name can only be letters");
        unset($_SESSION['reg_fname']);
    }

    if(strlen($fname) < 2 || strlen($fname) >25 ) { 
      array_push($error_array, "First name must be between  2 and 25"); 
    }
    
    //_______________________Last Name Validation_____________________________________
    if(preg_match('/[^A-Za-z]/', $lname)){  //First name only caontain A-Z, a-z
        array_push($error_array, "Name can only be letters only");
        unset($_SESSION['reg_lname']);
    }
    if(strlen($lname) > 25 || strlen($lname) < 2) { 
      array_push($error_array,"Last name must be between  2 and 25 only");
    }



    //___________________________email validation__________________________________
 		if($em == $em2){
 			if(filter_var($em, FILTER_VALIDATE_EMAIL)){        //The filter_var() function filters a.. 
  				$em = filter_var($em, FILTER_VALIDATE_EMAIL);	//..variable with the specified filter..
  																//..and returnes filtered var/email..
  																//..If doesn't match, returns falls.
  				$em_check = mysqli_query($con, "SELECT Email FROM usergeneral WHERE Email = '$em'");
  				$num_rows = mysqli_num_rows($em_check);
  				if($num_rows>0){ 
  					array_push($error_array, "Email already in use");
  					unset($_SESSION['reg_email']);
 					unset($_SESSION['reg_email2']);
  				}  

 			}													
 			else{	
 				array_push($error_array, "Invalid email format");
 				unset($_SESSION['reg_email']);
 				unset($_SESSION['reg_email2']);
 			}
 		}
 		else{	
 			array_push($error_array,"Email did not match");
 			unset($_SESSION['reg_email2']);
 		}

  		
    //____________________password validation__________________________
 		if($password != $password2) {
 			array_push($error_array, "Password must be same");
 			unset($_SESSION['reg_password']);
 			unset($_SESSION['reg_password2']);
 		}
 		else {
 			if(preg_match('/[^A-Za-z0-9]/', $password)){  //password only caontain A-Z, a-z, 0-9
 				array_push($error_array, "Password can only be letters and numbers");
 				unset($_SESSION['reg_password']);
 				unset($_SESSION['reg_password2']);
 			}
 		}
 		if(strlen($password) > 25 || strlen($password) < 4) {
 			array_push($error_array, "password must be between 4 and 25");
 		}

 		if(empty($error_array)){
 			$password = md5($password); //Encrypt password
 			//Gnererate Username
 			$username = strtolower($fname)."".strtolower($lname);
 			$username_check = mysqli_query($con, "SELECT U_name FROM usergeneral WHERE U_name = '$username' ");
 			$i=0; 			
 			
 			while(mysqli_num_rows($username_check) != 0){
 				$i++;
 				$username = strtolower($fname)."".strtolower($lname); 
 				$username = $username."".$i;
 				$username_check = mysqli_query($con, "SELECT U_name FROM usergeneral WHERE U_name = '$username' ");
 				
 			}	
 			$user_closed ='no';
 			$profile_pic = 'assets/pictures/propfile_pics/defaults/man.png';
 			$sql = " INSERT INTO usergeneral VALUES('$username','$password','$fname','$lname','','','','','$em','$profile_pic', '','$date','','','','','','$user_closed') ";
 			
 			$query_insert = mysqli_query($con, $sql);
 			if($query_insert){ 
        //session_destroy();
        array_push($error_array,"Account Created Successfully");
        session_destroy();
      }
 			else { echo " Failed to create";}

 		}
 	}
?>