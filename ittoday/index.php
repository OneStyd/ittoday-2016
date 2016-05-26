<?php
    include "author/connect.php";
    ob_start();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Website IT Today 2016">
		<meta name="author" content="Tim Website IT Today 2016">
		
		<!-- Title -->
		<title>IT Today IPB 2016 | Grow Indonesia's Future with Technology</title>
		<link rel="icon" href="img/favicon.ico">
		
		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="css/scrolling-nav.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
    
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<?php if(empty($_GET['page'])) { ?>
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<?php }else if(!empty($_GET['page'])){ ?>
	<body>
	<?php } ?>
		<!-- Navigation -->
		<?php if(!isset($_GET['page'])) { ?>
		<nav class="navbar navbar-inverse navbar-fixed-top top-nav-collapse" role="navigation">
		<? }else if(isset($_GET['page'])){  ?>
		<nav class="navbar navbar-inverse navbar-fixed-top top-nav-collapse" role="navigation" style="border-radius:0">
		<? } ?>

			<div class="container-fluid">
				<!-- Logo & Toggle Menu -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<?php if(empty($_GET['page'])){ ?>
						<a class="navbar-brand page-scroll" href="#page-top"><img class="navimg" src="img/logo_putih.png"></a>
					<?php }else if(!empty($_GET['page'])){ ?>
						<a class="navbar-brand page-scroll" href="./"><img class="navimg" src="img/logo_putih.png"></a>
					<?php } ?>
				</div>
				
				<!-- Nav Menu -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<?php if(empty($_GET['page'])){ ?>
							<li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
							<li><a class="page-scroll" href="#igdc-main">IGDC</a></li>
							<li><a class="page-scroll" href="#isc-main">ISC</a></li>
							<li><a class="page-scroll" href="#digishare-main">Digital I-Share</a></li>
							<li><a class="page-scroll" href="#agrihack-main">Agrihack</a></li>
							<li><a class="page-scroll" href="#seminar-main">Seminar IT</a></li>
						<?php }else if(!empty($_GET['page'])){ 
							if($_GET['page'] === "isc") $iscclass="active"; else $iscclass="";
							if($_GET['page'] === "igdc") $igdcclass="active"; else $igdclass="";
							if($_GET['page'] === "digishare") $disclass="active"; else $disclass="";
							if($_GET['page'] === "agrihack") $ahclass="active"; else $ahclass="";
							if($_GET['page'] === "seminar") $semclass="active"; else $semclass="";
							?>
							<li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
							<li class="<?php echo $igdcclass ?>"><a class="page-scroll" href="igdc">IGDC</a></li>
							<li class="<?php echo $iscclass ?>"><a class="page-scroll" href="isc">ISC</a></li>
							<li class="<?php echo $disclass ?>"><a class="page-scroll" href="digishare">Digital I-Share</a></li>
							<li class="<?php echo $ahclass ?>"><a class="page-scroll" href="agrihack">Agrihack</a></li>
							<li class="<?php echo $semclass ?>"><a class="page-scroll" href="seminar">Seminar IT</a></li>
						<?php } ?>
							<li class="hidden"><a class="page-scroll" href="#tanah-main">Seminar IT</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if(!cek_login()){ ?>
							<li><a href="login"><span class="glyphicon glyphicon-user"></span> Login/Register</a></li>
                        <?php }else{ ?>
							<li><a href="user"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
							<li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Section -->
		<?php
			if(empty($_GET['page'])){
				include "page/main.php";
			}
			else if(isset($_GET['page'])){
				$page = $_GET['page'];
				if(include "page/".$page.".php");
				else{
					header("location: 404");
				}
			}
		?>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		
		<!-- Scrolling Nav JavaScript -->
		<script src="js/jquery.easing.min.js"></script>
		<!-- Section JS -->
		<script src="js/jquery-sectionsnap.js"></script>
		<script src="js/scrolling-nav.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				function up() {
					$("#bawah").animate({bottom: "-=20"}, 1500, "swing", down);
				}
				function down() {
					$("#bawah").animate({bottom: "+=20"}, 1500, "swing", up);
				}
				down();
			});
		</script>
	</body>
</html>