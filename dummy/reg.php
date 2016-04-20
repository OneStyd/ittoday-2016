<?php
	include "login.php";
	include "connect.php";

	if(isset($_POST['registrasi'])){
		if(!isset($_POST['setuju'])){
			echo '<script language="javascript">alert("Anda harus menyetujui aturan main IT Today 2016");</script>';
			echo '<script>setTimeout(function(){window.location.href="index.php"},100);</script>';
		}else{
			echo $_POST['nama_lengkap'], $_POST['email'], md5($_POST['password']), $_POST['no_hp'], $_POST['alamat'], $_POST['identitas'], $_POST['institusi'], $_POST['tahun_masuk'];


			$qry = mysqli_query($conn, "INSERT INTO $tablename (nama_lengkap, email, password, no_hp, alamat, no_identitas, institusi, tahun_masuk) VALUES('".$_POST['nama_lengkap']."','".$_POST['email']."','".md5($_POST['password'])."', '".$_POST['no_hp']."', '".$_POST['alamat']."','".$_POST['identitas']."', '".$_POST['institusi']."',".$_POST['tahun_masuk'].")") or die(mysql_error());

			if($qry){
				if(log_in_setelah_mendaftar($_POST['identitas'])){
				echo '<script language="javascript">alert("Mendaftar sukses");</script>';
				echo '<script>setTimeout(function(){window.location.href="acara.php"},100);</script>';}
			}
			else echo 'gagal :(';
		}
	}
?>