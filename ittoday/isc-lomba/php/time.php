<?php
	
	require_once("conn-db.php");

	$waktus1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM isc_waktu WHERE sesi = 1"));
	$waktus2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM isc_waktu WHERE sesi = 2"));

	date_default_timezone_set('Asia/Jakarta');

	$valid = array();

	$pelaksanaan1 = new DateTime($waktus1['waktuMulai']);
	$pelaksanaan2 = new DateTime($waktus2['waktuMulai']);

	$timeFirst = new DateTime();
	$timeSecond = new DateTime($waktus1['waktuSelesai']); //akhir perlombaan sesi1
	$timeThird = new DateTime($waktus2['waktuSelesai']); //akhir perlombaan sesi2

	if(($timeFirst <= $timeSecond)  && ($timeFirst >= $pelaksanaan1)){
		$diffInSeconds = $timeSecond->getTimestamp() - $timeFirst->getTimestamp();
		$valid['s1'] = true;
		$valid['s2'] = false;
	}else if(($timeFirst <= $timeThird) && ($timeFirst >= $pelaksanaan2)){
		$diffInSeconds = $timeThird->getTimestamp() - $timeFirst->getTimestamp();
		$valid['s1'] = false;
		$valid['s2'] = true;
	}else{
		$valid['s1'] = false;
		$valid['s2'] = false;
	}

	if($timeFirst > $timeThird){
		$valid['s2'] = false;
	}


?>