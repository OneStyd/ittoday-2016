<?php
	session_start();
	session_regenerate_id();
	
	if($_SERVER['SERVER_PORT'] !== 443 && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')) {
  		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}

	include "connect_adm.php";

	if(isset($_SESSION[$unique])){
		if(empty($_GET['returnURL']))
   			header("location:./");
   		else
   			header("location: http://".$_SERVER['HTTP_HOST'].$_GET['returnURL']."");
  	}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login &#187; IT Today IPB 2016 | Grow's Indonesia Future With Technology</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"></use></svg> Admin IT Today Login</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div id="err_login"></div>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="user_id" id="user_id" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" id="pass" type="password" value="">
							</div>
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							<button type="submit" id="login" class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>

					<p style="padding:0 10px 10px 10px"><a href="../">&laquo; Kembali ke halaman awal</a></p>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	  $("#login").click(function(event){
	      var user_id = $("#user_id").val();
	      var pass = $("#pass").val();

	      event.preventDefault();
	      $.ajax({
	        url: "loginprocess.php",
	        type: "POST",
	        data: {user_id: user_id, pass: pass},
	        success: function(data){
	          if(data == 'wrongpass'){
	            //event.preventDefault();
	            $("#err_login").html("<div class='alert alert-warning alert-dismissible'>Invalid Login: Input password salah</div>");
	            // alert("wrongpass");
	          }else if(data == 'usernotexist'){
	            $("#err_login").html("<div class='alert alert-warning alert-dismissible'>Invalid Login: Input username salah</div>");
	          }else if(data == 'noinput'){
	            $("#err_login").html("<div class='alert alert-danger alert-dismissible'>Invalid Login: Mohon inputkan semua field yang ada</div>");
	          }else{
	          	$("#err_login").html("<div class='alert alert-success alert-dismissible'>Login valid: selamat datang " + user_id + ":)</div>");
	            window.setTimeout(function(){
			        // Move to a new location or you can do something else
			        window.location.href = window.location.href;

			    }, 1500);
	          }
	        }
	      });
	  });
	</script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
