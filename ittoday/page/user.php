<?php
	if(empty($_SESSION['ittoday_user'])){
		header("location: ./login");
	}

	include "author/usermod.php";

?>  


		<section id="intro" class="intro-section page-section">
            <div class="container user-page">

                <?php 
					if($info['nama_lengkap']==NULL && $info['no_hp']==NULL && $info['alamat']==NULL && 
					$info['no_identitas']==NULL && $info['institusi']==NULL && $info['tahun_masuk']==NULL){
					$disabled = "disabled";
               	?>
               	          <script src="js/reg.js" type="text/javascript"></script>
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
							<label for="identitas">Nomor Identitas (Nomor Induk Mahasiswa/Nomor Induk Siswa/KTP)</label><br/>
							<input type="text" class="form-control" name="identitas" id="identitas" onchange="validateNIM()" required/>
							<font style="color:#800c24; font-style:italic;"><div id="nim_error"></div></font>
						</div>
						<div class="form-group">
							<label for="institusi">Institusi</label><br/>
							<input type="text" class="form-control" name="institusi" id="institusi" required/>
						</div>
						<div class="form-group">
							<label for="tahun_masuk">Tahun Masuk</label><br/>
							<input type="number" class="form-control" name="tahun_masuk" id="tahun_masuk" required/>
						</div>
						<button type="submit" class="btn btn-danger" id="reg2" value="Proceed" disabled>Proceed</button><br><br>
					</form>
				</div>
                <?php 
					} else { 
						$disabled = ""; 
				?>
		<div class="col-md-5 col-md-offset-1">
                	<p class="pp-user">
                		<img src="<?php echo $info['foto']."?s=".rand(0,50000) ?>" width="670px" height="670px">
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
					<?php 
						$id = $info['id_user'];
						$cekVoucher = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM voucher WHERE id_user = $id LIMIT 1"));

						if(!$cekVoucher){
					?>
					<!-- <form class="form-inline voucher" id="voucher" action="" method="post">
						<input type="hidden" name="verifvoucher" value="1"/>
						<div class="form-group">
    						<label for="cdvoucher">Kode Voucher : </label>
   			 				<input type="text" class="form-control" id="cdvoucher" name="cdvoucher" placeholder="paste your code here">
  						</div>
						<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						<div class="clearfix"></div>
					</form> -->
					<?php } ?>
					<!-- <h4 class="payment">
                		Status Pembayaran 
                		<i class="fa fa-check"></i>
                	</h4> -->
                </div>
                <div class="col-md-5 ">
					<h2>PILIHAN ACARA</h2>
					<?php if($disabled=="disabled") { ?>
						<label for="isi_dulu">
							Sebelum mendaftarkan diri pada salah satu acara, silakan lengkapi informasi diri Anda terlebih dahulu
						</label>
					<?php } ?>
					<h5>Lengkapi formulir pada acara yang ingin anda ikuti :</h5>
<a href="file/HANDBOOK_IT_TODAY_2016_V2.1.pdf" class="btn btn-danger" target="_blank"><img src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-11/24/new-icon.png"> Buku Panduan Perlombaan (v2.1) <i class="fa fa-external-link-square"></i></a>
<br>
						<label for="isi_dulu" hidden>
							<b>Hint</b>: Untuk IGDC, Digital I-Share, dan Agrihack jika individu (1 orang), cukup berikan tanda "-" pada field nama anggota 1 atau anggota 2.
						</label>
					<script>
						$(document).ready(function(){
						<?php if(mysqli_num_rows($cekigdc)==0){ ?>
    						$("#igdcbutton").click(function(){
        						$("#igdcdetail").slideToggle("fast");
    						});
    						<?php }else{ ?>
    							$("#igdcdetail").slideToggle("fast");
    						$("#igdcbutton").click(function(){
        						$("#igdcdetail").slideToggle("fast");
    						});
    						<?php } ?>
    						<?php if(mysqli_num_rows($cekisc)==0){ ?>
    						$("#iscbutton").click(function(){
        						$("#iscdetail").slideToggle("fast");
    						});
    						<?php }else{ ?>
    							$("#iscdetail").slideToggle("fast");
    						$("#iscbutton").click(function(){
        						$("#iscdetail").slideToggle("fast");
    						});
    						<?php } ?>
    						<?php if(mysqli_num_rows($cekah)==0){ ?>
    						$("#ahbutton").click(function(){
        						$("#ahdetail").slideToggle("fast");
    						});
    						<?php }else{ ?>
    							$("#ahdetail").slideToggle("fast");
    						$("#ahbutton").click(function(){
        						$("#ahdetail").slideToggle("fast");
    						});
    						<?php } ?>
    						<?php if(mysqli_num_rows($ceksemit)==0){ ?>
    						$("#seminarbutton").click(function(){
        						$("#seminardetail").slideToggle("fast");
    						});
    						<?php }else{ ?>
    							$("#seminardetail").slideToggle("fast");
    						$("#seminarbutton").click(function(){
        						$("#seminardetail").slideToggle("fast");
    						});
    						<?php } ?>
						});
					</script>
					<div class="alert alert-warning" style="margin-top:5px;padding-top:2px;padding-bottom:2px;"><i class="fa fa-info-circle fa-2x" style="vertical-align:middle;float:left;margin-right:5px;"></i> <u>Syarat & Ketentuan dan Teknis Perlombaan</u>, silakan merujuk ke Buku Panduan yang tersedia di atas.</div>
					<div id="igdcbutton" class="eventbutton">
						<h5>IPB Game Development Competition <?php if(mysqli_num_rows($cekigdc)!=0){ echo " (Terdaftar)"; }?></h5>
					</div>
					<div id="igdcdetail" class="eventdetail" hidden>
					<?php
						if(mysqli_num_rows($cekigdc) && (strtotime(date("Y-m-d")) < strtotime("2016-08-28"))){
							$in = mysqli_fetch_assoc(mysqli_query($conn, "SELECT video, game FROM igdc WHERE id_ketua = ".$info['id_user'].""));
							$vid = "";
							$ge = "";
							$tombol = "Submit";
							if(isset($in['video'])){
								$vid = $in['video'];
								$tombol = "Ubah";
							}
							if(isset($in['game'])){
								$ge = $in['game'];
								$tombol = "Ubah";
							}
						?>
						<div class="alert alert-info"><i class="fa fa-info-circle"></i> Batas Pengumpulan: 27 Agustus 2016 pukul 23:59 WIB (Waktu Server)</div>
						<form method="post">
							<input type="hidden" name="isigame2" value="1"/>
							<div class="form-group">
								<label for="igdcvideo">Link Video</label><br/>
								<input type="text" class="form-control" name="igdcvideo" id="igdcvideo" value="<?php echo $vid ?>" required/>
							</div>
							<div class="form-group">
								<label for="igdcapk">Link File</label><br/>
								<input type="text" class="form-control" name="igdcapk" id="igdcapk" value="<?php echo $ge ?>" required/>
							</div>
							<button type="submit" class="btn btn-danger" value="Submit"><?php echo $tombol ?></button>
						</form>
						<hr/>
					<?php }else{ echo "<p class=\"status\"><div class=\"alert alert-danger\"><i class=\"fa fa-clock-o\"></i> <i>Babak Penyisihan</i></div>Game yang Anda submit akan dinilai oleh juri. Pengumuman finalis akan diberitahukan pada 31 Agustus 2016. </p><hr/>"; } ?>
						<span class="eventBiaya">Biaya Pendaftaran: Rp. 50.000,00</span>
					<?php if(mysqli_num_rows($cekigdc)==0){ ?>
						<form id="igdcform" action="" method="post" enctype="multipart/form-data">
							<span>(*) Beri input "-" (strip) apabila Anda mendaftar sebagai <u>individu atau hanya terdiri dari 2 orang.</u></span><hr>
							<input type="hidden" name="isigame" value="1"/>
							<div class="form-group">
								<label for="igdcteam">Nama Tim</label><br/>
								<input type="text" class="form-control" name="igdcteam" id="igdcteam" required/>
							</div>
							<div class="form-group">
								<label for="igdcmember0">Nama Ketua</label><br/>
								<input type="text" class="form-control" value="<?php echo $info['nama_lengkap'] ?>" disabled/>
							</div>
							<div class="form-group">
								<label for="igdcmember1">Nama Anggota 1 (*)</label><br/>
								<input type="text" class="form-control" name="igdcmember1" id="igdcmember1" required/>
							</div>
							<div class="form-group">
								<label for="igdcmember2">Nama Anggota 2 (*)</label><br/>
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
    							<label for="igdcfile">Fotokopi Kartu Identitas Tim (Format: PDF Max 5 MB)</label>
    							<input type="file" id="igdcfile" name="igdcfile" accept="application/pdf" required>
  							</div>
  							<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						</form>
					<?php }else{ ?>
						<p class="status">Status Pembayaran: <?php $status = mysqli_fetch_assoc($cekigdc); $status['status_bayar_igdc'] ? printf('<i class="fa fa-check"></i> Pembayaran Terkonfirmasi') : printf('<i class="fa fa-times"></i> Belum Bayar'); ?></p>
						<p class="status">	<?php $status['status_bayar_igdc'] ? printf("") : printf('Lakukan pembayaran ke rekening: <div style="font-size:22px;">011-401-016-914-509 (BRI)</div> (a.n Ni Kadek Meri Sudaryanti) sesuai dengan jumlah yang harus dibayarkan.<br/><br/> Konfirmasi pembayaran melalui email ke merisudaryanti18@gmail.com atau melalui WhatsApp (082236292069) atau LINE (@meri_sudaryanti). <br/><br/>Format Pengiriman:<br/> NAMAACARA_ATAS NAMA (contoh: IGDC_Fulan bin Fulan) dengan menyertakan bukti pembayaran. '); ?>
						</p>
					<?php } ?>
					</div>
					<div id="iscbutton" class="eventbutton">
						<h5>IPB Searching Competition <?php if(mysqli_num_rows($cekisc)!=0){ echo " (Terdaftar)"; }?></h5>
					</div>
					<div id="iscdetail" class="eventdetail" hidden>
						<span class="eventBiaya">Biaya Pendaftaran: Rp. 50.000,00</span>
						<?php if(mysqli_num_rows($cekisc)==0){ ?>
						<form id="iscform" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="isisearching" value="1"/>
							<div class="form-group">
    							<label for="iscfile">Fotokopi Kartu Identitas (Format: PNG, JPG, PDF Max 5 MB)</label>
    							<input type="file" id="iscfile" name="iscfile" accept="image/png, image/jpg, application/pdf" required>
  							</div>
  							<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						</form>
						<?php }else{ ?>
							<p class="status">Status Pembayaran: <?php $status = mysqli_fetch_assoc($cekisc); $status['status_bayar_isc'] ? printf('<i class="fa fa-check"></i> Pembayaran Terkonfirmasi') : printf('<i class="fa fa-times"></i> Belum Bayar'); ?></p>
							<p class="status">	<?php $status['status_bayar_isc'] ? printf("") : printf('Lakukan pembayaran ke rekening: <div style="font-size:22px;">0-393-500-323 (BNI)</div> (a.n Ihda Aini) sesuai dengan jumlah yang harus dibayarkan.<br/><br/> Konfirmasi pembayaran melalui email ke ainiihda@gmail.com atau melalui WhatsApp (085712444713) atau LINE (@ainiihda). <br/><br/>Format Pengiriman:<br/> NAMAACARA_ATAS NAMA (contoh: ISC_Fulan bin Fulan) dengan menyertakan bukti pembayaran.'); ?>
							</p>
						<?php } ?>
					</div>
					<!-- DAFTAR AGRIHACK -->
					<div id="ahbutton" class="eventbutton">
						<h5>Agrihack CTF <?php if(mysqli_num_rows($cekah)!=0){ echo " (Terdaftar)"; }?></h5>
					</div>
					<div id="ahdetail" class="eventdetail" hidden>
						<div class="alert alert-warning"><i class="fa fa-warning"></i> Dikhususkan untuk SMA/Sederajat dan Diploma</div>
						<span class="eventBiaya">Biaya Pendaftaran: Rp. 50.000,00</span>
						<?php if(mysqli_num_rows($cekah)==0){ ?>
						<form id="ahform" action="" method="post" enctype="multipart/form-data">
							<span>(*) Beri input "-" (strip) apabila Anda mendaftar sebagai <u>individu atau hanya terdiri dari 2 orang.</u></span><hr>
							<input type="hidden" name="isiagrihack" value="1"/>
							<div class="form-group">
								<label for="ahteam">Nama Tim</label><br/>
								<input type="text" class="form-control" name="ahteam" id="ahteam" required/>
							</div>
							<div class="form-group">
								<label for="ahmember0">Nama Ketua</label><br/>
								<input type="text" class="form-control" value="<?php echo $info['nama_lengkap'] ?>" disabled/>
							</div>
							<div class="form-group">
								<label for="ahmember1">Nama Anggota 1 (*)</label><br/>
								<input type="text" class="form-control" name="ahmember1" id="ahmember1" required/>
							</div>
							<div class="form-group">
								<label for="ahmember2">Nama Anggota 2 (*)</label><br/>
								<input type="text" class="form-control" name="ahmember2" id="ahmember2" required/>
							</div>
							<div class="form-group">
    							<label for="ahfile">Fotokopi Kartu Identitas Tim (Format: PDF Max 5 MB)</label>
    							<input type="file" id="ahfile" name="ahfile" accept="application/pdf" required>
  							</div>
  							<button type="submit" class="btn btn-danger" value="Submit">Submit</button>
						</form>
						<?php }else{ ?>
							<p class="status">Status Pembayaran: <?php $status = mysqli_fetch_assoc($cekah); $status['status_bayar_ah'] ? printf('<i class="fa fa-check"></i> Pembayaran Terkonfirmasi') : printf('<i class="fa fa-times"></i> Belum Bayar'); ?></p>
							<p class="status">	<?php $status['status_bayar_ah'] ? printf("") : printf('Lakukan pembayaran ke rekening: <div style="font-size:22px;">0-342-093-815 (BNI)</div> (a.n Desi Putri Pertiwi) sesuai dengan jumlah yang harus dibayarkan.<br/><br/> Konfirmasi pembayaran melalui email ke desiputripertiwi@gmail.com atau melalui WhatsApp/LINE (087793185999). <br/><br/>Format Pengiriman:<br/> NAMAACARA_ATAS NAMA (contoh: Agrihack_Fulan bin Fulan) dengan menyertakan bukti pembayaran. '); ?>
							</p>
						<?php } ?>
					</div>
					<div id="seminarbutton" class="eventbutton">
						<h5>Seminar IT <?php if(mysqli_num_rows($ceksemit)!=0){ echo " (Terdaftar)"; }?></h5>
					</div>
					<div id="seminardetail" class="eventdetail" hidden>
						<span class="eventBiaya">Biaya Pendaftaran: Rp. 40.000,00</span>
						<?php if(mysqli_num_rows($ceksemit)==0){ ?>
						<form id="seminarform" action="" method="post">
							<input type="hidden" name="isiseminar" value="1"/>
  							<button type="submit" class="btn btn-danger" value="Submit">Daftar</button>
						</form>
						<?php }else{ ?>
							<p class="status">Status Pembayaran: <?php $status = mysqli_fetch_assoc($ceksemit); $status['status_bayar_sem'] ? printf('<i class="fa fa-check"></i> Pembayaran Terkonfirmasi') : printf('<i class="fa fa-times"></i> Belum Bayar'); ?></p>
							<p class="status">	<?php $status['status_bayar_sem'] ? printf("") : printf('Lakukan pembayaran ke rekening: <div style="font-size:22px;">0-393-500-550 (BNI)</div> (a.n Ainil Fitri) sesuai dengan jumlah yang harus dibayarkan.<br/><br/> Konfirmasi pembayaran melalui email ke 56afitri@gmail.com atau melalui WhatsApp (082283053254) atau LINE (@afitri56). <br/><br/>Format Pengiriman:<br/> NAMAACARA_ATAS NAMA (contoh: Seminar_Fulan bin Fulan) dengan menyertakan bukti pembayaran. '); ?>
							</p>
						<?php } ?>
					</div>
				</div>
                <?php 
					} 
				?>
            </div>
		</section>
