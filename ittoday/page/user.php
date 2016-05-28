<?php
	if(empty($_SESSION['ittoday_user'])){
		header("location: ./login");
	}
	$user = mysqli_query($conn, "SELECT * FROM ittoday WHERE email = '".$_SESSION['ittoday_user']."'");
	$info = mysqli_fetch_assoc($user);
	
	if(isset($_POST['registrasi'])){
		$id = $info['id_user'];
		$nama=$_POST['nama_lengkap'];
		$hp = $_POST['no_hp'];
		$alamat = $_POST['alamat'];
		$identitas = $_POST['identitas'];
		$institusi = $_POST['institusi'];
		$tahun_masuk = $_POST['tahun_masuk'];

		$update = mysqli_query($conn, "UPDATE ittoday SET nama_lengkap='$nama', no_hp='$hp', alamat='$alamat', no_identitas='$identitas', institusi='$institusi',tahun_masuk='$tahun_masuk' WHERE id_user='$id'") or die(mysqli_eror());
		if($update){
			echo "<script>alert('Update berhasil')</script>";

		}else{
			echo "<script>alert('Update gagal')</script>";
		}
	}

?>    
		<section id="intro" class="intro-section page-section">
            <div class="container user-page">
                <div class="col-md-5 col-md-offset-1">
                	<?php 
						if($info['nama_lengkap']==NULL && $info['no_hp']==NULL && $info['alamat']==NULL && 
						$info['no_identitas']==NULL && $info['institusi']==NULL && $info['tahun_masuk']==NULL){
						$disabled = "disabled";
                	?>
                	<h2>Mohon Lengkapi Informasi Anda Terlebih Dahulu</h2>
                	<form id="registrasi2" action="" method="post">
						<input type="hidden" name="registrasi" value="1"/>
						<div class="form-group">
							<label for="username">Nama Lengkap</label><br/>
							<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required/>
						</div>
						<div class="form-group">
							<label for="password">Nomor Handphone</label><br/>
							<input type="number" class="form-control" name="no_hp" id="no_hp" required/>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat Saat Ini</label><br/>
							<input type="text" class="form-control" name="alamat" id="alamat" required/>
						</div>
						<div class="form-group">
							<label for="identitas">Nomor Identitas (Kartu Mahasiswa/KTP/SIM)</label><br/>
							<input type="text" class="form-control" name="identitas" id="identitas" required/>
						</div>
						<div class="form-group">
							<label for="institusi">Institusi</label><br/>
							<input type="text" class="form-control" name="institusi" id="institusi" required/>
						</div>
						<div class="form-group">
							<label for="tahun_masuk">Tahun Masuk</label><br/>
							<input type="number" class="form-control" name="tahun_masuk" id="tahun_masuk" required/>
						</div>
						<button type="submit" class="btn btn-danger" value="Proceed">Proceed</button><br><br>
					</form>
                	<?php 
						} else{ 
							$disabled = ""; 
					?>
                	<h2>Informasi Pendaftar</h2>        
					<table class="table">	
						<tr><td>Nama</td><td><?php echo $info['nama_lengkap'] ?></td></tr>
						<tr><td>No. HP</td><td><?php echo $info['no_hp'] ?></td></tr>
						<tr><td>Identitas</td><td><?php echo $info['no_identitas'] ?></td></tr>
						<tr><td>Institusi</td><td><?php echo $info['institusi'] ?></td></tr>
						<tr><td>Tahun Masuk</td><td><?php echo $info['tahun_masuk'] ?></td></tr>
						<tr><td>Alamat</td><td><?php echo $info['alamat'] ?></td></tr>
					</table>
                	<?php 
						} 
					?>
				</div>
				<div class="col-md-5 col-md-offset-1" hidden>
					<h2>PILIHAN ACARA</h2>
					<form id="pilihan_acara" method="post" >
						<input type="hidden" name="pilcar" value="<?php echo $info['id_user']; ?>"/>
						<div class="form-group">
							<?php if($disabled=="disabled") { ?>
								<label for="isi_dulu">
									Sebelum mendaftarkan diri pada salah satu acara, silakan lengakpi informasi diri Anda terlebih dahulu
								</label>
							<?php } ?>
							<label for="pilcar">Anda boleh memilih lebih dari 1 acara:</label>
							<h6>Jika masih bingung, Anda boleh langsung melewati tahapan ini</h6><br>
							<label><input type="checkbox" name="digishare" id="digishare" <?php echo $disabled ?>> Digital I-Share</label><br/>
							<script type="text/javascript">
								$('#digishare').click(function() {
									$('#digishare-set')[this.checked ? "show" : "hide"]();
								});
							</script>
							<fieldset id="digishare-set" hidden>
									<label for='ukuran_baju_ac'>Ukuran Baju</label><br/>
			                        <select id="ukuran_baju_ac" name="ukuran_baju_ac" class="form-control">
			                            <option>S</option>
			                            <option>M</option>
			                            <option>L</option>
			                            <option>XL</option>
			                            <option>XXL</option>
			                        </select><br>
									<label class="control-label">Upload Identitas (Kartu Mahasiswa/KTP)
									<h6>Maksimal 1 MB, format: .jpg atau .png</h6><br>
									<input id="ktm_digishare" type="file" name="ktm_ac" class="file">					
									<br/>
							</fieldset>
							<label><input type="checkbox" name="agrihack" id="agrihack" <?php echo $disabled ?>> Agrihack [Capture The Flag]</label><br/>
							<script type="text/javascript">
								$('#agrihack').click(function() {
									$('#agrihack-set')[this.checked ? "show" : "hide"]();
								});
							</script>
							<fieldset id="agrihack-set" hidden>
									<label for='ukuran_baju_ac'>Ukuran Baju</label><br/>
			                        <select id="ukuran_baju_ah" name="ukuran_baju_ah" class="form-control">
			                            <option>S</option>
			                            <option>M</option>
			                            <option>L</option>
			                            <option>XL</option>
			                            <option>XXL</option>
			                        </select><br>
									<label class="control-label">Upload Identitas (Kartu Mahasiswa/KTP)
									<h6>Maksimal 1 MB, format: .jpg atau .png</h6><br>
									<input id="ktm_agrihack" type="file" name="ktm_ah" class="file"><br>
							</fieldset>
							<label><input type="checkbox" name="igdc" id="igdc" <?php echo $disabled ?>> IPB Game Dev Competition</label><br/>
							<script type="text/javascript">
								$('#igdc').click(function() {
									$('#igdc-set')[this.checked ? "show" : "hide"]();
								});
							</script>
							<fieldset id="igdc-set" hidden> 
								<label for="teamname">Nama Tim</label><br/>
								<input type="text" class="form-control" name="nama_tim" id="nama_tim"/>
								<label for="teammate1">Nama Anggota 1</label><br/>
								<input type="text" class="form-control" name="anggota_1" id="anggota_1"/>
								<label for="teammate1_id">No Identitas Anggota 1</label><br/>
								<input type="text" class="form-control" name="id_anggota_1" id="id_anggota_1"/>
								<label for="teammate2">Nama Anggota 2</label><br/>
								<input type="text" class="form-control" name="anggota_2" id="anggota_2"/>
								<label for="teammate2_id">No Identitas Anggota 1</label><br/>
								<input type="text" class="form-control" name="id_anggota_2" id="id_anggota_2"/><br>
								<label class="control-label">Upload Identitas Tim (Kartu Mahasiswa/KTP)<br/>
								<h6>Maksimal 1MB, format: jadikan satu dalam bentuk PDF</h6><br/>
								<input id="ktm_agrihack" type="file" name="ktm_ah" class="file"><br>
							</fieldset>
							<label><input type="checkbox" name="isc" id="isc" <?php echo $disabled ?>> IPB Searching Competition</label><br/>
							<label><input type="checkbox" name="seminar" id="seminar" <?php echo $disabled ?>> Seminar IT</label><br/><br/>
							<button type="submit" class="btn btn-danger" value="Proceed" <?php echo $disabled ?>>Proceed</button><br><br>
						</div>
					</form>
				</div>
            </div>
		</section>

