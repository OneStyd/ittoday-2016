<?php
	include "connect.php";
	include "login.php";

	if(!buat_session()){
		echo "belum login";
	}else{
		$info = get_user_info($_SESSION['ittoday_user']);
	}

	if(isset($_POST['skip'])){
		header("location: index.php");
	}
?>

<html>
<head>
	<title>IT Today 2016 - Grow Indonesia's Future with Technology</title>
	<link href="./css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="./css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
	
	<!-- javascript -->
	<script src="./js/bootstrap.js" type="text/javascript"></script>
	<script src="./js/jquery.min.js" type="text/javascript"></script>
 	<script src="./js/bootstrap.min.js" type="text/javascript"></script>
 	<!-- end javascript -->
</head>
<body>
	<div class="container">
		<div class="col-md-4">
		<h3>PILIHAN ACARA</h3>
		<form id="pilihan_acara" method="post" >
			<input type="hidden" name="pilcar" value="<?php echo $info['id_user']; ?>"/> <!-- tampilkan id pendaftar -->
			<div class="form-group">
				<label for="pilcar">Anda boleh memilih lebih dari 1 acara:</label><br/>
				<sub>Jika masih bingung, Anda boleh langsung melewati tahapan ini.</sub><br/><br/>
				<input type="checkbox" name="agricode" id="agricode"> Agricode [Competitive Prgramming] <br/>
				<script type="text/javascript">
					$('#agricode').click(function() {
					$('#agricode-set')[this.checked ? "show" : "hide"]();
				});
				</script>
				<div class="container"><div class="col-md-5">
				<fieldset id="agricode-set" hidden>
						<label for='ukuran_baju_ac'>Ukuran Baju</label><br/>
                        <select id="ukuran_baju_ac" name="ukuran_baju_ac" class="form-control">
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
						<br/><label class="control-label">Upload Identitas (Kartu Mahasiswa/KTP)</label><br/>
						<sub>Maksimal 1MB, format: .jpg atau .png</sub><br/><br/>
						<input id="ktm_agricode" type="file" name="ktm_ac" class="file">					
						<br/>
				</fieldset>
				</div></div>
				<input type="checkbox" name="agrihack" id="agrihack"> Agrihack [Capture The Flag]<br/>
				<script type="text/javascript">
					$('#agrihack').click(function() {
					$('#agrihack-set')[this.checked ? "show" : "hide"]();
				});
				</script>
				<div class="container"><div class="col-md-5">
				<fieldset id="agrihack-set" hidden>
						<label for='ukuran_baju_ac'>Ukuran Baju</label><br/>
                        <select id="ukuran_baju_ah" name="ukuran_baju_ah" class="form-control">
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
						<br/><label class="control-label">Upload Identitas (Kartu Mahasiswa/KTP)</label><br/>
						<sub>Maksimal 1MB, format: .jpg atau .png</sub><br/><br/>
						<input id="ktm_agrihack" type="file" name="ktm_ah" class="file">					
						<br/>
				</fieldset>
				</div></div>
				<input type="checkbox" name="igdc" id="igdc"> IPB Game Dev Competition<br/>
				<script type="text/javascript">
					$('#igdc').click(function() {
					$('#igdc-set')[this.checked ? "show" : "hide"]();
				});
				</script>
				<div class="container"><div class="col-md-5">
				<fieldset id="igdc-set" hidden> 
					<label for="teamname">Nama Tim</label><br/>
					<input type="text" class="form-control" name="nama_tim" id="nama_tim"/>
					<label for="teammate1">Nama Anggota 1</label><br/>
					<input type="text" class="form-control" name="anggota_1" id="anggota_1" />
					<label for="teammate1_id">No Identitas Anggota 1</label><br/>
					<input type="text" class="form-control" name="id_anggota_1" id="id_anggota_1" />
					<label for="teammate2">Nama Anggota 2</label><br/>
					<input type="text" class="form-control" name="anggota_2" id="anggota_2" />
					<label for="teammate2_id">No Identitas Anggota 1</label><br/>
					<input type="text" class="form-control" name="id_anggota_2" id="id_anggota_2" />
					<br/><label class="control-label">Upload Identitas Tim (Kartu Mahasiswa/KTP)</label><br/>
						<sub>Maksimal 1MB, format: jadikan satu dalam bentuk PDF</sub><br/><br/>
						<input id="ktm_agrihack" type="file" name="ktm_ah" class="file">
					<br/>
				</fieldset>
				</div></div>
				<input type="checkbox" name="isc" id="isc"> IPB Searching Competition<br/>
				<input type="checkbox" name="seminar" id="seminar"> Seminar IT<br/>
				<br/>
				<button type="submit" class="btn btn-danger" value="Proceed">Proceed</button>
				<button type="submit" class="btn btn-danger" name="skip" value="1">Lewati</button>

			</div>
		</form>
		
		</div>
	</div>

</body>
</html>