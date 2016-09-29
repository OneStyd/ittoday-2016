<?php 
	$days = Array ("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
	$months = Array (1=>"Januari", 2=>"Pebruari", 3=>"Maret", 4=>"April", 5=>"Mei", 6=>"Juni", 7=>"Juli", 8=>"Agustus", 9=>"September", 10=>"Oktober", 11=>"Nopember", 12=>"Desember");
	
	echo $days[date("w")].", ".date("d ").$months[date("n")].date(" Y, H:i")." WIB"; 

?>