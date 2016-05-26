<?php
	if(isset($_SESSION['ittoday_user'])){
		header("location: ./");
	}

	if(isset($_POST['login'])){
		$email = $_POST['email'];

		$stmt = $conn->prepare("SELECT id_user, password FROM ittoday WHERE email = ? LIMIT 1");

		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();

		$stmt->bind_result($user, $db_password);
		$stmt->fetch();

		$password = $_POST['password'];
		if($stmt->num_rows==1){
			if ($db_password == md5($password)){
				$_SESSION['ittoday_user'] = $email;
				echo '<script>window.location.href="./"</script>';
			}
			else
				echo '<script>alert("login gagal: password tidak cocok");</script>';
		}
		else echo '<script>alert("login gagal: email atau password salah");</script>';

		mysqli_close($conn);
	}

	if(isset($_POST['registrasi'])){
		if(empty($_POST['setuju'])){
			echo "<script>alert('Anda harus menyetujui ketentuan kami.');</script>";
		}
		if($_POST['password'] != $_POST['password2']){
			echo "<script>alert('Konfirmasi Password tidak sama.');</script>";
			
		}else{

		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$cek = mysqli_query($conn, "SELECT email FROM ittoday WHERE email='$email'");

		if(mysqli_num_rows($cek)>0){
			echo '<script>alert("login gagal: email sudah terdaftar!");</script>';
		}else{
			$daftar = mysqli_query($conn, "INSERT INTO ittoday (email, password) VALUES('$email', '$password')") or die(mysqli_error());

			if($daftar){
				// session_start();
				$_SESSION['ittoday_user'] = $email;
				echo "<script>window.location.href='user';</script>";
			}else{
				echo '<script>alert("login gagal: email sudah terdaftar!");</script>';
			}
			mysqli_free_result($daftar);
		}
		mysqli_free_result($cek);
		mysqli_close($conn);
		}
	}
?>	
		<section id="intro" class="intro-section page-section">
			<div class="row-login">
				<div class="col-md-5 col-md-offset-1">
					<h2>Login</h2>
					<form id="login" action="" method="post">
						<input type="hidden" name="login" value="1"/>
						<div class="form-group">
							<label for="email">Email</label><br/>
							<input type="email" class="form-control" name="email" id="email" required/>
						</div>
						<div class="form-group">
							<label for="password">Password</label><br/>
							<input type="password" class="form-control" name="password" id="password" required/>
						</div>
						<button type="submit" class="btn btn-danger" value="Proceed">Proceed</button><br><br>
					</form>
				</div>
				<div class="col-md-5">
					<script src="js/reg.js" type="text/javascript"></script>
					<h2>Registrasi</h2>
					<center><p>Pendaftaran akan dibuka tanggal 1 Juni 2016</p></center>
					<form id="registrasi" action="" method="post" hidden>
						<input type="hidden" name="registrasi" value="1"/>
						<div class="form-group">
							<label for="email_r">Email<span>*</span></label><br/>
							<input type="email" class="form-control" name="email" onkeyup="validasiEmail()" onchange="validasiEmail(); disabledT()" id="email_r" required/>
							<span id="email_error" onload="disabledT()"></span>
						</div>
						<div class="form-group">
							<label for="password_r">Password<span>*</span></label><br/>
							<input type="password" class="form-control" name="password" id="password_r" required/>
						</div>
						<div class="form-group">
							<label for="password2_r">Konfirmasi Password<span>*</span></label><br/>
							<input type="password" class="form-control" name="password2" id="password2_r" onkeyup="cekPass2()" required/>
							<div id='pass_error2' class='error'></div>
						</div>
						<input type="checkbox" id="field_terms" name="setuju" value="1" onclick="disabledT()" required> Saya menyetujui syarat dan ketentuan IT Today IPB 2016<br/><br/>
						<button type="submit" class="btn btn-danger" value="Proceed" id="registrasi_btn" disabled="disabled">Proceed</button><br><br>
					</form>
				</div>
			</div>
		</section>