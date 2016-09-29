<?php
	require_once("conn-db.php");
	function checkNull($peserta, $soal){
		$opt = mysqli_query($GLOBALS['conn'], "SELECT * FROM isc_jawaban_user WHERE id_peserta_isc = $peserta AND no_soal_isc = $soal");
		if(mysqli_num_rows($opt)){
			return false;
		}else{
			return true;
		}
	}

	function cekStatus($jawaban, $soal){
		$ans = mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'], "SELECT jawaban FROM isc_soal WHERE no_soal = $soal"));
		$arrayAns = explode(';', $ans['jawaban']);

		foreach($arrayAns as &$value){
			$value = strtolower(trim($value, " "));
		}

		// $arrayAns = array_map('strtolower', $arrayAns);
		if(in_array(strtolower($jawaban), $arrayAns)){
			return 1;
		}else{
			return 0;
		}
	}

	function emptyField($source, $jawaban){
		if($source == "" && $jawaban == ""){
			return true;
		}else{
			return false;
		}
	}

	if(isset($_POST['btn_submit'])){

		$status = cekStatus($_POST['jawaban'], $_POST['no_soal']);

		if($_POST['source'] == "" || $_POST['jawaban'] == ""){
			$status = 0;
		}
		if(!emptyField($_POST['source'], $_POST['jawaban'])){
			if ($_POST['source'] != "" && !preg_match("~^(?:f|ht)tps?://~i", $_POST['source'])) {
	        	$_POST['source'] = "http://".$_POST['source'];
	   	 	}
			if(checkNull($_POST['id_peserta'], $_POST['no_soal'])){
				$date = date("Y-m-d H:i:s");
				mysqli_query($conn, "INSERT INTO isc_jawaban_user VALUES('','".$_POST['id_peserta']."','".$_POST['no_soal']."','".addslashes(htmlspecialchars($_POST['jawaban']))."','".addslashes(htmlspecialchars($_POST['source']))."','$status','$date')");
			}else{
				mysqli_query($conn, "UPDATE isc_jawaban_user SET jawaban_user = '".addslashes(htmlspecialchars($_POST['jawaban']))."', sumber_user='".addslashes(htmlspecialchars($_POST['source']))."', status='$status' WHERE no_soal_isc = ".addslashes($_POST['no_soal'])." AND id_peserta_isc = ".$_POST['id_peserta']."");
			}
		}
	}
?>