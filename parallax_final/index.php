<?php
	include "author/connect.php";
	ob_start();
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>[Maintenance]</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>

    <link href='http://fonts.googleapis.com/css?family=Wellfleet' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Wellfleet' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>	
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911' rel='stylesheet' type='text/css'>
	
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

  

	<script>
		$(document).ready(function () {
		    $(document).on("scroll", onScroll);
		    
		    //smoothscroll
		    $('a[href^="#"]').on('click', function (e) {
		        e.preventDefault();
		        $(document).off("scroll");
		        
		        $('li').each(function () {
		            $(this).removeClass('active');
		        })
		        $(this).addClass('active');
		      
		        var target = this.hash,
		            menu = target;
		        $target = $(target);
		        $('html, body').stop().animate({
		            'scrollTop': $target.offset().top+2
		        }, 500, 'swing', function () {
		            window.location.hash = target;
		            $(document).on("scroll", onScroll);
		        });
		    });
		});

		function onScroll(event){
		    var scrollPos = $(document).scrollTop();
		    $('#myNavbar').each(function () {
		        var currLink = $(this);
		        var refElement = $(currLink.attr("href"));
		        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
		            $('#myNavbar a').removeClass("active");
		            currLink.addClass("active");
		        }
		        else{
		            currLink.removeClass("active");
		        }
		    });
		}

		$("#logo").hide();
		$(window).scroll(function() {
		    if ($(window).scrollTop() > 100) {
		        $("#logo").fadeIn("slow");
		    }
		    else {
		        $("#logo").fadeOut("fast");
		    }
		});

		$("#ittoday_logo").show();
		$(window).scroll(function() {
		    if ($(window).scrollTop() < 150) {
		        $("#ittoday_logo").fadeIn("slow");
		    }
		    else {
		        $("#ittoday_logo").fadeOut("slow");
		    }
		});
	</script>

	<!-- fungsi untuk naik turun -->
	<script type="text/javascript">
		$(document).ready(function() {
	    
		    function up() {
		        $("#logo-upsid-down").animate({top: "-=30"}, 1500, "swing", down);
		    }
		    function down() {
		        $("#logo-upsid-down").animate({top: "+=30"}, 1500, "swing", up);
		    }
		    down();
	});
	</script>
</head> 

<style>
.active > a{
	color:#fff;
}


</style>	

<body>
   
<div id="" style="z-index:6">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="" href="#"><img src="img/logo_putih.png" class="navbar-brand"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<?php if(empty($_GET['page'])){ ?>
        <li class=""><a href="#slide1" class="active">Home</a></li>
        <li><a href="#isc_section">ISC</a></li>
        <li><a href="#slide2">IGDC</a></li>
        <li><a href="#slide4">Agrihack</a></li>
        <li><a href="#slide5">Agricode</a></li>
        <li><a href="#slide6">Seminar IT</a></li>
        <? }else if(isset($_GET['page'])){ ?>
        <li class=""><a href="./" class="active">Home</a></li>
        <li><a href="./#isc_section">ISC</a></li>
        <li><a href="./#slide2">IGDC</a></li>
        <li><a href="./#slide4">Agrihack</a></li>
        <li><a href="./#slide5">Agricode</a></li>
        <li><a href="./#slide6">Seminar IT</a></li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<?php if(!cek_login()){ ?>
        <li><a href="login"><span class="glyphicon glyphicon-user"></span>Login/Register</a></li>
        <?php }else{ ?>
        <li><a href="user"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
        <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        <?php } ?>
        <!-- <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </div>
</nav>
</div>	
<!-- HEADER END-->   
<div id="" style="z-index:2">
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
	<!-- <div class="content"> -->

		<div style="background-color:#000; position: fixed; width:100%; font-family:'Wellfleet'; color: #fff; padding: 10px 0 5px 70px;margin-right:20px;margin-bottom: 20px;z-index:6;display:inline;">
            <a href="http://www.facebook.com/ipbittoday" target="_blank"><span data-hover="FB" ><img  src="img/icon/Facebook.png" style="width:25px"/></span></a>        
            <a href="http://twitter.com/IT_TodayIPB" target="_blank"><span data-hover="TW"><img  src="img/icon/Twitter.png" style="width:25px"/></span></a>
            <a href="http://bit.ly/1W0VaQP" target="_blank"><span font-color=white data-hover="YT"><img src="img/icon/Youtube.png" style="width:25px"/></span></a>
            <a href="http://instagram.com/ittoday_ipb" target="_blank"><span data-hover="IG"><img  src="img/icon/Instagram.png" style="width:25px"/></span></a>
			<?php if(isset($_GET['page'])) { ?>
			<!-- <div style="position:relative;float:right;padding-right: 100px; text-align: right; display:inline;"><a href="login" style="text-decoration:none;color:#fff;"><input type="button" value="Login/Register" class="tombol"/></a></div> -->
			<?php }else{ ?>
			<!-- <div style="position:relative;float:right;padding-right: 100px; text-align: right; display:inline;"><a href="login" style="text-decoration:none;color:#fff;"><input type="button" value="Login/Register" class="tombol"/></a></div> -->
			<? } ?>
		</div>
	</nav>
	<!-- </div> -->
</div>
<!-- SLIDES START -->   	
<?php
	if(empty($_GET['page'])){
		include "page/main.php";
	}else if(isset($_GET['page'])){
		$page = $_GET['page'];
		if(include "page/".$page.".php");
		else{
			header("location: 404");
		//	echo"<script>window.location.href='404'</script>";
		}
	}
?>
<!-- Script for ISC Section (Turn On/Off Light Effect)-->
<script type="text/javascript">

var isc = $('#isc_section').offset().top - window.innerHeight/2;
var next = $('#slide2').offset().top - (window.innerHeight/2)+10;
   $(window).scroll(function(){
    	var pTop = $('body').scrollTop();
    	console.log( pTop + ' - ' + isc );
    	console.log( pTop + ' - ' + next );
 		if( pTop > isc && pTop < next ){
	   		$('#isc_section').removeClass("isc_gelap").addClass("isc_terang");
	   		$('#isc_slide').css('z-index', '0');
		}else{
			$('#isc_section').removeClass("isc_terang").addClass("isc_gelap");
			$('#isc_slide').css('z-index', '-1');
			}
});

</script>
<script type="text/javascript" src="js/modal.js"></script>
<!-- Script for ISC Section -->
 
</body>
</html>
