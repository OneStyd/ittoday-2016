<?php
	
	function batasAcara($acara, $tipe){
		if($acara == "igdc"){
			if($tipe == 1){
				$daftarDL = '2016-08-28';
				return $daftarDL;
			}else if($tipe == 2){
				$penyisihanDL = '2016-08-29';
				return $penyisihanDL;
			}else if($tipe == 3){
				$pengumuman = '2016-08-31';
				return $pengumuman;
			}
		}

		if($acara == "isc"){
			if($tipe == 1){
				$daftarDL = '2016-09-10';
				return $daftarDL;
			}else if($tipe == 2){
				$pengumuman = '2016-09-15';
				return $pengumuman;
			}
		}

		if($acara == "agrihack"){
			if($tipe == 1){
				$daftarDL = '2016-08-29';
				return $daftarDL;
			}
		}

		if($acara == "seminar"){
			if($tipe == 1){
				$daftarDL = '2016-09-18';
				return $daftarDL;
			}
		}
	}

?>