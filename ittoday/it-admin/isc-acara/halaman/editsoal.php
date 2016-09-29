	<?php 
		if($_GET['soal'] <= 60){
			$angka=1;
		}else{
			$angka=2;
		}

		$no_soal = $_GET['soal'];
		if($no_soal >= 60){
			$no_soal -= 60;
		}

		$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM isc_soal WHERE no_soal = ".$_GET['soal'].""));
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<li><a href="soal-sesi<?php echo $angka ?>">Soal Sesi <?php echo $angka ?></a></li>
				<li>Edit soal (no <?php echo $no_soal ?>)</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-pencil"></i> Edit Soal</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Soal Sesi <?php echo $angka ?> (no. <?php echo $no_soal ?>)
					</div>
					<div class="panel-body">
						<form method="post" style="max-width:90%;margin-left:auto;margin-right:auto;">
							<div class="form-group">
								<label for="pertanyaan">Pertanyaan</label>
								<!-- <input type="text" name="pertanyaan" id="que" placeholder="pertanyaan" class="form-control" required/> -->
								<textarea name="pertanyaan" id="que" class="form-control" required><?php echo $data['pertanyaan'] ?></textarea>
							</div>
							<div class="form-group">
								<label for="jawaban">Jawaban</label>
								<div class="alert alert-info" style="padding:2px 1px 2px 1px"><i class="fa fa-info-circle fa-2x"></i> (<i>Case-Insensitive</i>) Pisahkan semua kemungkinan jawaban dengan "<u>titik-koma (<i>semicolon</i>) TANPA SPASI</u>".</div>
								<input type="text" name="jawaban" id="ans" class="form-control" value="<?php echo $data['jawaban'] ?>" required/>
							</div>
							<div class="form-group">
								<label for="source">Sumber Link</label>
								<input type="text" name="source" id="sou" class="form-control" value="<?php echo $data['sumber'] ?>" required/>
							</div>
							<div class="form-group">
								<input type="button" name="cancel" class="btn btn-primary" value="Batal" onclick="window.location.href='soal-sesi<?php echo $angka ?>'"/>
								<input type="submit" name="edit" class="btn btn-primary" value="Edit"/>
							</div>
						</form>
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
	<?php
		if(isset($_POST['edit'])){
			$que = $_POST['pertanyaan'];
			$ans = $_POST['jawaban'];
			$sou = $_POST['source'];

			if (!preg_match("~^(?:f|ht)tps?://~i", $sou)) {
		        $sou = "http://" . $sou;
		    }

			$update_soal = mysqli_query($conn, "UPDATE isc_soal SET pertanyaan = '$que', jawaban = '$ans', sumber = '$sou' WHERE no_soal= ".$_GET['soal']."");

			if($update_soal){
				echo "<script>alert('Mengedit soal berhasil');window.location.href=window.location.href;</script>";
			}else{
				echo "<script>alert('".mysqli_error($conn)."');window.location.href=window.location.href;</script>";
			}
		}

	?>