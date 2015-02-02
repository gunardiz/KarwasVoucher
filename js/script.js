$(function() {

			// POST handler
			var postFile	=	'bin/login.php';
		
            $(document).mouseup(function() {
				$("#loginform").mouseup(function() {
					return false
				});
				
				$("a.close").click(function(e){
					e.preventDefault();
					$("#loginform").hide();
                    $(".lock").fadeIn();
				});
				
                if ($("#loginform").is(":hidden"))
                {
                    $(".lock").fadeOut();
                } else {
                    $(".lock").fadeIn();
                }				
				$("#loginform").toggle();
            });
             			
			
			$("form#signin").submit(function() {
				
				//Validate the Username field if it's blank
	  			var username = $("input#username").val();
				if (username == "") {
					$('#message').html("Masukkan username Anda");
      				$("#message").hide().fadeIn(1500);
      				$("input#username").focus();
      				return false;
    			}
    			
    			
    			//Validate the Password field if it's blank
				var password = $("input#password").val();
				if (password == "") {
					$('#message').html("Masukkan password Anda");
      				$("#message").hide().fadeIn(1500);
      				$("input#password").focus();
      				return false;
    			}
							
				
				$.post(postFile, { usernamePost: username, passwordPost: password }, function(data) {
					if(data =='admin') {
						//If return data is true, it's mean username and password are correct
						
						//The distance in pixel that the form will move from original location
            			var distance = 10;
            			
            			//The time that the form take to animate
            			var time = 500;
            			
            			// This will hold our timer
						var myTimer = {};

                		$("#loginform").animate({
                    		marginTop: '-='+ distance +'px',
                    		opacity: 0
                		}, time, 'swing', function () {
							$("#loginform").hide();
                		});		
 						
 						// Set the timer for 1 seconds
						myTimer = $.timer(1000,function() {
							window.location='admin/indexadmin.html';
						});
					} 
					else if (data=='manajerhr')
					 {
						//If return data is true, it's mean username and password are correct
						
						//The distance in pixel that the form will move from original location
            			var distance = 10;
            			
            			//The time that the form take to animate
            			var time = 500;
            			
            			// This will hold our timer
						var myTimer = {};

                		$("#loginform").animate({
                    		marginTop: '-='+ distance +'px',
                    		opacity: 0
                		}, time, 'swing', function () {
							$("#loginform").hide();
                		});		
 						
 						// Set the timer for 1 seconds
						myTimer = $.timer(1000,function() {
							window.location='executive/';
						});
					} 
					else if (data=='omanajer')
					 {
						//If return data is true, it's mean username and password are correct
						
						//The distance in pixel that the form will move from original location
            			var distance = 10;
            			
            			//The time that the form take to animate
            			var time = 500;
            			
            			// This will hold our timer
						var myTimer = {};

                		$("#loginform").animate({
                    		marginTop: '-='+ distance +'px',
                    		opacity: 0
                		}, time, 'swing', function () {
							$("#loginform").hide();
                		});		
 						
 						// Set the timer for 1 seconds
						myTimer = $.timer(1000,function() {
							window.location='admin/indexom.html';
						});
					} 
					else {
						$("#message").html("Username atau Password salah");
						$("#message").css({color:"red"});
      					$("#message").hide().fadeIn(1500);
      					$("input#username").focus();
					}
				}, "json");
								
    			return false;
			});
			
			// This is example of other button
			$("input#cancel_submit").click(function(e) {
					$("#loginform").hide();
                    $(".lock").fadeIn();
			});			

});
