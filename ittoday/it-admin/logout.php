<?php
	include "connect_adm.php";
	session_start();

	unset($_SESSION[$unique]);
	if(session_destroy()){
		if(empty($_GET['returnURL']) || $_GET['returnURL'] == '/it-admin/')
			header("location:./");
		else
			header("location: login.php?returnURL=".urlencode($_GET['returnURL'])."");
	}else {
		return false;
	}
?>