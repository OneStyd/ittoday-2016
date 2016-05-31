<?php
	if(empty($_SESSION['ittoday_user'])){
		header("location: login");
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

		$update = mysqli_query($conn, "UPDATE ittoday SET nama_lengkap='$nama', no_hp='$hp', alamat='$alamat', no_identitas='$identitas', institusi='$institusi',tahun_masuk='$tahun_masuk' WHERE id_user='$id'") or die(mysqli_error());
		if($update){
			echo "<script>alert('Update berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Update gagal')</script>";
		}
	}

	if(isset($_POST['update'])){
		$id = $info['id_user'];
		$nama=$_POST['nama_lengkap_baru'];
		$hp = $_POST['no_hp_baru'];
		$alamat = $_POST['alamat_baru'];
		$identitas = $_POST['identitas_baru'];
		$institusi = $_POST['institusi_baru'];
		$tahun_masuk = $_POST['tahun_masuk_baru'];

		$update = mysqli_query($conn, "UPDATE ittoday SET nama_lengkap='$nama', no_hp='$hp', alamat='$alamat', no_identitas='$identitas', institusi='$institusi',tahun_masuk='$tahun_masuk' WHERE id_user='$id'") or die(mysqli_error());
		if($update){
			echo "<script>alert('Update berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Update gagal')</script>";
		}
	}

	if(isset($_POST['updatefoto'])){
		$nim = $info['no_identitas'];
		$id = $info['id_user'];
		$dir = "img/user";
		$file_size = $_FILES["fotobaru"]["size"];
		$file_loc = $_FILES["fotobaru"]["tmp_name"];
		$file_name = $_FILES["fotobaru"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim.".".$extension;

		if(cekExt($file_name)){
			if($file_size < 1000000){
				move_uploaded_file($file_loc, "$dir/$file_name");
				$update = mysqli_query($conn, "UPDATE ittoday SET foto='$dir/$file_name' WHERE id_user='$id'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Update berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Update gagal')</script>";
				}
			}else{
				echo "<script>alert('Cek kembali ukuran filenya')</script>";
			}
		}else{
			echo "<script>alert('Cek kembali extension filenya')</script>";
		}
	}
?>    
		<section id="intro" class="intro-section page-section">
            <div class="container user-page">
                <?php 
					if($info['nama_lengkap']==NULL && $info['no_hp']==NULL && $info['alamat']==NULL && 
					$info['no_identitas']==NULL && $info['institusi']==NULL && $info['tahun_masuk']==NULL){
					$disabled = "disabled";
               	?>
               	<div class="col-md-6 col-md-offset-3">
                	<h2>Mohon Lengkapi Informasi Anda Terlebih Dahulu</h2>
                	<form id="registrasi2" action="" method="post">
						<input type="hidden" name="registrasi" value="1"/>
						<div class="form-group">
							<label for="nama_lengkap">Nama Lengkap</label><br/>
							<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required/>
						</div>
						<div class="form-group">
							<label for="no_hp">Nomor Handphone</label><br/>
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
				</div>
                <?php 
					} else{ 
						$disabled = ""; 
				?>
				<div class="col-md-5">
                	<p class="pp-user">
                		<img src="<?php echo $info['foto'] ?>">
                		<a href="#" title="edit picture" data-toggle="modal" data-target="#picModal">
                			<i class="fa fa-pencil-square-o"></i>
                		</a>
                	</p>
                	<h2 class="name-user">
                		<?php echo $info['nama_lengkap'] ?> 
                		<a href="#" title="edit profil" data-toggle="modal" data-target="#profilModal">
                			<i class="fa fa-pencil-square-o"></i>
                		</a>
                	</h2>
                	<table class="table">	
						<tr><td>No. Identitas</td><td><?php echo $info['no_identitas'] ?></td></tr>
						<tr><td>Institusi</td><td><?php echo $info['institusi'] ?></td></tr>
						<tr><td>Tahun Masuk</td><td><?php echo $info['tahun_masuk'] ?></td></tr>
						<tr><td>Alamat</td><td><?php echo $info['alamat'] ?></td></tr>
						<tr><td>No. HP</td><td><?php echo $info['no_hp'] ?></td></tr>
					</table>
					<form class="form-inline voucher" id="voucher" action="" method="post">
						<input type="hidden" name="verifvoucher" value="1"/>
						<div class="form-group">
    						<label for="cdvoucher">Kode Voucher : </label>
   			 				<input type="text" class="form-control" id="cdvoucher" name="cdvoucher" placeholder="paste your code here">
  						</div>
						<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						<div class="clearfix"></div>
					</form>
					<h4 class="payment">
                		Status Pembayaran 
                		<i class="fa fa-check"></i>
                	</h4>
                </div>
                <div class="col-md-6 col-md-offset-1">
					<h2>PILIHAN ACARA</h2>
					<?php if($disabled=="disabled") { ?>
						<label for="isi_dulu">
							Sebelum mendaftarkan diri pada salah satu acara, silakan lengakpi informasi diri Anda terlebih dahulu
						</label>
					<?php } ?>
					<h5>Lengkapi formulir pada acara yang ingin anda ikuti :</h6><br>
					<script>
						$(document).ready(function(){
    						$("#igdcbutton").click(function(){
        						$("#igdcdetail").slideToggle(1000);
    						});
    						$("#iscbutton").click(function(){
        						$("#iscdetail").slideToggle(500);
    						});
    						$("#disbutton").click(function(){
        						$("#disdetail").slideToggle(1000);
    						});
    						$("#ahbutton").click(function(){
        						$("#ahdetail").slideToggle(700);
    						});
    						$("#seminarbutton").click(function(){
        						$("#seminardetail").slideToggle(500);
    						});
						});
					</script>
					<div id="igdcbutton" class="eventbutton">
						<h5>IPB Game Developer Competition</h5>
					</div>
					<div id="igdcdetail" class="eventdetail" hidden>
						<form id="igdcform" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="isigame" value="1"/>
							<div class="form-group">
								<label for="igdcteam">Nama Tim</label><br/>
								<input type="text" class="form-control" name="igdcteam" id="igdcteam" required/>
							</div>
							<div class="form-group">
								<label for="igdcmember1">Nama Anggota 1</label><br/>
								<input type="text" class="form-control" name="igdcmember1" id="igdcmember1" required/>
							</div>
							<div class="form-group">
								<label for="igdcmember2">Nama Anggota 2</label><br/>
								<input type="text" class="form-control" name="igdcmember2" id="igdcmember2" required/>
							</div>
							<div class="form-group">
								<label for="igdctitle">Judul Game</label><br/>
								<input type="text" class="form-control" name="igdctitle" id="igdctitle" required/>
							</div>
							<div class="form-group">
								<label for="igdcdesc">Deskripsi Singkat</label><br/>
								<input type="text" class="form-control" name="igdcdesc" id="igdcdesc" required/>
							</div>
							<div class="form-group">
								<label for="igdcvideo">Link Video</label><br/>
								<input type="text" class="form-control" name="igdcvideo" id="igdcvideo" required/>
							</div>
							<div class="form-group">
								<label for="igdcapk">Link File</label><br/>
								<input type="text" class="form-control" name="igdcapk" id="igdcapk" required/>
							</div>
							<div class="form-group">
    							<label for="igdcfile">Fotokopi Kartu Identitas Tim (Format: PDF Max 5 MB)</label>
    							<input type="file" id="igdcfile" name="igdcfile">
  							</div>
  							<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						</form>
					</div>
					<div id="iscbutton" class="eventbutton">
						<h5>IPB Searching Competition</h5>
					</div>
					<div id="iscdetail" class="eventdetail" hidden>
						<form id="iscform" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="isisearching" value="1"/>
							<div class="form-group">
    							<label for="iscfile">Fotokopi Kartu Identitas (Format: PDF Max 5 MB)</label>
    							<input type="file" id="iscfile" name="iscfile">
  							</div>
  							<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						</form>
					</div>
					<div id="disbutton" class="eventbutton">
						<h5>Digital I-Share</h5>
					</div>
					<div id="disdetail" class="eventdetail" hidden>
						<form id="disform" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="isidis" value="1"/>
							<div class="form-group">
								<label for="disteam">Nama Tim</label><br/>
								<input type="text" class="form-control" name="disteam" id="disteam" required/>
							</div>
							<div class="form-group">
								<label for="dismember1">Nama Anggota 1</label><br/>
								<input type="text" class="form-control" name="dismember1" id="dismember1" required/>
							</div>
							<div class="form-group">
								<label for="dismember2">Nama Anggota 2</label><br/>
								<input type="text" class="form-control" name="dismember2" id="dismember2" required/>
							</div>
							<div class="form-group">
								<label for="discategory">Kategori Aplikasi</label><br/>
								<select class="form-control" name="discategory" required>
									<option> - - - </option>
  									<option value="comm">Communications</option>
  									<option value="lifedu">Lifestyle & Education</option>
  									<option value="mulgame">Multimedia & Game</option>
  									<option value="utility">Utility (tools, security, ideas/apps for disabled)</option>
  									<option value="tourism">Tourism</option>
  									<option value="socinn">Social Innovation</option>
								</select>
							</div>
							<div class="form-group">
								<label for="distitle">Judul Aplikasi</label><br/>
								<input type="text" class="form-control" name="distitle" id="distitle" required/>
							</div>
							<div class="form-group">
								<label for="disdesc">Deskripsi Singkat</label><br/>
								<input type="text" class="form-control" name="disdesc" id="disdesc" required/>
							</div>
							<div class="form-group">
    							<label for="disproposal">Proposal Aplikasi (Format: PDF Max 5 MB)</label>
    							<input type="file" id="disproposal" name="disproposal">
  							</div>
							<div class="form-group">
    							<label for="disfile">Fotokopi Kartu Identitas Tim (Format: PDF Max 5 MB)</label>
    							<input type="file" id="disfile" name="disfile">
  							</div>
  							<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						</form>
					</div>
					<div id="ahbutton" class="eventbutton">
						<h5>Agrihack</h5>
					</div>
					<div id="ahdetail" class="eventdetail" hidden>
						<form id="ahform" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="isiagrihack" value="1"/>
							<div class="form-group">
								<label for="ahteam">Nama Tim</label><br/>
								<input type="text" class="form-control" name="ahteam" id="ahteam" required/>
							</div>
							<div class="form-group">
								<label for="ahmember1">Nama Anggota 1</label><br/>
								<input type="text" class="form-control" name="ahmember1" id="ahmember1" required/>
							</div>
							<div class="form-group">
								<label for="ahmember2">Nama Anggota 2</label><br/>
								<input type="text" class="form-control" name="ahmember2" id="ahmember2" required/>
							</div>
							<div class="form-group">
    							<label for="ahfile">Fotokopi Kartu Identitas Tim (Format: PDF Max 5 MB)</label>
    							<input type="file" id="ahfile" name="ahfile">
  							</div>
  							<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						</form>
					</div>
					<div id="seminarbutton" class="eventbutton">
						<h5>Seminar IT</h5>
					</div>
					<div id="seminardetail" class="eventdetail" hidden>
						<form id="seminarform" action="" method="post">
							<input type="hidden" name="isiseminar" value="1"/>
  							<button type="submit" class="btn btn-danger" value="Submit">Daftar</button>
						</form>
					</div>
				</div>
                <?php 
					} 
				?>
            </div>
		</section>

<!-- Modal -->
<div class="modal fade" id="picModal" tabindex="-1" role="dialog" aria-labelledby="picModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
    		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Edit Picture</h4>
      		</div>
      		<div class="modal-body">
        		<form action="" id="fotoform" method="post" enctype="multipart/form-data">
        			<input type="hidden" name="updatefoto" value="1"/>
					<div class="form-group">
    					<label for="fotobaru">Upload Foto Profil Anda</label>
    					<input type="file" id="fotobaru" name="fotobaru">
  					</div>
      		</div>
      		<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			<button type="submit" class="btn btn-danger" value="Change">Save changes</button>
				</form>
      		</div>
    	</div>
 	</div>
</div>

<div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="profilModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
    		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Edit Profil</h4>
      		</div>
      		<div class="modal-body">
        		<form id="registrasi3" action="" method="post">
					<input type="hidden" name="update" value="1"/>
					<div class="form-group">
						<label for="nama_lengkap_baru">Nama Lengkap</label><br/>
						<input type="text" class="form-control" name="nama_lengkap_baru" id="nama_lengkap_baru" value="<?php echo $info['nama_lengkap'] ?>" required/>
					</div>
					<div class="form-group">
						<label for="no_hp_baru">Nomor Handphone</label><br/>
						<input type="number" class="form-control" name="no_hp_baru" id="no_hp_baru" value="<?php echo $info['no_hp'] ?>" required/>
					</div>
					<div class="form-group">
						<label for="alamat_baru">Alamat Saat Ini</label><br/>
						<input type="text" class="form-control" name="alamat_baru" id="alamat_baru" value="<?php echo $info['alamat'] ?>" required/>
					</div>
					<div class="form-group">
						<label for="identitas_baru">Nomor Identitas (Kartu Mahasiswa/KTP/SIM)</label><br/>
						<input type="text" class="form-control" name="identitas_baru" id="identitas_baru" value="<?php echo $info['no_identitas'] ?>" required/>
					</div>
					<div class="form-group">
						<label for="institusi_baru">Institusi</label><br/>
						<input type="text" class="form-control" name="institusi_baru" id="institusi_baru" value="<?php echo $info['institusi'] ?>" required/>
					</div>
					<div class="form-group">
						<label for="tahun_masuk_baru">Tahun Masuk</label><br/>
						<input type="number" class="form-control" name="tahun_masuk_baru" id="tahun_masuk_baru" value="<?php echo $info['tahun_masuk'] ?>" required/>
					</div>
      		</div>
      		<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			<button type="submit" class="btn btn-danger" value="Change">Save changes</button>
        		</form>
      		</div>
    	</div>
 	</div>
</div>

<?php
	if(isset($_POST['verifvoucher'])){
		$id = $info['id_user'];
		$code = $_POST['cdvoucher'];

		//anggap ada tabel "voucher" dengan atribut id_user (FK),activate (0 belum aktif, 1 udah aktif), dan kode_voucher(PK).... 5---- untuk semua acara, 1----- untuk 1 acara

		$voucher = mysqli_query($conn, "SELECT kode_voucher,activate FROM voucher WHERE kode_voucher = '$code'");

		$activate = mysqli_fetch_assoc($voucher);
		if (mysqli_num_rows($voucher)==1 && $activate['activate']==0){
			mysqli_query($conn, "UPDATE voucher SET activate=1 WHERE kode_voucher='$code'");
			echo "<script>alert('Selamat');window.location.href=window.location.href</script>";
		}else{
			echo "<script>alert('Kode yang anda masukkan salah. Coba kembali.')</script>";
		}


	}

	if(isset($_POST['isigame'])){
		$nim = $info['no_identitas'];
		$id = $info['id_user'];
		$tim = $_POST['igdcteam'];
		$member1 = $_POST['igdcmember1'];
		$member2 = $_POST['igdcmember2'];
		$title = $_POST['igdctitle'];
		$description = $_POST['igdcdesc'];
		$video = $_POST['igdcvideo'];
		$link = $_POST['igdcapk'];
		$dir = "img/identitas/igdc";
		$file_size = $_FILES["igdcfile"]["size"];
		$file_loc = $_FILES["igdcfile"]["tmp_name"];
		$file_name = $_FILES["igdcfile"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim."_identitas.".$extension;

		if(cekExt($file_name)){
			if($file_size < 5000000){
				move_uploaded_file($file_loc, "$dir/$file_name");
				$isi = mysqli_query($conn, "INSERT INTO igdc VALUES('', $id, '$tim', '$member1', '$member2', '$title', '$description', '$video', '$link', '$dir/$file_name')") or die(mysqli_error());
				if($isi){
					echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Pendaftaran gagal')</script>";
				}
			}else{
				echo "<script>alert('Cek kembali ukuran filenya')</script>";
			}
		}else{
			echo "<script>alert('Cek kembali extension filenya')</script>";
		}
	}

	if(isset($_POST['isisearching'])){
		$nim = $info['no_identitas'];
		$id = $info['id_user'];
		$dir = "img/identitas/isc";
		$file_size = $_FILES["iscfile"]["size"];
		$file_loc = $_FILES["iscfile"]["tmp_name"];
		$file_name = $_FILES["iscfile"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim."_identitas.".$extension;

		if(cekExt($file_name)){
			if($file_size < 5000000){
				move_uploaded_file($file_loc, "$dir/$file_name");
				$isi = mysqli_query($conn, "INSERT INTO isc VALUES('', $id, '$dir/$file_name')") or die(mysqli_error());
				if($isi){
					echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Pendaftaran gagal')</script>";
				}
			}else{
				echo "<script>alert('Cek kembali ukuran filenya')</script>";
			}
		}else{
			echo "<script>alert('Cek kembali extension filenya')</script>";
		}
	}

	if(isset($_POST['isidis'])){
		$nim = $info['no_identitas'];
		$id = $info['id_user'];
		$tim = $_POST['disteam'];
		$member1 = $_POST['dismember1'];
		$member2 = $_POST['dismember2'];
		$category = $_POST['discategory'];
		$title = $_POST['distitle'];
		$description = $_POST['disdesc'];
		$dir = "img/identitas/digishare";
		$pro_size = $_FILES["disproposal"]["size"];
		$pro_loc = $_FILES["disproposal"]["tmp_name"];
		$pro_name = $_FILES["disproposal"]["name"];
		$pro_extension = end(explode(".", $pro_name));
		$pro_name = $nim."_proposal.".$pro_extension;
		$file_size = $_FILES["disfile"]["size"];
		$file_loc = $_FILES["disfile"]["tmp_name"];
		$file_name = $_FILES["disfile"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim."_identitas.".$extension;

		if(cekExt($file_name) && cekExt($pro_name)){
			if($file_size < 5000000 && $pro_size < 5000000){
				move_uploaded_file($file_loc, "$dir/$file_name");
				move_uploaded_file($pro_loc, "$dir/$pro_name");
				$isi = mysqli_query($conn, "INSERT INTO digishare VALUES('', $id, '$tim', '$member1', '$member2', '$category', '$title', '$description', '$dir/$pro_name', '$dir/$file_name')") or die(mysqli_error());
				if($isi){
					echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Pendaftaran gagal')</script>";
				}
			}else{
				echo "<script>alert('Cek kembali ukuran filenya')</script>";
			}
		}else{
			echo "<script>alert('Cek kembali extension filenya')</script>";
		}
	}

	if(isset($_POST['isiagrihack'])){
		$nim = $info['no_identitas'];
		$id = $info['id_user'];
		$tim = $_POST['ahteam'];
		$member1 = $_POST['ahmember1'];
		$member2 = $_POST['ahmember2'];
		$dir = "img/identitas/agrihack";
		$file_size = $_FILES["ahfile"]["size"];
		$file_loc = $_FILES["ahfile"]["tmp_name"];
		$file_name = $_FILES["ahfile"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim."_identitas.".$extension;

		if(cekExt($file_name)){
			if($file_size < 5000000){
				move_uploaded_file($file_loc, "$dir/$file_name");
				$isi = mysqli_query($conn, "INSERT INTO agrihack VALUES('', $id, '$tim', '$member1', '$member2', '$dir/$file_name')") or die(mysqli_error());
				if($isi){
					echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Pendaftaran gagal')</script>";
				}
			}else{
				echo "<script>alert('Cek kembali ukuran filenya')</script>";
			}
		}else{
			echo "<script>alert('Cek kembali extension filenya')</script>";
		}
	}

	if(isset($_POST['isiseminar'])){
		$id = $info['id_user'];

		$isi = mysqli_query($conn, "INSERT INTO seminar VALUES('', $id)") or die(mysqli_error());
		if($isi){
			echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Pendaftaran gagal')</script>";
		}
	}	

	function cekExt($file_name){
	 	$allowed =  array('gif','png' ,'jpg','jpeg','bmp','pdf');
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	 	if(!in_array($ext,$allowed)) {
			return false;
		}else{
			return true;
		}
	}
?>