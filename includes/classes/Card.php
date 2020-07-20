<?php
class Card {
	private $str;
	private $image;
	private $name;
	private $date_time;
	private $body;
	private $added_by;
	private $f_l_name;
	private $user_to;

	private $like = '';
	private $comment = '';
	private $share = '';

	public function __construct($image, $added_by, $f_l_name, $date_time, $body,$user_to) {
		$this->image = $image;		
		$this->date_time = $date_time;
		$this->body = $body;
		$this->added_by = $added_by;
		$this->f_l_name = $f_l_name;
		$this->$user_to = $user_to;
		// $this->user_to =$user_to;

	}

	public function getCard(){
		$str = "<div class='card shadow p-1 bg-white postcard' >							
					<div class='card-head'>
						<div class='profile_pic ss'>							
							<img style='height: 50px; width: 50px; border: 1px solid grey;' src='$this->image'  alt='pic' class='rounded-circle'>
						</div>

						<div class='name_date_time ss'>
							<div class='added_by'>
								<a href='$this->added_by'>$this->f_l_name</a>
							</div>							
									
							<div class='date_time'>
								<small>$this->date_time</small>									 	
							</div>
							
						</div>
						<a href='#' id='icon_3dot'><ion-icon name='ellipsis-vertical-outline'></ion-icon></a>
					</div>							
					<div class='card-body'> $this->body 
					</div>
					<div class='footer-card d-flex justify-content-between align-items-center pl-3 pr-3'>
						<a href='#'>Like</a>
						<a href='#'>Comment</a>
						<a href='#'>Share</a>
					</div>						
				 </div>
				";
				return $str;
	}
}
?>

