<?php
	include "login.php";

	if (isset($_POST['logout'])){
		log_out();
	}else if(isset($_POST['acara'])){
		header("location: acara.php");
	}

	if(buat_session()){
		echo '<div class="container">';
		$info = get_user_info($_SESSION['ittoday_user']);
		echo 'you are already log in<br/>';
		echo $_SESSION['ittoday_user'], " | ", $info['nama_lengkap'], " | ", $info['alamat'], " | ", $info['institusi'].
			" | ", $info['no_hp'], " | ", $info['email'], " ", $info['tahun_masuk'];
		echo'
		<form id="registrasi" action="" method="post">
		<button type="submit" class="btn btn-danger" name="logout" value="1">Log Out</button>
		<button type="submit" class="btn btn-danger" name="acara" value="1">Pilihan Acara</button><br/>
		</form> </div>';

	}else{
		echo 'you are not log in';
	}

?>

<html>
<head>
	<title>IT Today 2016 - Grow Indonesia's Future with Technology</title>
	<link href="./css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="./css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
	
	<!-- javascript -->
	<script src="./js/bootstrap.js" type="text/javascript"></script>
	<script src="./js/jquery.min.js" type="text/javascript"></script>
 	<script src="./js/bootstrap.min.js" type="text/javascript"></script>
 	<!-- end javascript -->
</head>
<body>

	
	<div class="container">
		<ul class="nav nav-tabs">
			<li><a href="#registrasi1" data-toggle="tab">Registrasi</a></li>
			<li><a href="#login" data-toggle="tab">Login</a></li>
		</ul>
		<div class="tab-content">
		<div class="tab-pane active" id="registrasi1">

		<h3>Registration Process</h3>
		<?
			if(!cek_login()){
		?>
			<form id="registrasi" action="reg.php" method="post">
			<input type="hidden" name="registrasi" value="1"/>
			<div class="form-group">
				<label for="username">Nama Lengkap</label><br/>
				<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required/>
			</div>
			<div class="form-group">
				<label for="email">Email</label><br/>
				<input type="email" class="form-control" name="email" id="email" required/>
			</div>
			<div class="form-group">
				<label for="password">Password</label><br/>
				<input type="password" class="form-control" name="password" id="password" required/>
			</div>
			<!-- <div class="form-group">
				<label for="password2">Konfirmasi Password</label><br/>
				<input type="password" class="form-control" name="password2" id="password2" required/>
			</div> -->
			<div class="form-group">
				<label for="password">Nomor Handphone</label><br/>
				<input type="number" class="form-control" name="no_hp" id="no_hp" required/>
			</div>
			<div class="form-group">
				<label for="alamat">Alamat Saat Ini</label><br/>
				<input type="text" class="form-control" name="alamat" id="alamat" required/>
			</div>
			<div class="form-group">
				<label for="identitas">Nomor Identitas (Kartu Mahasiswa/KTP/SIM)</label><br/>
				<input type="text" class="form-control" name="identitas" id="identitas" required/>
			</div>
			<div class="form-group">
				<label for="institusi">Institusi</label><br/>
				<input type="text" class="form-control" name="institusi" id="institusi" required/>
			</div>
			<div class="form-group">
				<label for="tahun_masuk">Tahun Masuk</label><br/>
				<input type="number" class="form-control" name="tahun_masuk" id="tahun_masuk" required/>
			</div>
			<input type="checkbox" name="setuju" value="1"> Saya bersedia mematuhi aturan main IT Today 2016<br/><br/>
			<button type="submit" class="btn btn-danger" value="Proceed">Proceed</button>
			</form>
		<?
			}else{
				echo "lu kan udah bisa login kambing!";}
		?>

		</div>


		<div class="tab-pane" id="login">
		
		<h3>Login Process</h3>
		<?
		// if (!empty($info['no_identitas'])){
			if(!cek_login()){
		?>
			<form id="registrasi" action="login.php" method="post">
			<input type="hidden" name="login" value="1"/>
			<div class="form-group">
				<label for="email">Email</label><br/>
				<input type="email" class="form-control" name="email" id="email" required/>
			</div>
			<div class="form-group">
				<label for="password">Password</label><br/>
				<input type="password" class="form-control" name="password" id="password" required/>
			</div>
			<button type="submit" class="btn btn-danger" value="Proceed">Proceed</button>
			</form>
		<?
			// }
		}else{
				echo "lu udah login kambing!";
		}
		?>
			</div>
		</div>
	</div>
		

<!-- footer -->
	<div class="footer">
		<div class="container">
			<p style="text-align:center">&copy; IT Today IPB 2016 | Page created by Fadhlal K. Surado</p>
		</div>
	</div>

</body>
</html>