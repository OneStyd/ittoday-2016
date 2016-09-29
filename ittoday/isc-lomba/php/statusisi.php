<?php
	function isAnswer($nomor, $peserta){
		$cek = mysqli_query($GLOBALS['conn'], "SELECT jawaban_user, sumber_user FROM isc_jawaban_user WHERE id_peserta_isc = $peserta AND no_soal_isc = $nomor ");

		if(!mysqli_num_rows($cek)){
			return false;
		}
		$cek = mysqli_fetch_assoc($cek);
		if(($cek['jawaban_user'] != "" && $cek['sumber_user'] != "")){
			return true;
		}else{
			return false;
		}

	}


	function isSubmitted($nomor, $peserta){
		$cek = mysqli_query($GLOBALS['conn'], "SELECT jawaban_user, sumber_user FROM isc_jawaban_user WHERE id_peserta_isc = $peserta AND no_soal_isc = $nomor ");

		if(!mysqli_num_rows($cek)){
			return 0;
		}

		return $cek;
	}

	if(isset($_GET['soal1'])){
		$no = $_GET['soal1'];
	}else if(isset($_GET['soal2'])){
		$no = $_GET['soal2'];
	}

	if(!isSubmitted($no, $info['id_peserta'])){
		$jawaban_user = "";
		$sumber_user = "";
	}else{
		$status = mysqli_fetch_assoc(isSubmitted($no, $info['id_peserta']));
		$jawaban_user = stripslashes($status['jawaban_user']);
		$sumber_user = stripslashes($status['sumber_user']);
	}


?>