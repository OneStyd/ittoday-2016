	$("#login").click(function(event){
	      var email = $("#email").val();
	      var pass = $("#pass").val();

	      event.preventDefault();
	      	$("#loadImg").show();
	      $.ajax({
	        url: "./php/login.php",
	        type: "POST",
	        data: {email: email, pass: pass},
	        success: function(data){
	          $("#loadImg").hide();
	          if(data == 'wrongpass'){
	            $("#err_login").html("<div class='alert alert-warning alert-dismissible' style='padding-top:2px; padding-bottom:2px;'><i class='fa fa-warning'></i> Login gagal: Input password salah</div>");
	          }else if(data == 'usernotexist'){
	            $("#err_login").html("<div class='alert alert-warning alert-dismissible' style='padding-top:2px; padding-bottom:2px;'><i class='fa fa-warning'></i> Login gagal: Anda tidak terdaftar/belum melunasi pembayaran</div>");
	          }else if(data == 'noinput'){
	            $("#err_login").html("<div class='alert alert-danger alert-dismissible' style='padding-top:2px; padding-bottom:2px;'><i class='fa fa-warning'></i> Login gagal: Mohon inputkan semua field yang ada</div>");
	          }else{
	          	$("#loadImg").show();
	          	$("#err_login").html("<div class='alert alert-success alert-dismissible' style='padding-top:2px; padding-bottom:2px;'><i class='fa fa-thumbs-up'></i> Login sukses: selamat datang "+ data +" :)</div>");
	            window.setTimeout(function(){
			        // Move to a new location or you can do something else
			        window.location.href = "home";

			    }, 1500);
	          }
	        }
	      });
	  });