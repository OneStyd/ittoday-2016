<?php
	ob_start();
	session_start();
	session_regenerate_id();

	if($_SERVER['SERVER_PORT'] !== 443 && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')) {
  		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}

	include "connect_adm.php";

	if(empty($_SESSION[$unique])){
		header("location: login.php?returnURL=".urlencode($_SERVER['REQUEST_URI'])."");
	}else{
		if($_SESSION['last_activity'] < time()-$_SESSION['expire_time']) { //have we expired?
		    //redirect to logout.php
		    header("Location: logout.php?returnURL=".urlencode($_SERVER['REQUEST_URI']).""); 
		}else{ //if we haven't expired:
		    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
		}
	}
	if(isset($_SESSION[$unique]) && $_SESSION[$unique]==19){
		header("location: isc-acara/");
	}
	if(isset($_GET['user'])){
		$inclusion = "../";
	//}else{
		$inclusion = "";
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard &#187; Admin - IT Today IPB 2016</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span style="color: #ffc7c7;">IT Today </span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<!-- <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li> -->
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
<?php 
	$isActive = array();
	for($i=0; $i < 7; $i++){
			$isActive[$i] = "";
	}
	if(empty($_GET['page'])){
		$isActive[0] = "active";
	}else if(!empty($_GET['page'])){
		if($_GET['page'] === "user"){
			$isActive[1]="active";
		}
		if($_GET['page'] === "isc"){
			if(empty($_GET['presensi']))
				$isActive[2]="active";
			else
				$isActive[7]="active";
		}
		if($_GET['page'] === "igdc"){
			if(empty($_GET['presensi']))
				$isActive[3]="active";
			else
				$isActive[8]="active";
		}
		if($_GET['page'] === "digishare"){
			$isActive[4]="active";
		}
		if($_GET['page'] === "agrihack"){
			$isActive[5]="active";
		}
		if($_GET['page'] === "seminar"){
			if(empty($_GET['presensi']))
				$isActive[6]="active";
			else
				$isActive[9]="active";
		}
	}


?>

		<ul class="nav menu">
			<li class="<?php echo $isActive[0] ?>"><a href="./"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="<?php echo $isActive[1] ?>"><a href="user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Data User</a></li>
			<li class="parent">
				<a data-toggle="collapse" href="#data-lomba">
					<span><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Informasi Acara 
				</a>
				<?php 
				$page = array("isc", "igdc", "digishare", "agrihack", "seminar");
				if (isset($_GET['page']) && (in_array($_GET['page'], $page))){ ?>
				<ul class="children collapse in" id="data-lomba">
				<?php }else{ ?>
				<ul class="children collapse in" id="data-lomba">
				<?php } ?>
					<li class="<?php echo $isActive[2] ?>"><a href="isc"><svg class="glyph stroked notepad"><use xlink:href="#stroked-notepad"></use></svg> Data ISC</a></li>
					<li class="<?php echo $isActive[3] ?>"><a href="igdc"><svg class="glyph stroked notepad"><use xlink:href="#stroked-notepad"></use></svg> Data IGDC</a></li>
					<li class="<?php echo $isActive[5] ?>"><a href="agrihack"><svg class="glyph stroked notepad"><use xlink:href="#stroked-notepad"></use></svg> Data Agrihack</a></li>
					<li class="<?php echo $isActive[6] ?>"><a href="seminar"><svg class="glyph stroked notepad"><use xlink:href="#stroked-notepad"></use></svg> Data Seminar</a></li>
				</ul>
			</li>
			<li class="parent">
				<a data-toggle="collapse" href="#data-lomba">
					<span><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Presensi Acara 
				</a>
				<ul class="children collapse in" id="data-lomba">
					<li class="<?php echo $isActive[7] ?>"><a href="isc?presensi=1"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Presensi ISC</a></li>
					<li class="<?php echo $isActive[8] ?>"><a href="igdc?presensi=1"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Presensi IGDC</a></li>
					<li class="<?php echo $isActive[9] ?>"><a href="seminar?presensi=1"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Presensi Seminar</a></li>
				</ul>
			</li>
		</ul>

	</div><!--/.sidebar-->
		
	<!-- Page Section -->
	<?php
		if(empty($_GET['page'])){
			include "page/dashboard.php";
		}
		else if(isset($_GET['page'])){
			$page = $_GET['page'];
			if(include "page/data-".$page.".php");
			else{
				header("location: ./");
			}
		}
	?>

	<script src="js/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.js"></script>
   	<script src="js/bootstrap-table-export.js"></script>
	<script src="js/tableExport.js"></script>
	<!-- <script src="js/xlsx.core.min.js"></script>
	<script type="text/javascript" src="js/Blob.js"></script>
	<script type="text/javascript" src="js/FileSaver.js"></script>
	<script type="text/javascript" src="js/Export2Excel.js"></script> -->

	<script>
		// function doit() {export_table_to_excel('tablesa');  }
	</script>

	<script>
		$('#calendar').datepicker({
		});

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
	<script>
		$(document).ready(function(){
			$('#statusIGDC').html('<i class="fa fa-times-circle-o fa-2x"></i>&nbsp;(Belum Bayar)');
			$('#statusISC').html('<i class="fa fa-times-circle-o fa-2x"></i>&nbsp;(Belum Bayar)');
			$('#statusDIS').html('<i class="fa fa-times-circle-o fa-2x"></i>&nbsp;(Belum Bayar)');
			$('#statusAH').html('<i class="fa fa-times-circle-o fa-2x"></i>&nbsp;(Belum Bayar)');
			$('#statusSIT').html('<i class="fa fa-times-circle-o fa-2x"></i>&nbsp;(Belum Bayar)');
		})
	</script>

	<script>
		function changeStatusIGDC(id_user, status){
			var yakin = confirm("Ubah Status Bayar?");

			if(yakin){
				$.ajax({
					url: "ubahstatusbayar.php",
					type: "POST",
					data: {id_user: id_user, status: status, acara: 'igdc'},
					success:function(data){
						if(data==""){
							$('#successIGDC').html('<div class="alert alert-success">Ubah Status Pembayaran Berhasil!</div>');
							$('#statusIGDC').html('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)');
						}else if(data=="."){
							window.location.hash = '#keikutsertaan';
    						window.location.reload(true);
						}else{
							$('#successIGDC').html('<div class="alert alert-danger">Gagal :(</div>');
						}
					}
				});
			}
		}	
		function changeStatusISC(id_user, status){
			var yakin = confirm("Ubah Status Bayar?");

			if(yakin){
				$.ajax({
					url: "ubahstatusbayar.php",
					type: "POST",
					data: {id_user: id_user, status: status, acara: 'isc'},
					success:function(data){
						if(data==""){
							$('#successISC').html('<div class="alert alert-success">Ubah Status Pembayaran Berhasil!</div>');
							$('#statusISC').html('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)');
						}else if(data=="."){
							window.location.hash = '#keikutsertaan';
    						window.location.reload(true);
						}else{
							$('#successISC').html('<div class="alert alert-danger">Gagal :(</div>');
						}
					}
				});
			}
		}	
		function changeStatusDIS(id_user, status){
			var yakin = confirm("Ubah Status Bayar?");

			if(yakin){
				$.ajax({
					url: "ubahstatusbayar.php",
					type: "POST",
					data: {id_user: id_user, status: status, acara: 'dis'},
					success:function(data){
						if(data==""){
							$('#successDIS').html('<div class="alert alert-success">Ubah Status Pembayaran Berhasil!</div>');
							$('#statusDIS').html('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)');
						}else if(data=="."){
							window.location.hash = '#keikutsertaan';
    						window.location.reload(true);
						}else{
							$('#successDIS').html('<div class="alert alert-danger">Gagal :(</div>');
						}
					}
				});
			}
		}
		function changeStatusAH(id_user, status){
			var yakin = confirm("Ubah Status Bayar?");

			if(yakin){
				$.ajax({
					url: "ubahstatusbayar.php",
					type: "POST",
					data: {id_user: id_user, status: status, acara: 'ah'},
					success:function(data){
						if(data==""){
							$('#successAH').html('<div class="alert alert-success">Ubah Status Pembayaran Berhasil!</div>');
							$('#statusAH').html('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)');
						}else if(data=="."){
							window.location.hash = '#keikutsertaan';
    						window.location.reload(true);
						}else{
							$('#successAH').html('<div class="alert alert-danger">Gagal :(</div>');
						}
					}
				});
			}
		}
		function changeInvalidAH(id_user, status){
			var yakin = confirm("Ubah Status Verifikasi?");

			if(yakin){
				$.ajax({
					url: "ubahvalid.php",
					type: "POST",
					data: {id_user: id_user, status: status},
					success:function(data){
						alert(data);
						window.location.hash='#keikutsertaan';
						window.location.reload(true);
					}
				});
			}
		}	
		function changeStatusSIT(id_user, status){
			var yakin = confirm("Ubah Status Bayar?");

			if(yakin){
				$.ajax({
					url: "ubahstatusbayar.php",
					type: "POST",
					data: {id_user: id_user, status: status, acara: 'sit'},
					success:function(data){
						if(data==""){
							$('#successSIT').html('<div class="alert alert-success">Ubah Status Pembayaran Berhasil!</div>');
							$('#statusSIT').html('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)');
						}else if(data=="."){
							window.location.hash = '#keikutsertaan';
    							window.location.reload(true);
						}else{
							$('#successSIT').html('<div class="alert alert-danger">Gagal :(</div>');
						}
					}
				});
			}
		}	
	</script>
</body>

</html>