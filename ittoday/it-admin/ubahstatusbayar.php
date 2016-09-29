<?php
	include "connect_adm.php";

	$id = $_POST['id_user'];
	$status = $_POST['status'];

	if(isset($_POST['acara'])){
		if($_POST['acara'] === "igdc"){
			$ubah = mysqli_query($conn, "UPDATE igdc SET status_bayar_igdc = $status WHERE id_ketua = $id");

			if(!$ubah){
				echo "gagal";
			}
			if($ubah && ($status==0)){
				echo ".";
			}
		}
		if($_POST['acara'] === "isc"){
			$ubah = mysqli_query($conn, "UPDATE isc SET status_bayar_isc = $status WHERE id_user = $id");

			if(!$ubah){
				echo "gagal";
			}
			if($ubah && ($status==0)){
				echo ".";
			}
		}
		if($_POST['acara'] === "dis"){
			$ubah = mysqli_query($conn, "UPDATE digishare SET status_bayar_dis = $status WHERE id_ketua = $id");

			if(!$ubah){
				echo "gagal";
			}
			if($ubah && ($status==0)){
				echo ".";
			}
		}
		if($_POST['acara'] === "ah"){
			$ubah = mysqli_query($conn, "UPDATE agrihack SET status_bayar_ah = $status WHERE id_ketua = $id");

			if(!$ubah){
				echo "gagal";
			}
			if($ubah && ($status==0)){
				echo ".";
			}
		}
		if($_POST['acara'] === "sit"){
			$ubah = mysqli_query($conn, "UPDATE seminar SET status_bayar_sem = $status WHERE id_user = $id");

			if(!$ubah){
				echo "gagal";
			}

			if($ubah && ($status==0)){
				echo ".";
			}
		}
	}


?>