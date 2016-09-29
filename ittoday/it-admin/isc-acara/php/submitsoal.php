<?php
	
	if(isset($_POST['btn_submit'])){
		$num = $_POST['nosoal'];
		$que = $_POST['pertanyaan'];
		$ans = $_POST['jawaban'];
		$sou = $_POST['source'];

		if (!preg_match("~^(?:f|ht)tps?://~i", $sou)) {
	        $sou = "http://" . $sou;
	    }

		$insert_soal = mysqli_query($conn, "INSERT INTO isc_soal VALUES('$num', '$que', '$ans', '$sou')");

		if($insert_soal){
			echo "<script>alert('Menambahkan soal berhasil');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal menambahkan soal');window.location.href=window.location.href;</script>";
		}
	}

?>