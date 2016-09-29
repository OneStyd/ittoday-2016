<?php 
	if(empty($_GET['id'])){
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<li class="active">Peringkat Peserta</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Rangking</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-line-chart"></i> Peringkat Peserta (<i>Real-Time</i><sub style="display:none;"> galat: 1.5 detik</sub> - Auto-refresh @10 Minutes)
					</div>
					<div class="panel-body" id="dataKu"></div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script type='text/javascript'>
		var table = $('#dataKu');

		// refresh every 5 seconds
		table.load("php/tablerank.php");

		var refresher = setInterval(function(){
			table.load("php/tablerank.php");
		}, 5000);
		
		setTimeout(function() {
			clearInterval(refresher);
			window.location.href=window.location.href;
		}, 600000);
	</script>

<?php
	}else if(isset($_GET['id'])){
		include "jawabanpeserta.php";
	}
?>