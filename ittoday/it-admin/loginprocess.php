<?php

	include "connect_adm.php";

	
	if(isset($_POST['user_id'])){
		$user_valid = array("kestari", "superadmin", "acara");
		if(!in_array($_POST['user_id'], $user_valid)){
		      echo "usernotexist";	
		}else{
		$kestari = $_POST['user_id'];
		$query = $conn->prepare("SELECT id_user, password FROM ittoday WHERE email = ? LIMIT 1");
		
		$query->bind_param("s", $kestari);
		$query->execute();
		$query->store_result();

		$query->bind_result($id_kestari, $db_pass);
		$query->fetch();

		$pass = $_POST['pass'];

		//echo $pass, " ", $db_pass;
		if($kestari == ""){
			echo "noinput";
		}else{
			if($query->num_rows == 1){
				if($db_pass == md5($pass)){
					session_start();
					$_SESSION[$unique] = $id_kestari;
					$_SESSION['last_activity'] = time();
					$_SESSION['expire_time'] = 15*60; //session will be expired after 15 minutes of inactivity - security purpose
					$_SESSION['SERVER_GENERATED_SID'] = true;
					// $_SESSION['logged_in'] = true;
					echo '<script>window.location.href=window.location.href</script>';
	            }
	            else{
	            	echo 'wrongpass';
	            }
			}else{
				echo 'usernotexist';
			}
		}
	    }


	}

?>