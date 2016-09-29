<?php
	include "../../connect_adm.php";

	$id = $_POST['peserta'];
	$state = $_POST['status'];
	$no = $_POST['no'];

	$change = mysqli_query($conn, "UPDATE isc_jawaban_user SET status = $state, waktu_menjawab = waktu_menjawab WHERE id_peserta_isc = $id AND no_soal_isc = $no");

	if($change){
		echo "Sukses";
	}else{
		echo mysqli_error($conn);
	}


?>