<?php
	
	include "../../connect_adm.php";
	
	if(isset($_POST['sesi'])){
		if($_POST['sesi'] == 1){
			$mulai = $_POST['mulai'];
			$selesai = $_POST['selesai'];

			$mulai = date_format(date_create($mulai), "Y-m-d H:i:s");
			$selesai = date_format(date_create($selesai), "Y-m-d H:i:s");

			$up = mysqli_query($conn, "UPDATE isc_waktu SET waktuMulai = '$mulai', waktuSelesai = '$selesai' WHERE sesi = 1");

			if($up){
				echo "Sukses Mengubah Waktu";
			}else{
				echo mysqli_error($conn);
			}
		}else if($_POST['sesi'] == 2){
			$mulai = $_POST['mulai'];
			$selesai = $_POST['selesai'];

			$mulai = date_format(date_create($mulai), "Y-m-d H:i:s");
			$selesai = date_format(date_create($selesai), "Y-m-d H:i:s");

			$up = mysqli_query($conn, "UPDATE isc_waktu SET waktuMulai = '$mulai', waktuSelesai = '$selesai' WHERE sesi = 2");

			if($up){
				echo "Sukses Mengubah Waktu";
			}else{
				echo mysqli_error($conn);
			}
		}else{
			echo "failed";
		}
	}
	
?>