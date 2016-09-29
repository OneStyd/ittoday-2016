<?php
	session_start();
	ob_start();

	include "php/conn-db.php";

	$inclusion="";
?>
<!--DOCTYPE html-->
<html>
	<?php 
		if(empty($_GET['soal1']) && empty($_GET['soal2'])){
			if(isset($_SESSION['isc_776g5'])){
				echo $_SESSION['isc_776g5'];
				header("location: home");
			}
			// include "php/login.php";
			include "php/main.php";
		}
	?>

<script src="js/login.js" type="text/javascript"></script>
</html>