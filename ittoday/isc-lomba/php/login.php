<?php
	
	include "conn-db.php";

	if(isset($_POST['email']) && isset($_POST['pass'])){
		$email = $_POST['email'];
		// $log = mysqli_query($conn, "SELECT id_peserta, ittoday.id_user, email, nama_lengkap, password FROM (ittoday JOIN isc ON ittoday.id_user=isc.id_user) WHERE email = '$email'");
		
		// if(mysqli_num_rows($log)!=0){
		// 	$pass = $_POST['pass'];
		// 	$log = mysqli_fetch_array($log);
		// 	if(md5($pass) === $log['password']){
		// 		$_SESSION['isc_776g5'] = $email;
		// 		header("location: home");
		// 	}else{
		// 		echo "<script>alert('Password Salah')</script>";
		// 	}
		// }else{
		// 	echo "<script>alert('Peserta tidak terdaftar')</script>";
		// }
		$query = $conn->prepare("SELECT id_peserta, ittoday.id_user, nama_lengkap, password FROM (ittoday JOIN isc ON ittoday.id_user=isc.id_user) WHERE email = ? LIMIT 1");
		/*1*/ 
		// $query = $conn->prepare("SELECT id_peserta, ittoday.id_user, nama_lengkap, password FROM (ittoday JOIN isc ON ittoday.id_user=isc.id_user) WHERE email = ? AND status_bayar_isc = 1 LIMIT 1");
		
		$query->bind_param("s", $email);
		$query->execute();
		$query->store_result();

		$query->bind_result($peserta, $user, $nama_lengkap, $db_pass);
		$query->fetch();

		$pass = $_POST['pass'];

		//echo $pass, " ", $db_pass;
		if($email == ""){
			echo "noinput";
		}else{
			if($query->num_rows == 1){
				if($db_pass == md5($pass)){
					session_start();
					$_SESSION['isc_776g5'] = $email;
					echo $nama_lengkap;
	            }
	            else{
	            	echo 'wrongpass';
	            }
			}else{
				echo 'usernotexist';
			}
		}
	}
	

?>