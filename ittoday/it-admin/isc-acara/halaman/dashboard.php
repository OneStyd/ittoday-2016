	<?php
		$sesi1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM isc_waktu WHERE sesi = 1"));
		$sesi2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM isc_waktu WHERE sesi = 2"));	
			
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-home"></i> Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-clock-o"></i> Waktu Pelaksanaan
					</div>
					<div class="panel-body">
						 <div class="alert alert-info" style="padding:2px 1px 2px 1px"><i class="fa fa-2x fa-info-circle"></i> Format waktu: MM/DD/YYYY HH:mm:ss (Standar US)</div>
						<!-- .main -->
					    <div class="row">
					        <div class='col-md-6'>
					    		<h3> Sesi 1 </h3>
					            <div class="form-group">
					            	<label>Waktu Mulai</label>
					                <div class='input-group date' id='sesi1Awal'>
					                    <input type='text' class="form-control" id="awal1">
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					            <div class="form-group">
					            	<label>Waktu Selesai</label>
					                <div class='input-group date' id='sesi1Akhir'>
					                    <input type='text' class="form-control" id="akhir1">
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					            <div class="form-group">
					            	<input type="button" value="Simpan" class="btn btn-primary" id="simpansesi1"/>
					            </div>
					        </div>
					        <script type="text/javascript">
					            $(function () {
					                $('#sesi1Awal').datetimepicker({
					                	format: 'MM/DD/YYYY HH:mm:ss',
					                	defaultDate: "<?php echo date_format(date_create($sesi1['waktuMulai']), 'm/d/Y H:i:s'); ?>",
					                	sideBySide: true
					                });
					                $('#sesi1Akhir').datetimepicker({
					                	format: 'MM/DD/YYYY HH:mm:ss',
					                	defaultDate: "<?php echo date_format(date_create($sesi1['waktuSelesai']), 'm/d/Y H:i:s'); ?>",
					                	sideBySide: true
					                });
					                $("#sesi1Awal").on("dp.change", function (e) {
           								$('#sesi1Akhir').data("DateTimePicker").minDate(e.date);
        							});		
        							$("#sesi1Akhir").on("dp.change", function (e) {
           								$('#sesi1Awal').data("DateTimePicker").maxDate(e.date);
        							});					
					                $("#simpansesi1").click(function(){
					                	var mulai = $('#awal1').val();
					                	var selesai = $('#akhir1').val();

					                	var choice = confirm("Ubah waktu?");
					                	if(choice){
						                	$.ajax({
						                		url: "php/submitwaktu.php",
						                		type: "POST",
						                		data: {mulai: mulai, selesai: selesai, sesi: 1},
						                		success: function(data){
						                			alert(data);
						                			window.location.href=window.location.href;
						                		}
						                	});
					                	}
					                });
					            });

					        </script>
					        <div class='col-md-6'>
					        	<h3> Sesi 2 </h3>
					            <div class="form-group">
					            	<label>Waktu Mulai</label>
					                <div class='input-group date' id='sesi2Awal'>
					                    <input type='text' class="form-control" id="awal2">
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					            <div class="form-group">
					            	<label>Waktu Selesai</label>
					                <div class='input-group date' id='sesi2Akhir'>
					                    <input type='text' class="form-control" id="akhir2">
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					            <div class="form-group">
					            	<input type="button" value="Simpan" class="btn btn-primary" id="simpansesi2"/>
					            </div>
					        </div>
					        <script type="text/javascript">
					            $(function () {
					                $('#sesi2Awal').datetimepicker({
					                	format: 'MM/DD/YYYY HH:mm:ss',
					                	defaultDate: "<?php echo date_format(date_create($sesi2['waktuMulai']), 'm/d/Y H:i:s'); ?>",
					                	sideBySide: true
					                });
					                $('#sesi2Akhir').datetimepicker({
					                	format: 'MM/DD/YYYY HH:mm:ss',
					                	defaultDate: "<?php echo date_format(date_create($sesi2['waktuSelesai']), 'm/d/Y H:i:s'); ?>",
					                	sideBySide: true
					                });
					                $("#sesi2Awal").on("dp.change", function (e) {
           								$('#sesi2Akhir').data("DateTimePicker").minDate(e.date);
        							});		
        							$("#sesi2Akhir").on("dp.change", function (e) {
           								$('#sesi2Awal').data("DateTimePicker").maxDate(e.date);
        							});		
					                $("#simpansesi2").click(function(){
					                	var mulai = $('#awal2').val();
					                	var selesai = $('#akhir2').val();

					                	var choice = confirm("Ubah waktu?");
					                	if(choice){
						                	$.ajax({
						                		url: "php/submitwaktu.php",
						                		type: "POST",
						                		data: {mulai: mulai, selesai: selesai, sesi: 2},
						                		success: function(data){
						                			alert(data);
						                			window.location.href=window.location.href;
						                		}
						                	});
					                	}
					                });
					            });
					        </script>
					    </div>
						<!-- /.main -->
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
