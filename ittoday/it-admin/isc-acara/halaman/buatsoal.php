	<?php
		$count = mysqli_fetch_array(mysqli_query($conn, "SELECT Count(*) as n FROM isc_soal"));

		include "php/submitsoal.php";
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<li class="active">Buat Soal</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Buat Soal</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-newspaper-o"></i> Membuat soal baru (<?php echo $count['n']; ?>/120)
					</div>
					<div class="panel-body">
						<?php if($count['n']!=120) { ?>
						<form action="" method="post" style="max-width:90%;margin-left:auto;margin-right:auto;">
							<div class="form-group">
								<!-- <label for="nosoal">No Soal: </label> -->
								<select class="selectpicker" name="nosoal" data-show-subtext="true" data-live-search="true" data-size="11">
									<optgroup label="Sesi 1">
									<?php 
										for($i = 1; $i<=60; $i++){
											$tes = mysqli_query($conn, "SELECT * FROM isc_soal WHERE no_soal=$i");
											if(mysqli_num_rows($tes) == 0){
												if($i < 10) $num = "0".$i;
												else $num = $i;
												echo '<option value='.$i.' data-subtext="Sesi 1"> No. '.$num.'</option>';
											}
										}
									?>
									</optgroup>
									<optgroup label="Sesi 2">
									<?php 
										for(; $i<=120; $i++){
											$tes = mysqli_query($conn, "SELECT * FROM isc_soal WHERE no_soal=$i");
											if(mysqli_num_rows($tes) == 0){
												if(($i-60) < 10) $num = "0".($i-60);
												else $num = $i-60;
												echo '<option value='.$i.' data-subtext="Sesi 2"> No. '.$num.'</option>';
											}
										}
									?>
									</optgroup>
								</select>
							</div><hr>
							<div class="form-group">
								<label for="pertanyaan">Pertanyaan</label>
								<!-- <input type="text" name="pertanyaan" id="que" placeholder="pertanyaan" class="form-control" required/> -->
								<textarea name="pertanyaan" id="que" class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label for="jawaban">Jawaban</label>
								<div class="alert alert-info" style="padding:2px 1px 2px 1px"><i class="fa fa-info-circle fa-2x"></i> (<i>Case-Insensitive</i>) Pisahkan semua kemungkinan jawaban dengan "<u>titik-koma (<i>semicolon</i>) TANPA SPASI</u>".</div>
								<input type="text" name="jawaban" id="ans" placeholder="Contoh: RAM;Random Access Memory;Random-access Memory;Memori Akses Acak" class="form-control" required/>
							</div>
							<div class="form-group">
								<label for="source">Sumber Link</label>
								<input type="text" name="source" id="sou" placeholder="Link sumber halaman terkait pertanyaan" class="form-control" required/>
							</div>
							<div class="form-group">
								<input type="submit" name="btn_submit" class="btn btn-primary" value="Submit"/>
							</div>
						</form>
						<?php }else{ echo "<div class='alert alert-warning'>Semua soal sudah dibuat</div>"; } ?>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script>
	    // Replace the <textarea id="que"> with a CKEditor
	    // instance, using default configuration.
	    CKEDITOR.replace( 'que' );
	</script>
