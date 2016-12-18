<?php
	$conn = new mysqli('HOST', 'USERNAME', 'PASSWORD', 'DATABASE');
	$tablename = table;

	function log_out(){
		session_start();
		unset($_SESSION['ittoday_user']);
		if(session_destroy()){
			return true;
		}else {
			return false;
		}
	}

	function cek_login(){
		if(isset($_SESSION['ittoday_user'])){
			return true;
		}
		return false;
	}
?>
