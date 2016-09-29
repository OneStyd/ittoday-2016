<?php
	include "connect_adm.php";

	if(isset($_POST['id_user'])){
		$id = $_POST['id_user'];
		$status = $_POST['status'];
		$change = mysqli_query($conn, "UPDATE agrihack SET invalid=$status WHERE id_ketua = $id");
		
		if($change){
			echo "Verifikasi berhasil di-update";
		}else{
			echo "Verifikasi gagal di-update";
		}
	}
	
?>