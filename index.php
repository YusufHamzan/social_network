<?php
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Card.php");

if(isset($_POST['post_bttn'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_area'],"none");
}

?>


<!-- <div style="float: right; border:1px solid black; ">
			<button id="reg_bttn" onclick="document.location = 'register.php'">Register</button>
			<button id="login_bttn" onclick="document.location = 'register.php'">Login</button>
</div> -->

	<div class="container pt-3">
		<!-- left sidenav -->
		<div class="row my-2  ">				<!-- d-flex justify-content-centre align-item-centre -->
            <div class=" col-md-3 col-sm-12 my-2  d-none d-lg-block d-xl-block">
            	<div class="sticky">
					<div class= "card shadow bg-white rounded left_right_card">		 
						<div class="view view-cascade ">
							<img src= "<?php echo $user['Photo'];?>" class="card-img-top rounded-circle w-100">
						
		        			<div class="card-body card-body-cascade text-center a">
								<h4 class="card-title "><strong> <?php echo $user['Name']." ".$user['Last_Name']; ?> 	</strong></h4>
								<p>Batchelor</p>
								<h5 class="badge"><strong> <?php echo "Likes ".$user['Got_Likes']; ?> </strong></h5>
								<h5 class="badge"><strong> <?php echo "Posts ".$user['Posts']; ?> </strong></h5>
							</div>			
						
						</div>		
					</div>
				</div>
			</div>
	
		 	
	
			<!-- main content -->
			<div class="col-md-12 col-xs-12 col-lg-6 col-sm-12 my-2 main_content">
				<div class="card shadow p-1 bg-white posts_card " style="">
					<form class="post_form" action="index.php" method="POST">
						<textarea name="post_area" id="post_area" placeholder="Write a post"></textarea>
						<input type="submit" name="post_bttn" value="Post" id="post_bttn" class="btn btn-primary btn-sm"><hr>
					</form>           
				</div>
				<?php	                           
		           $post = new Post($con, $userLoggedIn);
		           $post->loadPostsFriends();	
	         	?>	         
	     	</div>
         	
         	
	         	<!-- right side nav --> <!-- d-none = hide all, d-lg-block = show at lg(large/pc)  -->
	         <div class="col-md-3 col-sm-12 my-2 d-none d-lg-block d-xl-block"> 
                <div class="sticky">
		         	<div class= "card shadow bg-white rounded  left_right_card ">		 
						<div class="view view-cascade ">
							<img src= "<?php echo $user['Photo'];?>" class="card-img-top rounded-circle">
						
		        			<div class="card-body card-body-cascade text-center a">
								<h4 class="card-title"><strong> <?php echo $user['Name']." ".$user['Last_Name']; ?> 	</strong></h4>
								<p>Batchelor</p>
								<h5 class="badge"><strong> <?php echo "Likes ".$user['Got_Likes']; ?> </strong></h5>
								<h5 class="badge"><strong> <?php echo "Posts ".$user['Posts']; ?> </strong></h5>
							</div>			
						
						</div>		
					</div>
				</div>
			</div>

			
         
        		
	</div>
	
</body >

</html>
