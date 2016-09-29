<?php
	require_once("../author/connect.php");

	$mail = addslashes(htmlentities($_POST['mail']));
	$acara = $_POST['acara'];

	if($acara == 'igdc'){
		$lolos = array(1,86,44,164,222,41,154,217,92,53,282);
		$query = mysqli_query($conn,"SELECT * FROM (ittoday JOIN igdc on id_user = id_ketua) WHERE email = '$mail'");
		$fetch = mysqli_fetch_assoc($query);
		
		if(!mysqli_num_rows($query)){
			echo "Anda tidak terdaftar";
		}else{
			if($fetch['status_bayar_igdc'] != 1){
				echo "Anda belum melunasi pembayaran";
			}elseif(in_array($fetch['id_user'], $lolos)){
				if($fetch['hadir_igdc']==0){
					mysqli_query($conn, "UPDATE igdc SET hadir_igdc = 1 WHERE id_ketua=".$fetch['id_ketua']."");
					echo "berhasil absen";
				}elseif($fetch['hadir_igdc']==1){
					echo "Anda sudah melakukan presensi!";
				}
			}else{
				echo "Anda tidak lolos";
			}
		}
	}elseif($acara == 'isc'){
		$query = mysqli_query($conn,"SELECT * FROM (ittoday JOIN isc on ittoday.id_user = isc.id_user) WHERE email = '$mail'");
		$fetch = mysqli_fetch_assoc($query);
		
		if(!mysqli_num_rows($query)){
			echo "Anda tidak terdaftar";
		}else{
			if($fetch['status_bayar_isc'] != 1){
				echo "Anda belum melunasi pembayaran";
			}else{
				if($fetch['hadir_isc']==0){
					mysqli_query($conn, "UPDATE isc SET hadir_isc = 1 WHERE id_peserta=".$fetch['id_peserta']."");
					echo "berhasil absen";
				}elseif($fetch['hadir_isc']==1){
					echo "Anda sudah melakukan presensi!";
				}
			}
		}
	}elseif($acara == 'seminar'){
		$query = mysqli_query($conn,"SELECT * FROM (ittoday JOIN seminar on ittoday.id_user = seminar.id_user) WHERE email = '$mail'");
		$fetch = mysqli_fetch_assoc($query);
		
		if(!mysqli_num_rows($query)){
			echo "Anda tidak terdaftar";
		}else{
			if($fetch['status_bayar_sem'] != 1){
				echo "Anda belum melunasi pembayaran";
			}else{
				if($fetch['hadir_seminar']==0){
					mysqli_query($conn, "UPDATE seminar SET hadir_seminar = 1 WHERE id_peserta=".$fetch['id_peserta']."");
					echo "berhasil absen";
				}elseif($fetch['hadir_seminar']==1){
					echo "Anda sudah melakukan presensi!";
				}
			}
		}
	}
?>