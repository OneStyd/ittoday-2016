<section id="intro" class="intro-section">
	<div class="container row-login">
		<div class="col-md-6 col-md-offset-3">

<?php
	if(isset($_SESSION['ittoday_user']) || empty($_GET['verify'])){
		header("location:./");
	}
	$verify = addslashes(urldecode($_GET['verify']));
	$verifymail = urldecode($_GET['email']);

	//echo $verify, " ", $verifymail;
	if (isset($_POST['confirmpwdreset'])) {	
		$resetpwd="UPDATE ittoday SET password='". md5($_POST['newpwd'])."' WHERE email='".$verifymail."'"; 
		
		if(mysqli_query($conn, $resetpwd)){
			$removeverifystring="UPDATE ittoday SET forgotpwd='' WHERE email='".$verifymail."'";
			mysqli_query($conn, $removeverifystring);
		} ?>
		<div class="alert alert-success"><b>Password akun Anda berhasil direset. Silakan login dengan password baru. <script>window.setTimeout(function(){ window.location.href = 'login';}, 2000);</script></b></div>
	<?php
	}else{
		if($verify!=''){
			$sql = "SELECT * FROM ittoday WHERE forgotpwd= '" . $verify . "' AND email = '" .$verifymail . "';";
			$result = mysqli_query($conn, $sql);
			$numrows = mysqli_num_rows($result);
			
			if($numrows == 1) {
				$row = mysqli_fetch_assoc($result);
	?>

				<h3>Hai, "<?php echo $verifymail ?>"</h3>
				<legend style='color:#800c24; font-size:15px;'>Silakan masukkan password baru.</legend>
				<script src="js/reg.js" type="text/javascript"></script>
				<form name="reset" action="" method="post">
					<div class="form-group">
						<label for="newpwd">Password baru</label>
						<input type="password" name="newpwd" id="password_r" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="confirmpwd">Konfirmasi password</label>
						<input type="password" name="confirmpwd" id="password2_r" onkeyup="cekPass2(), disabledV()" class="form-control" required>
						<div id="pass_error2"></div>
					</div>
					<button type="submit" class="btn btn-danger" name="confirmpwdreset" id="registrasi_btn" style="position:relative;right:0;" disabled>Submit</button>

				</form>

		<?php	}else{  ?>

			<div class="alert alert-danger">Link sudah kadaluarsa atau memang tidak tersedia <script>window.setTimeout(function(){ window.location.href = './';}, 1500);</script></div>
<?php		}
		}else{ ?>
			<div class="alert alert-danger">Link sudah kadaluarsa atau memang tidak tersedia <script>window.setTimeout(function(){ window.location.href = './';}, 1500);</script></div>
<?php	}} ?>
		</div>
	</div>
</section>