<?php
	
	date_default_timezone_set("Asia/Jakarta");

	$awal = new DateTime("2016-07-02 21:00:00");
	$date[1] = new DateTime("2016-07-02 21:29:43");
	$date[2] = new DateTime("2016-07-02 21:34:40");

	$date[3] = new DateTime("2016-07-02 21:29:49");
	$date[4] = new DateTime("2016-07-02 21:29:55");

	$i = 1;
	while($i!=5){
		$diff = $date[$i]->getTimestamp() - $awal->getTimestamp();

		echo $i.">> ".$diff." Seconds\n";
		$i++;
	}

?>