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


?>	

	<section id="intro" class="intro-section">
		<div class="row-login" style="text-align:left;">
			<div class="col-md-5 col-md-offset-1">
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
			<div class="col-md-5">
				<script>
					function cekPass(){
                        var pass = document.getElementById('password_r');
						
						if(pass1.value == ""){
							$('#pass_error2').hide();
						}else{
							$('#pass_error2').show();
						}

                    }

                    function valid(){
                    	validasiEmail();
                    	disabledT();
                    }

                    function validasiEmail(){
                    	var email = $("#email_r").val();
                    	
                    	if(email == ""){
                    		$("#email_error").hide();
                    	}else{
                    		$("#email_error").show();
                    	}

                    	jQuery.ajax({
                             url: "./author/validasi.php",
                             data:{email: email},
                             async: false,  
                             type: "POST",
                             success:function(data){
                                 $("#email_error").html(data);
                                 //$("#loaderIcon").hide();
                             },
                             error:function (){}
                             });
                  
               		 }

               		 

					function cekPass2(){
                        var pass1 = document.getElementById('password_r');
						var pass2 = document.getElementById('password2_r');


						if(pass1.value == pass2.value){
							document.getElementById('pass_error2').innerHTML = "Password Match";
						}
						else{
							document.getElementById('pass_error2').innerHTML = "Password Doesn't Match";
						}

						if(pass2.value == ""){
							$('#pass_error2').hide();
						}else{
							$('#pass_error2').show();
						}

                    }
				</script>
				<h3>Registrasi</h3>
				<form id="registrasi" action="" method="post">
					<input type="hidden" name="registrasi" value="1"/>
					<div class="form-group">
						<label for="email_r">Email*</label><br/>
						<input type="email" class="form-control" name="email" onkeyup="valid()" id="email_r" required/>
						<span id="email_error"></span>
					</div>
					<script type="text/javascript">
					function disabledT(){
               		 	if($("#email_error").html() != ""){
               		 		$("#registrasi_btn").attr("disabled",false);
               		 	}else{
               		 		$("#registrasi_btn").attr("disabled",true);
               		 	}
               		 }
               		</script>
					<div class="form-group">
						<label for="password_r">Password*</label><br/>
						<input type="password" class="form-control" name="password" id="password_r" required/>
					</div>
					<div class="form-group">
						<label for="password2_r">Konfirmasi Password*</label><br/>
						<input type="password" class="form-control" name="password2" id="password2_r" onkeyup="cekPass2()" required/>
						<div id='pass_error2' class='error'></div>
					</div>
					<input type="checkbox" id="field_terms" name="setuju" value="1" required> Saya bersedia mematuhi aturan main IT Today 2016<br/><br/>
					<button type="submit" class="btn btn-danger" value="Proceed" id="registrasi_btn" >Proceed</button>
				</form>
			</div>
		</div>
    </section>

