<?php
	$user_sum = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM ittoday WHERE no_identitas IS NOT NULL"));
	$igdc_sum = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM igdc WHERE id_ketua <> 1"));
	$isc_sum = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM isc WHERE id_user <> 1"));
	$dis_sum = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM digishare"));
	$ah_sum = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM agrihack WHERE invalid = 0 OR invalid = 2"));
	$sem_sum = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM seminar"));
	$igdc_sum_b = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM igdc WHERE status_bayar_igdc = 1"));
	$isc_sum_b = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM isc WHERE status_bayar_isc = 1"));
	//$dis_sum = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM digishare"));
	$ah_sum_b = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM agrihack WHERE status_bayar_ah = 1"));
	$sem_sum_b = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) AS n FROM seminar WHERE status_bayar_sem = 1"));

?>	

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<div class="alert alert-success"><b>Update v3.1.1 (09/09/2016): Menu rekapitulasi kehadiran peserta IT Today 2016 (ISC, IGDC, &amp; Seminar)<b></div>
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $user_sum['n']; ?></div>
							<div class="text-muted"><a href="user">User Terdaftar</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked database"><use xlink:href="#stroked-database"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $isc_sum_b['n']; ?>/<?php echo $isc_sum['n']; ?></div>
							<div class="text-muted"><a href="isc">Pendaftar ISC</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked desktop-computer-and-mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $igdc_sum_b['n']; ?>/<?php echo $igdc_sum['n']; ?></div>
							<div class="text-muted"><a href="igdc">Pendaftar IGDC</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $ah_sum_b['n']; ?>/<?php echo $ah_sum['n']; ?></div>
							<div class="text-muted"><a href="agrihack">Pendaftar Agrihack</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked pen-tip"><use xlink:href="#stroked-pen-tip"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $sem_sum_b['n']; ?>/<?php echo $sem_sum['n']; ?></div>
							<div class="text-muted"><a href="seminar">Pendaftar Seminar</a></div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
