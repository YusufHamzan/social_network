 $(document).ready(function() {
 	
 	//on click register link hide login and show register
 	$("#signup").click(function() { 		
 		$("#first").slideUp("slow", function() {
 			$("#second").slideDown("slow"); 		
 		});
 	});


 	//on click sign in link to show login and hide reister
 	$("#signin").click(function() { 		
 		$("#second").slideUp("slow", function() {
 			$("#first").slideDown("slow"); 		
 		});
 	});

 });