<script type="text/javascript">

    function ValidateFileUpload() {
    	$('#blah').hide();
        var fuData = document.getElementById('fotobaru');
        var FileUploadPath = fuData.value;

		//To check if user upload any file
        if (FileUploadPath == '') {
            alert("Masukkan gambar");
            $('#ubahfoto').attr("disabled",true);

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

		//The file uploaded is an image

		if (Extension == "gif" || Extension == "png" || Extension == "bmp"
		                    || Extension == "jpeg" || Extension == "jpg") {

		// To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                    	$('#blah').show();
                        $('#blah').attr('src', e.target.result);
                        $('#ubahfoto').attr("disabled",false);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
		else {
           alert("Hanya .png, .jpg/.jpeg, .gif, dan .bmp saja yang diperbolehkan");
           $('#ubahfoto').attr("disabled",true);
            }
        }
    }


</script>
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
    					<div class="clearfix"></div>
    					<img src="images/noimg.jpg" style="height:40%;width:50%;" id="blah" hidden><br/>
    					<input type="file" id="fotobaru" name="fotobaru" accept="image/*" onchange="ValidateFileUpload()">
  					</div>
      		</div>
      		<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			<button type="submit" class="btn btn-danger" value="Change" id="ubahfoto" disabled>Save changes</button>
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
						<label for="identitas_baru">Nomor Identitas (Nomor Induk Mahasiswa/Nomor Induk Siswa/KTP)</label><br/>
						<input type="text" class="form-control" name="identitas_baru" id="identitas_baru" onchange="validateNIM()" value="<?php echo $info['no_identitas'] ?>" disabled/>
					</div>
					<div class="form-group">
						<label for="institusi_baru">Institusi</label><br/>
						<input type="text" class="form-control" name="institusi_baru" id="institusi_baru" value="<?php echo $info['institusi'] ?>" disabled/>
					</div>
					<div class="form-group">
						<label for="tahun_masuk_baru">Tahun Masuk</label><br/>
						<input type="number" class="form-control" name="tahun_masuk_baru" id="tahun_masuk_baru"  value="<?php echo $info['tahun_masuk'] ?>" disabled/>
					</div>
      		</div>
      		<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			<button type="submit" class="btn btn-danger" id="reg2" value="Change">Save changes</button>
        		</form>
      		</div>
    	</div>
 	</div>
</div>

<?php
	function cekExt($file_name){
	 	$allowed =  array('gif','png' ,'jpg','jpeg','bmp','pdf');
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	 	if(!in_array($ext,$allowed)) {
			return false;
		}else{
			return true;
		}
	}

	mysqli_close($conn);
?>