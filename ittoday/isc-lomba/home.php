<?php	
	ob_start();
	session_start();

	if(empty($_SESSION['isc_776g5'])){
		if(empty($_GET['soal1']) || empty($_GET['soal2']))
			header("location: ./");
		else if(!empty($_GET['soal1']) || !empty($_GET['soal2']))
			header("location: ../");
	}
	
	include "php/conn-db.php";
	include "php/time.php";

	date_default_timezone_set("Asia/Jakarta");

	$inclusion="";
	if(isset($_GET['soal1']) || isset($_GET['soal2'])){
		$inclusion="../";
	}

	$info = "SELECT ittoday.id_user, nama_lengkap, no_identitas, id_peserta FROM (ittoday JOIN isc ON ittoday.id_user = isc.id_user) WHERE email='".$_SESSION['isc_776g5']."'";
	$info = mysqli_fetch_assoc(mysqli_query($conn,$info));

	if(isset($_GET['soal1'])){
		$title = "Soal Sesi 1";
	}else if(isset($_GET['soal2'])){
		$title = "Soal Sesi 2";
	}else{
		$title = "Beranda";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> - ISC 2016 | Raising Your Searching Skill for Better Knowledge</title>
	<link href="http://isc.ittoday.web.id/img/isc_logo.png" rel="icon" type="image/png"/>
	<?php include "php/header.php" ?>
</head>
<body>
	<?php include "php/navigasi.php"; ?>
	<div class="centered" style="background-color: #fff;border-radius:5px;border: solid #ccc 1px;margin-top:85px;">
		<div class="paragraph">
				
			<?php
				if(empty($_GET['soal1']) && empty($_GET['soal2'])){
					include "page/tos.php";
				}else if(isset($_GET['soal1']) && $valid['s1']){
						include "page/soal1.php";
				}else if(isset($_GET['soal2']) && $valid['s2']){
						include "page/soal2.php";
				}else if(isset($_GET['soal1']) && !$valid['s1']){
					if($timeFirst < $pelaksanaan1)
						include "page/denied.php";
					else
						include "page/selesai.php";
				}else if(isset($_GET['soal2']) && !$valid['s2']){
					if($timeFirst < $pelaksanaan2)
						include "page/denied.php";
					else
						include "page/selesai.php";
				}else{
					echo "404";
				}
			?>
		</div>
	</div>

	<script>
		$.ajax({
			url: "<?php echo $inclusion; ?>php/navtime.php",
			success: function(data){
				$('#navtime').html(data);
			}
		});
			
		$(document).everyTime('1s', function(){
			//alert("wow");
			$.ajax({
				url: "<?php echo $inclusion; ?>php/navtime.php",
				success: function(data){
					$('#navtime').html(data);
				}
			});
		})
	</script>
<?php include "php/footer.php"; ?>

</body>
</html>