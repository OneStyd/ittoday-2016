<?php
	$user = mysqli_query($conn, "SELECT id_user,nama_lengkap,no_hp,alamat,no_identitas,institusi,tahun_masuk,foto FROM ittoday WHERE email = '".$_SESSION['ittoday_user']."'");
	$info = mysqli_fetch_assoc($user);
	
	if(isset($_POST['registrasi'])){
		$id = $info['id_user'];
		$nama=$_POST['nama_lengkap'];
		$hp = $_POST['no_hp'];
		$alamat = $_POST['alamat'];
		$identitas = $_POST['identitas'];
		$institusi = $_POST['institusi'];
		$tahun_masuk = $_POST['tahun_masuk'];

		$update = mysqli_query($conn, "UPDATE ittoday SET nama_lengkap='$nama', no_hp='$hp', alamat='$alamat', no_identitas='$identitas', institusi='$institusi',tahun_masuk='$tahun_masuk' WHERE id_user='$id'");
		if($update){
			echo "<script>alert('Registrasi Sukses');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Registrasi gagal')</script>";
		}
	}

	if(isset($_POST['update'])){
		$id = $info['id_user'];
		$nama=$_POST['nama_lengkap_baru'];
		$hp = $_POST['no_hp_baru'];
		$alamat = $_POST['alamat_baru'];
		// $identitas = $_POST['identitas_baru'];
		// $institusi = $_POST['institusi_baru'];
		// $tahun_masuk = $_POST['tahun_masuk_baru'];

		$update = mysqli_query($conn, "UPDATE ittoday SET nama_lengkap='$nama', no_hp='$hp', alamat='$alamat' WHERE id_user='$id'");
		if($update){
			echo "<script>alert('Update berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Update gagal')</script>";
		}
	}

	if(isset($_POST['updatefoto'])){
		$nim = preg_replace('/[^A-Za-z0-9\-]/', '', $info['no_identitas']);
		$id = $info['id_user'];
		$dir = "img/user";
		$file_size = $_FILES["fotobaru"]["size"];
		$file_loc = $_FILES["fotobaru"]["tmp_name"];
		$file_name = $_FILES["fotobaru"]["name"];
		$tmp = explode(".", $file_name);
		$extension = end($tmp);
		$file_name = $nim.".".$extension;
		$web = "http://ittoday.web.id";

		if(cekExt($file_name)){
			if($file_size < 1000000){
				move_uploaded_file($file_loc, "$dir/$file_name");
				$imge = getimagesize("$web/$dir/$file_name");
				if(!$imge) {
        				die("<script>alert('Mohon unggah file yang benar-benar merupakan gambar');window.location.href=window.location.href</script>");
   				}
				$update = mysqli_query($conn, "UPDATE ittoday SET foto='$dir/$file_name' WHERE id_user='$id'");
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

	//cek user sudah terdaftar ke mana saja...
	/* Cek IGDC */
	$id = $info['id_user'];
	$cekigdc = mysqli_query($conn, "SELECT * FROM igdc WHERE id_ketua = '$id'");
	/* END Cek IGDC */
	/* Cek ISC */
	$cekisc = mysqli_query($conn, "SELECT * FROM isc WHERE id_user = '$id'");
	/* END Cek ISC */
	/* Cek D I s */
	$cekdis = mysqli_query($conn, "SELECT * FROM digishare WHERE id_ketua = '$id'");
	/* END Cek D I s */
	/* Cek Agrihack */
	$cekah = mysqli_query($conn, "SELECT * FROM agrihack WHERE id_ketua = '$id'");
	/* END Cek Agrihack */
	/* Cek Seminar */
	$ceksemit = mysqli_query($conn, "SELECT * FROM seminar WHERE id_user = '$id'");
	/* END Cek Seminar */


		if(isset($_POST['verifvoucher'])){
		$id = $info['id_user'];
		$code = $_POST['cdvoucher'];

		//anggap ada tabel "voucher" dengan atribut id_user (FK),activate (0 belum aktif, 1 udah aktif), dan kode_voucher(PK).... 5---- untuk semua acara, 1----- untuk 1 acara

		$voucher = mysqli_query($conn, "SELECT kode_voucher,activate FROM voucher WHERE kode_voucher = '$code'");

		$activate = mysqli_fetch_assoc($voucher);
		if (mysqli_num_rows($voucher)==1 && $activate['activate']==0){
			mysqli_query($conn, "UPDATE voucher SET activate=1, id_user = '$id' WHERE kode_voucher='$code'");
			echo "<script>alert('Selamat');window.location.href=window.location.href</script>";
		}else if($activate['activate']==1){
			echo "<script>alert('Kode sudah tidak valid.')</script>";
		}else{
			echo "<script>alert('Kode yang anda masukkan salah. Coba kembali.')</script>";
		}


	}

	if(isset($_POST['isigame'])){
		$nim = preg_replace('/[^A-Za-z0-9\-]/', '', $info['no_identitas']);
		$id = $info['id_user'];
		$tim = $_POST['igdcteam'];
		$member1 = $_POST['igdcmember1'];
		$member2 = $_POST['igdcmember2'];
		$title = $_POST['igdctitle'];
		$description = $_POST['igdcdesc'];
		//$video = $_POST['igdcvideo'];
		//$link = $_POST['igdcapk'];
		$dir = "img/identitas/igdc";
		$file_size = $_FILES["igdcfile"]["size"];
		$file_loc = $_FILES["igdcfile"]["tmp_name"];
		$file_name = $_FILES["igdcfile"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim."_identitas.".$extension;

		if(cekExt($file_name)){
			if($file_size < 5000000){
				move_uploaded_file($file_loc, "$dir/$file_name");
				$isi = mysqli_query($conn, "INSERT INTO igdc VALUES('', $id, '$tim', '$member1', '$member2', '$title', '$description', '', '', '$dir/$file_name','0')");
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

	if(isset($_POST['isigame2'])){
		$video = $_POST['igdcvideo'];
		$game = $_POST['igdcapk'];
		
		$que = mysqli_query($conn, "UPDATE igdc SET video = '$video', game = '$game'");
		
		if($que){
			echo "<script>alert('Berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal')</script>";
		}
		
	}

	if(isset($_POST['isisearching'])){
		$nim = preg_replace('/[^A-Za-z0-9\-]/', '', $info['no_identitas']);
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
				$isi = mysqli_query($conn, "INSERT INTO isc VALUES('', $id, '$dir/$file_name','0')");
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
		$nim = preg_replace('/[^A-Za-z0-9\-]/', '', $info['no_identitas']);
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
				$isi = mysqli_query($conn, "INSERT INTO digishare VALUES('', $id, '$tim', '$member1', '$member2', '$category', '$title', '$description', '$dir/$pro_name', '$dir/$file_name','0')");
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
		$nim = preg_replace('/[^A-Za-z0-9\-]/', '', $info['no_identitas']);
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
				$isi = mysqli_query($conn, "INSERT INTO agrihack VALUES('', $id, '$tim', '$member1', '$member2', '$dir/$file_name','0','')");
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

		$isi = mysqli_query($conn, "INSERT INTO seminar VALUES('', '$id','0')");
		if($isi){
			echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Pendaftaran gagal')</script>";
		}
	}	

?>