<?php
	include "connect.php";
	
	// $agricode = $_POST['check_ac'];
	// $agrihack = $_POST['check_ah'];
	// $igdc = $_POST['check_igdc'];
	// $isc = $_POST['check_isc'];
	// $seminar = $_POST['check_seminar'];
	$id_user = $_POST['pilcar'];
	
	if(isset($_POST['check_ac'])){
		$baju_ac = $_POST['ukuran_baju_ac'];
		$updir_ac = "file/agricode";
		$idsize_ac = $_FILES["ktm_ac"]["size"];
		$idloc_ac = $_FILES["ktm_ac"]["tmp_name"];
		$idname_ac = $_FILES["ktm_ac"]["name"];
	
		move_uploaded_file($idloc_ac, "$updir_ac/$idname_ac");
		$tambah_ac = "INSERT INTO agricode(id_user, ukuran_baju, kartu_mahasiswa) 
					  VALUE($id_user,'$baju_ac','$updir_ac/$idname_ac')";
		mysqli_query($conn, $tambah_ac);
	}
	if(isset($_POST['check_ah'])){
		$baju_ah = $_POST['ukuran_baju_ac'];
		$updir_ah = "file/agrihack";
		$idsize_ah = $_FILES["ktm_ah"]["size"];
		$idloc_ah = $_FILES["ktm_ah"]["tmp_name"];
		$idname_ah = $_FILES["ktm_ah"]["name"];
	
		move_uploaded_file($idloc_ah, "$updir_ah/$idname_ah");
		$tambah_ah = "INSERT INTO agrihack(id_user, ukuran_baju, kartu_mahasiswa) 
					  VALUE($id_user,'$baju_ah','$updir_ah/$idname_ah')";
		mysqli_query($conn, $tambah_ah);
	}
	if(isset($_POST['check_igdc'])){
		$tim = $_POST['nama_tim'];
		$anggota_1 = $_POST['anggota_1'];
		$idanggota_1 = $_POST['id_anggota_1'];
		$anggota_2 = $_POST['anggota_2'];
		$idanggota_2 = $_POST['id_anggota_2'];
		$updir_igdc = "file/igdc";
		$idsize_igdc = $_FILES["ktm_igdc"]["size"];
		$idloc_igdc = $_FILES["ktm_igdc"]["tmp_name"];
		$idname_igdc = $_FILES["ktm_igdc"]["name"];
			
		move_uploaded_file($idloc_igdc, "$updir_igdc/$idname_igdc");
		$tambah_igdc = "INSERT INTO igdc(id_user, nama_tim, anggota_1, id_anggota_1, anggota_2, id_anggota_2, identitas_tim) 
						VALUE($id_user,'$tim','$anggota_1','$idanggota_1','$anggota_2','$idanggota_2','$updir_igdc/$idname_igdc')";
		mysqli_query($conn, $tambah_igdc);
	}
	if(isset($_POST['check_isc'])){
		$tambah_isc = "INSERT INTO isc(id_user) 
					   VALUE($id_user)";
		mysqli_query($conn, $tambah_isc);
	}
	if(isset($_POST['check_seminar'])){
		$tambah_sem = "INSERT INTO seminar(id_user) 
					   VALUE($id_user)";
		mysqli_query($conn, $tambah_sem);
	}
	mysqli_close($conn);
?>
	<script language="javascript">alert("Register Successful");</script>
	<script>document.location.href='acara.php';</script>