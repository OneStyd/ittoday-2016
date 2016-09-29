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


	$user = mysqli_query($conn, "SELECT id_user,nama_lengkap,no_hp,alamat,no_identitas,institusi,tahun_masuk,foto FROM ittoday WHERE email = '".$_SESSION['ittoday_user']."'");
	$info = mysqli_fetch_assoc($user);
	
	//melengkapi proses registrasi
	if(isset($_POST['registrasi'])){
		$id = $info['id_user'];
		$nama =strip_tags($_POST['nama_lengkap']);
		$hp = strip_tags($_POST['no_hp']);
		$alamat = strip_tags($_POST['alamat']);
		$identitas = strip_tags($_POST['identitas']);
		$institusi = strip_tags($_POST['institusi']);
		$tahun_masuk = strip_tags($_POST['tahun_masuk']);

		$update = $conn->prepare("UPDATE ittoday SET nama_lengkap=?, no_hp=?, alamat=?, no_identitas=?, institusi=?, tahun_masuk=? WHERE id_user=?");
		$update->bind_param("sssssii",$nama,$hp,$alamat,$identitas,$institusi,$tahun_masuk,$id);

		if($update->execute()){
			echo "<script>alert('Registrasi Sukses');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Registrasi gagal')</script>";
		}
		$update->close();
	}

	//memperbarui profil user
	if(isset($_POST['update'])){
		$id = $info['id_user'];
		$nama=strip_tags($_POST['nama_lengkap_baru']);
		$hp = strip_tags($_POST['no_hp_baru']);
		$alamat = strip_tags($_POST['alamat_baru']);

		$update = $conn->prepare("UPDATE ittoday SET nama_lengkap=?, no_hp=?, alamat=? WHERE id_user=?");
		$update->bind_param("sssi",$nama,$hp,$alamat,$id);

		if($update->execute()){
			echo "<script>alert('Update berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Update gagal')</script>";
		}
		$update->close();
	}

	//memperbarui foto profil user
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

		$loc = $dir."/".$file_name;

		if(cekExt($file_name)){
			if($file_size < 1000000){
				$imge = getimagesize($file_loc);
				if(!$imge) {
        				die("<script>alert('Mohon unggah file yang benar-benar merupakan gambar');window.location.href=window.location.href</script>");
   				}
				move_uploaded_file($file_loc, "$dir/$file_name");

				$update = $conn->prepare("UPDATE ittoday SET foto=? WHERE id_user=?");
				$update->bind_param("si",$loc,$id);
				if($update->execute()){
					$update->close();
					echo "<script>alert('Update berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Update gagal');window.location.href=window.location.href;</script>";
				}
			}else{
				echo "<script>alert('Cek kembali ukuran filenya');window.location.href=window.location.href;</script>";
			}
		}else{
			echo "<script>alert('Cek kembali extension filenya');window.location.href=window.location.href;</script>";
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
	/* Cek Agrihack */
	$cekah = mysqli_query($conn, "SELECT * FROM agrihack WHERE id_ketua = '$id'");
	/* END Cek Agrihack */
	/* Cek Seminar */
	$ceksemit = mysqli_query($conn, "SELECT * FROM seminar WHERE id_user = '$id'");
	/* END Cek Seminar */

	//mengisi formulir pendaftaran IGDC
	if(isset($_POST['isigame'])){
		$nim = preg_replace('/[^A-Za-z0-9\-]/', '', $info['no_identitas']);
		$id = $info['id_user'];
		$tim = htmlentities($_POST['igdcteam']);
		$member1 = strip_tags($_POST['igdcmember1']);
		$member2 = strip_tags($_POST['igdcmember2']);
		$title = strip_tags($_POST['igdctitle']);
		$description = htmlentities($_POST['igdcdesc']);
		$dir = "img/identitas/igdc";
		$file_size = $_FILES["igdcfile"]["size"];
		$file_loc = $_FILES["igdcfile"]["tmp_name"];
		$file_name = $_FILES["igdcfile"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim."_identitas.".$extension;

		$loc = $dir."/".$file_name;

		if($tim == '' || $member1 == '' || $member2 == '' || $title == '' || $description == ''){
			die("<script>alert('Data tidak boleh ada yang kosong!'); window.location.href=window.location.href;</script>");
		}

		if(cekExt($file_name)){
			if($file_size < 5000000){
				move_uploaded_file($file_loc, "$dir/$file_name");

				$isi = $conn->prepare("INSERT INTO igdc VALUES('', ?, ?, ?, ?, ?, ?, '', '', ?,'0','0')");
				$isi->bind_param("issssss",$id,$tim,$member1,$member2,$title,$description,$loc);

				if($isi->execute()){
					echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Pendaftaran gagal');</script>";
				}
				$isi->close();
			}else{
				echo "<script>alert('Cek kembali ukuran filenya');</script>";
			}
		}else{
			echo "<script>alert('Cek kembali ekstensi filenya');</script>";
		}
	}

	if(isset($_POST['isigame2'])){
		$video = strip_tags($_POST['igdcvideo']);
		$game = strip_tags($_POST['igdcapk']);
		
		$id = $info['id_user'];
		$que = $conn->prepare("UPDATE igdc SET video = ?, game = ? WHERE id_ketua = ?");
		$que->bind_param("ssi",$video,$game,$id);

		if($que->execute()){
			echo "<script>alert('Berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal');window.location.href=window.location.href;</script>";
		}
		$que->close();
		
	}

	if(isset($_POST['updateigdc'])){
		$title = strip_tags($_POST['igdctitle']);
		$description = htmlentities($_POST['igdcdesc']);
		$tim = htmlentities($_POST['igdctim']);
		$id = $info['id_user'];

		if($title == '' || $description == '' || $tim == ''){
			die("<script>alert('Data tidak boleh ada yang kosong!'); window.location.href=window.location.href;</script>");
		}

		$isi = $conn->prepare("UPDATE igdc SET tim = ?, judul = ?, deskripsi = ? WHERE id_ketua = ?");
		$isi->bind_param("sssi",$tim,$title,$description,$id);

		if($isi->execute()){
			echo "<script>alert('Pembaruan data berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Pembaruan data gagal');</script>";
		}
		$isi->close();

	}

	//mengisi formulir pendaftaran ISC
	if(isset($_POST['isisearching'])){
		$nim = preg_replace('/[^A-Za-z0-9\-]/', '', $info['no_identitas']);
		$id = $info['id_user'];
		$dir = "img/identitas/isc";
		$file_size = $_FILES["iscfile"]["size"];
		$file_loc = $_FILES["iscfile"]["tmp_name"];
		$file_name = $_FILES["iscfile"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim."_identitas.".$extension;

		$loc = $dir."/".$file_name;

		if(cekExt($file_name)){
			if($file_size < 5000000){
				move_uploaded_file($file_loc, "$dir/$file_name");

				$isi = $conn->prepare("INSERT INTO isc VALUES('', ?, ?,'0','0')");
				$isi->bind_param("is",$id,$loc);

				if($isi->execute()){
					echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Pendaftaran gagal');window.location.href=window.location.href;</script>";
				}
				$isi->close();
			}else{
				echo "<script>alert('Cek kembali ukuran filenya');window.location.href=window.location.href;</script>";
			}
		}else{
			echo "<script>alert('Cek kembali ekstensi filenya');window.location.href=window.location.href;</script>";
		}

	}

	if(isset($_POST['isiagrihack'])){
		$nim = preg_replace('/[^A-Za-z0-9\-]/', '', $info['no_identitas']);
		$id = $info['id_user'];
		$tim = htmlentities($_POST['ahteam']);
		$member1 = strip_tags($_POST['ahmember1']);
		$member2 = strip_tags($_POST['ahmember2']);
		$dir = "img/identitas/agrihack";
		$file_size = $_FILES["ahfile"]["size"];
		$file_loc = $_FILES["ahfile"]["tmp_name"];
		$file_name = $_FILES["ahfile"]["name"];
		$extension = end(explode(".", $file_name));
		$file_name = $nim."_identitas.".$extension;

		$loc = $dir."/".$file_name;

		if($tim == '' || $member1 == '' || $member2 == ''){
			die("<script>alert('Data tidak boleh ada yang kosong!'); window.location.href=window.location.href;</script>");
		}

		if(cekExt($file_name)){
			if($file_size < 5000000){
				move_uploaded_file($file_loc, "$dir/$file_name");

				$isi = $conn->prepare("INSERT INTO agrihack VALUES('', ?, ?, ?, ?, ?,'0','')");
				$isi->bind_param("issss",$id,$tim,$member1,$member2,$loc);

				if($isi->execute()){
					echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
				}else{
					echo "<script>alert('Pendaftaran gagal')</script>";
				}
				$isi->close();
			}else{
				echo "<script>alert('Cek kembali ukuran filenya')</script>";
			}
		}else{
			echo "<script>alert('Cek kembali ekstensi filenya')</script>";
		}

	}

	if(isset($_POST['isiseminar'])){
		$id = $info['id_user'];

		$isi = mysqli_query($conn, "INSERT INTO seminar VALUES('', '$id','0','0')");
		if($isi){
			echo "<script>alert('Pendaftaran berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Pendaftaran gagal')</script>";
		}
	}	

?>

