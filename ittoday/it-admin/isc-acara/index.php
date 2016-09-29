<?php
	session_start();
	session_regenerate_id();

	if($_SERVER['SERVER_PORT'] !== 443 && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')) {
  		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}

	if(!isset($_SESSION['SERVER_GENERATED_SID'])){
		session_destroy();
	}

	include "../connect_adm.php";

	if(empty($_SESSION[$unique])){
   		header("location: ../login.php");
  	}else{
		if($_SESSION['last_activity'] < time()-$_SESSION['expire_time']) { //have we expired?
		    //redirect to logout.php
		    header("Location: ../logout.php?returnURL=".urlencode($_SERVER['REQUEST_URI']).""); 
		}else{ //if we haven't expired:
		    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
		}
	}

  	if(isset($_SESSION[$unique]) && $_SESSION[$unique] != 19){
  		header("location: ../");
  	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ISC &#187; Admin - IT Today IPB 2016</title>
	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-table.css" rel="stylesheet">
	<link href="../css/bootstrap-select.min.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">

	<script src="../js/lumino.glyphs.js"></script>
	<script src="ckeditors/ckeditor.js"></script>

	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="js/moment-with-locales.js"></script>
  	<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>


	
</head>
<body onload="startTime()">

	<?php
		include "php/navigasi.php";

		$active = array();
		if(empty($_GET['halaman'])){
			$active['dashboard'] = "active";
			include "php/sidebar.php";
			include "halaman/dashboard.php";
		}
		else if(isset($_GET['halaman'])){
			$page = $_GET['halaman'];
			$active[$page] = "active";
			include "php/sidebar.php";

			if(include "halaman/".$page.".php");
			else{
				header("location: ./");
			}
		}
	?>

	<!-- FOOTER -->
	<script>
		function startTime() {
		    
		    $.ajax({
		    	url: "php/time.php",
		    	success: function(data){
		  		var today = new Date(data*1000);
		  		 		    
		    		var h = today.getHours();
		    		var m = today.getMinutes();
		   		var s = today.getSeconds();
		    
		   		h = checkTime(h);
		    		m = checkTime(m);
		    		s = checkTime(s);
		    		
		    		
			  	$('#txt').html(h + ":" + m + ":" + s + " WIB");

			}
		    
		    });

		   // document.getElementById('txt').innerHTML = h + ":" + m + ":" + s + " WIB";
		    var t = setTimeout(startTime, 500);
		}
		function checkTime(i) {
		    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		    return i;
		}
	</script>
	<script src="../js/bootstrap-table.js"></script>
	<script src="../js/bootstrap-select.min.js"></script>
	<!-- FOOTER -->
</body>
</html>