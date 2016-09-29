<?php
	$conn = new mysqli('localhost', 'ittodayw_root', 'ithariiniipb', 'ittodayw_2016');
	$tablename = "ittoday";
	$unique = "kestari_nSQHlKi1vq";

	function cek_login(){
		if(isset($_SESSION[$unique])){
			return true;
		}
		return false;
	}
?>