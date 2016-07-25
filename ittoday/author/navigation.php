	<?php if(empty($_GET['page'])) { ?>
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<?php }else if(!empty($_GET['page'])){ ?>
	<body>
	<?php } ?>
		<!-- Navigation -->
		<?php if(!isset($_GET['page'])) { ?>
		<nav class="navbar navbar-inverse navbar-fixed-top top-nav-collapse" role="navigation">
		<?php }else if(isset($_GET['page'])){  ?>
		<nav class="navbar navbar-inverse navbar-fixed-top top-nav-collapse" role="navigation" style="border-radius:0">
		<?php } ?>

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
							<li><a class="page-scroll" href="#news-main">News</a></li>
							<li><a class="page-scroll" href="#igdc-main">IGDC</a></li>
							<li><a class="page-scroll" href="#isc-main">ISC</a></li>
							<!-- <li><a class="page-scroll" href="#digishare-main">Digital I-Share</a></li> -->
							<li><a class="page-scroll" href="#agrihack-main">Agrihack</a></li>
							<li><a class="page-scroll" href="#seminar-main">Seminar IT</a></li>
						<?php }else if(!empty($_GET['page'])){ 
							if($_GET['page'] === "iscs") $iscclass="active"; else $iscclass="";
							if($_GET['page'] === "igdc") $igdcclass="active"; else $igdcclass="";
							if($_GET['page'] === "digishare") $disclass="active"; else $disclass="";
							if($_GET['page'] === "agrihack") $ahclass="active"; else $ahclass="";
							if($_GET['page'] === "seminar") $semclass="active"; else $semclass="";
							?>
							<li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
							<li><a class="page-scroll" href="http://blog.ittoday.web.id">News</a></li>
							<li class="<?php echo $igdcclass ?>"><a class="page-scroll" href="igdc">IGDC</a></li>
							<li class="<?php echo $iscclass ?>"><a class="page-scroll" href="iscs">ISC</a></li>
							<!-- <li class="<?php echo $disclass ?>"><a class="page-scroll" href="digishare">Digital I-Share</a></li> -->
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