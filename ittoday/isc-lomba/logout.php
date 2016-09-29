<?php
	session_start();
	unset($_SESSION['isc_776g5']);
	if(session_destroy()){
		if(empty($_GET['soal1']) && empty($_GET['soal2'])){
			header("location: ./");
		}
	}
	else{
		echo "gak bisa";
	}

?>