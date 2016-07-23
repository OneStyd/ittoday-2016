<?php
	if(isset($_SESSION['ittoday_user'])){
		header("location: ./");
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
				session_start();
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
						<div id="err_login"></div>
						<!-- <input type="hidden" name="login" id="isLogin" value="1"/> -->
						<div class="form-group">
							<label for="email">Email</label><br/>
							<input type="email" class="form-control" name="email" id="email"/>
						</div>
						<div class="form-group">
							<label for="password">Password</label><br/>
							<input type="password" class="form-control" name="password" id="password"/>
						</div>
						<span><a href="forgotpass" style="color:#800c24">Lupa Password?</a></span>
						<button type="submit" id="btn-login" class="btn btn-danger" value="1">Proceed</button><br><br>
					</form>
				</div>
				<script src="js/reg.js" type="text/javascript"></script>
				<div class="col-md-5">
					<h2>Registrasi</h2>
					<!-- <center><p>Pendaftaran akan dibuka tanggal 1 Juni 2016</p></center> -->
					<form id="registrasi" action="" method="post">
						<input type="hidden" name="registrasi" value="1"/>
						<div class="form-group">
							<label for="email_r">Email<span>*</span></label><br/>
							<input type="email" class="form-control" name="email" onkeyup="" onchange="validasiEmail(), disabledT()" id="email_r" required/>
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
						<input type="checkbox" id="field_terms" name="setuju" value="1" onclick="disabledT()" required> Saya menyetujui <a href="file/HANDBOOK_IT_TODAY_2016_V2.1.pdf" style="text-decoration:underline;color:#800c24">syarat dan ketentuan</a> IT Today IPB 2016<br/><br/>
						<button type="submit" class="btn btn-danger" value="Proceed" id="registrasi_btn" disabled="disabled">Proceed</button><br><br>
					</form>
				</div>
			</div>
		</section>