<?php
 class User {
 	private $user;
 	private $con;
 	public function __construct($con, $user){
	 	$this->con = $con;
	 	$user_details_query = mysqli_query($con, "SELECT * FROM usergeneral WHERE U_Name = '$user'");
	 	$this->user = mysqli_fetch_array($user_details_query);
 	}


 	public function getNumPosts(){
 		$username = $this->user['U_name'];
 		$query =  mysqli_query($this->con, "SELECT Posts FROM usergeneral WHERE U_name = '$username'");
 		$row = mysqli_fetch_array($query);
 		return $row['Posts'];
 		
 	}
 	
 	public function getUserName(){
 		return $this->user['U_name'];
 	}
 	
 	public function getFirstAndLastName() {
 		// $username = $this->user['U_name'];
 		// $query = mysqli_query($this->con, "SELECT Name, Last_Name FROM usergeneral WHERE U_Name = '$username'");
 		// $row =  mysqli_fetch_array($query);
 		// return $row['Name']." ".$row['Last_Name'];
 		return $this->user['Name']." ".$this->user['Last_Name'];
 	}

 	public function isClosed(){
 		$username = $this->user['U_name'];
 		$query =  mysqli_query($this->con, "SELECT user_closed FROM usergeneral WHERE U_name = '$username'");
 		$row = mysqli_fetch_array($query);

 		if($row['user_closed'] == 'yes'){
 			return true; 	
 		}
 		else{
 			return false;
 		}
 	}
 

 } 


?>