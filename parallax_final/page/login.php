<?php
	//session_start();
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
				//session_start();
				$_SESSION['ittoday_user'] = $email;
				//echo '<script>alert("login berhasil");</script>';
				echo '<script>window.location.href="./"</script>';
			}
			else
				echo '<script>alert("login gagal: password tidak cocok");</script>';
		}
		else echo '<script>alert("login gagal: email atau password salah");</script>';
	}


?>	

	<div id="slide1" style="color:#000; padding-top:120px;">
		<div class="row2">
			<div class="col-md-4 col-md-offset-2">
				<h3>Login</h3>
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
					<button type="submit" class="btn btn-danger" value="Proceed">Proceed</button>
				</form>
			</div>
			<div class="col-md-4">
				<h3>Registrasi</h3>
				<form id="login" action="login.php" method="post">
					<input type="hidden" name="registrasi" value="1"/>
					<div class="form-group">
						<label for="email">Email*</label><br/>
						<input type="email" class="form-control" name="email" id="email" required/>
					</div>
					<div class="form-group">
						<label for="password">Password*</label><br/>
						<input type="password" class="form-control" name="password" id="password" required/>
					</div>
					<div class="form-group">
						<label for="password">Konfirmasi Password*</label><br/>
						<input type="password" class="form-control" name="password2" id="password2" required/>
					</div>
					<input type="checkbox" name="setuju" value="1"> Saya bersedia mematuhi aturan main IT Today 2016<br/><br/>
					<button type="submit" class="btn btn-danger" value="Proceed">Proceed</button>
				</form>
			</div>
		</div>
    </div> 