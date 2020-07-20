<?php
	class Post {
		private $user_ob;
		private $con;
		 
		
		public function __construct($con, $user) {
			$this->con = $con;
			$this->user_ob = new User($con, $user);
		}

	

		public function submitPost($body, $user_to) {			
			$body = strip_tags($body);
			$body = mysqli_real_escape_string($this->con,$body);			
			$check_empty = preg_replace('/\s+/',' ',$body);
			
			if($check_empty != "") {

				
				// curretn date and time
				$date_added = date("Y-m-d H:i:s");
				
				// get username
				$added_by = $this->user_ob->getUserName();			

				//if user is on own profile
				if($user_to == $added_by) {
					$user_to == "none";
				}
				
				$sql = "INSERT INTO posts VALUES('','$body','$added_by','$user_to','$date_added','no','no','0')";	
				$query = mysqli_query($this->con,$sql);				
				$returned_id = mysqli_insert_id($this->con);			

				//insert notification

				// update post count
				$num_post = $this->user_ob->getNumPosts();
				$num_post++;
				$update_query = mysqli_query($this->con, "UPDATE usergeneral SET Posts = '$num_post' WHERE U_name = '$added_by'");

			}

		}
		public function loadPostsFriends() {
			$str = "";
			$data = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted = 'no'  ORDER BY id DESC");
			$row = mysqli_fetch_array($data);
			// $while_count = 2;
			
			
			while($row = mysqli_fetch_array($data)) {  						//$row = mysqli_fetch_array($data)
				
				$id = $row['id'];
				$body = $row['body'];
				$added_by = $row['added_by'];
				$date_time = $row['date_added'];

				//prepare user_to string even its not posted to the user
				if($row['user_to'] == "none") {
					$user_to = "";
				}
				else {
					$user_to_obj = new User($this->con, $row['user_to']);
					$user_to_name = $user_to_obj->getFirstAndLastName();
					$user_to = "<a href=' " . $row['user_to'] ." '> ". $user_to_name. "</a>";
				}

				//check user who posted has closed their account
				$added_by_obj = new User($this->con, $added_by);
				if($added_by_obj->isClosed()) {
					continue;
				}

				$user_details_query =  mysqli_query($this->con, "SELECT Name, Last_name, Photo FROM usergeneral WHERE U_name = '$added_by' ");
				$user_row = mysqli_fetch_array($user_details_query);
				$first_name = $user_row['Name'];
				$last_name = $user_row['Last_name'];
				$f_l_name = $first_name. ' '.$last_name;
				$profile_pic = $user_row['Photo'];
				
				
				$card = new Card($profile_pic, $added_by, $f_l_name, $date_time, $body, $user_to);
				$str = $card->getCard();
				echo $str;
				
			}

			
			
		}
	}
?>