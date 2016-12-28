<?php
	$conn = new mysqli(HOST, USER, PASS, DB);
	$tablename = table;
	$unique = unique_key;

	function cek_login(){
		if(isset($_SESSION[$unique])){
			return true;
		}
		return false;
	}
?>
