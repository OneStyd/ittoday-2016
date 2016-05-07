<?php
	$user = mysqli_query($conn, "SELECT * FROM ittoday WHERE email = '".$_SESSION['ittoday_user']."'");
	$info = mysqli_fetch_assoc($user);
?>    



    <section id="intro" class="intro-section">
        <!-- <div class="container"> -->
            <div class="container" style="text-align:left">
                <div class="col-md-5 col-md-offset-1">
                	<?php if($info['nama_lengkap']==NULL && $info['no_hp']==NULL && $info['alamat']==NULL
                				&& $info['no_identitas']==NULL && $info['institusi']==NULL && $info['tahun_masuk']==NULL){
                		$disabled = "disabled";
                	?>
                	<h3>Mohon Lengkapi Informasi Anda Terlebih Dahulu</h3>
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
						<button type="submit" class="btn btn-danger" value="Proceed">Proceed</button>
                	<?php }else{ $disabled = ""; ?>
                		<h3>Informasi Pendaftar</h3>
                		<div class="col-md-12">               
						    <div class="row">
						        <div class="col-md-4">Nama</div>
						        <div class="col-md-8"><?php echo $info['nama_lengkap'] ?></div>
						    </div>
						    <div class="row">
						        <div class="col-md-4">No. Hape</div>
						        <div class="col-md-8"><?php echo $info['no_hp'] ?></div>
						    </div>
						    <div class="row">
						        <div class="col-md-4">Identitas</div>
						        <div class="col-md-8"><?php echo $info['no_identitas'] ?></div>
						    </div>
						    <div class="row">
						        <div class="col-md-4">Institusi</div>
						        <div class="col-md-8"><?php echo $info['institusi'] ?></div>
						    </div>
						    <div class="row">
						        <div class="col-md-4">Tahun Masuk</div>
						        <div class="col-md-8"><?php echo $info['tahun_masuk'] ?></div>
						    </div>
						    <div class="row">
						        <div class="col-md-4">Alamat</div>
						        <div class="col-md-8"><?php echo $info['alamat'] ?></div>
						    </div>
						</div>

                	<?php } ?>

				</div>
				<div class="col-md-5">
					<h3>PILIHAN ACARA</h3>
					<form id="pilihan_acara" method="post" >
						<input type="hidden" name="pilcar" value="<?php echo $info['id_user']; ?>"/> <!-- tampilkan id pendaftar -->
						<div class="form-group">
							<?php if($disabled=="disabled") { ?>
							<label for="isi_dulu">Sebelum mendaftarkan diri pada salah satu acara, silakan lengakpi informasi diri Anda terlebih dahulu</label><br/>
							<?php } ?>
							<label for="pilcar">Anda boleh memilih lebih dari 1 acara:</label><br/>
							<sub>Jika masih bingung, Anda boleh langsung melewati tahapan ini.</sub><br/><br/>
							<label><input type="checkbox" name="agricode" id="agricode" <?php echo $disabled ?>> Agricode [Competitive Prgramming] <br/></label>
							<script type="text/javascript">
								$('#agricode').click(function() {
								$('#agricode-set')[this.checked ? "show" : "hide"]();
							});
							</script>
							<div class=""><div class="">
							<fieldset id="agricode-set" hidden>
									<label for='ukuran_baju_ac'>Ukuran Baju</label><br/>
			                        <select id="ukuran_baju_ac" name="ukuran_baju_ac" class="form-control">
			                            <option>S</option>
			                            <option>M</option>
			                            <option>L</option>
			                            <option>XL</option>
			                            <option>XXL</option>
			                        </select>
									<br/><label class="control-label">Upload Identitas (Kartu Mahasiswa/KTP)<br/>
									<sub>Maksimal 1MB, format: .jpg atau .png</sub><br/><br/>
									<input id="ktm_agricode" type="file" name="ktm_ac" class="file">					
									<br/>
							</fieldset>
							</div></div>
							<label><input type="checkbox" name="agrihack" id="agrihack" <?php echo $disabled ?>> Agrihack [Capture The Flag]<br/></label>
							<script type="text/javascript">
								$('#agrihack').click(function() {
								$('#agrihack-set')[this.checked ? "show" : "hide"]();
							});
							</script>
							<div class=""><div class="">
							<fieldset id="agrihack-set" hidden>
									<label for='ukuran_baju_ac'>Ukuran Baju</label><br/>
			                        <select id="ukuran_baju_ah" name="ukuran_baju_ah" class="form-control">
			                            <option>S</option>
			                            <option>M</option>
			                            <option>L</option>
			                            <option>XL</option>
			                            <option>XXL</option>
			                        </select>
									<br/><label class="control-label">Upload Identitas (Kartu Mahasiswa/KTP)<br/>
									<sub>Maksimal 1MB, format: .jpg atau .png</sub><br/><br/>
									<input id="ktm_agrihack" type="file" name="ktm_ah" class="file">					
									<br/>
							</fieldset>
							</div></div>
							<label><input type="checkbox" name="igdc" id="igdc" <?php echo $disabled ?>> IPB Game Dev Competition<br/></label>
							<script type="text/javascript">
								$('#igdc').click(function() {
								$('#igdc-set')[this.checked ? "show" : "hide"]();
							});
							</script>
							<div class=""><div class="">
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
								<br/><label class="control-label">Upload Identitas Tim (Kartu Mahasiswa/KTP)<br/>
									<sub>Maksimal 1MB, format: jadikan satu dalam bentuk PDF</sub><br/><br/>
									<input id="ktm_agrihack" type="file" name="ktm_ah" class="file">
								<br/>
							</fieldset>
							</div></div>
							<label><input type="checkbox" name="isc" id="isc" <?php echo $disabled ?>> IPB Searching Competition</label><br/>
							<label><input type="checkbox" name="seminar" id="seminar" <?php echo $disabled ?>> Seminar IT</label><br/>
							<br/>
							<button type="submit" class="btn btn-danger" value="Proceed" <?php echo $disabled ?>>Proceed</button>
							<!-- <button type="submit" class="btn btn-danger" name="skip" value="1">Lewati</button> -->

						</div>
					</form>
				</div>
            </div>
        <!-- </div> -->
    </section>


