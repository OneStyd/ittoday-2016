<?php
	$conn = new mysqli('localhost', 'root', '1234', 'ittoday_2016');
	$tablename = "ittoday";

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