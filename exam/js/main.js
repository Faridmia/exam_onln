$(function(){
	// user registration...........
	$("#regSubmit").click(function(){
		var u_name     = $("#u_name").val();
		var u_username = $("#u_username").val();
		var u_email    = $("#u_email").val();
		var u_password = $("#u_password").val();

        var dataString = 'u_name='+u_name+'&u_username='+u_username+'&u_email='+u_email+'&u_password='+u_password;
		$.ajax({
			type: "POST",
			url: "getregister.php",
			data: dataString,
			success: function(data){
				$("#success").html(data);
			}
		});
		return false; 
	});

	// login...........
	$("#loginsubmit").click(function(){
		var u_email    = $("#u_email").val();
		var u_password = $("#u_password").val();

        var dataString1 ='u_email='+u_email+'&u_password='+u_password;
		$.ajax({
			type: "POST",
			url: "getlogin.php",
			data: dataString1,
			success: function(data){
				if ($.trim(data) == "empty") {
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					},3000);
					// $(".error").hide();
					// $(".Disable").hide();
				}
				else if($.trim(data) == "Disable"){
					// $(".empty").hide();
					// $(".error").hide();
					$(".disable").show();
					setTimeout(function(){
						$(".disable").fadeOut();
					},3000);

				}
				else if($.trim(data) == "error"){
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					},3000);
					// $(".empty").hide();
					// $(".Disable").hide();

				}
				else{
					window.location = "exam.php";

				}
				
			}
		});
		return false; 
	});

	$("#updateprofile").click(function(){
		var u_name     = $("#u_name").val();
		var u_username = $("#u_username").val();
		var u_email    = $("#u_email").val();

        var dataString = 'u_name='+u_name+'&u_username='+u_username+'&u_email='+u_email;
		$.ajax({
			type: "POST",
			url: "profileupdate.php",
			data: dataString,
			success: function(data){
				$("#success").html(data);
				setTimeout(function(){
						$("#success").fadeOut();
				},3000);
			}
		});
		return false; 
	});


});