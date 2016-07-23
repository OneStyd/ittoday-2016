<section id="intro" class="intro-section page-section">
	<div class="row-login col-md-6 col-md-offset-3">
<?php
if(isset($_SESSION['ittoday_user'])){
	header("location:./");
}
// $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $database);


if(isset($_POST['submit'])) {
	$selectuser="SELECT * FROM ittoday where email='".addslashes($_POST['email'])."'";
	$result = mysqli_query($conn, $selectuser);
	$numrows = mysqli_num_rows($result);
	
	if($numrows == 1) {
		$row = mysqli_fetch_assoc($result);
		//$validusername=$result['no_identitas'];
		$randomstring = NULL;
		for($i = 0; $i < 16; $i++) {
			$randomstring .= chr(mt_rand(48,126));
		}

		$verifyurl = "resetpass";
		$verifystring = urlencode($randomstring);
		$verifyemail = urlencode($_POST['email']);
	 
		$updateuser="UPDATE ittoday SET forgotpwd='".addslashes($randomstring)."' WHERE email='".addslashes($_POST['email'])."'";
		mysqli_query($conn, $updateuser);
	 
$mail_body=<<<_MAIL_
	Hai,
	Kami menerima permintaan melakukan reset password pada akun Anda.
	Mohon klik link yang tersedia di bawah ini untuk melakukan reset password.
	
	http://ittoday.web.id/$verifyurl?email=$verifyemail&verify=$verifystring

	Catatan: Jika Anda tidak pernah meminta untuk melakukan reset password, abaikan pesan ini.
_MAIL_;
	 
		require("author/phpmailer/PHPMailerAutoload.php");
		$mailer = new PHPMailer();

		$mailer->IsSMTP();
		//$mailer->SMTPDebug = 2;
		$mailer->SMTPSecure = "ssl";
		$mailer->Host = "sg100.idcloudhost.com"; //Add smtp details
		$mailer->Port = "465";
		$mailer->SMTPAuth = TRUE;
		$mailer->Mailer = "smtp";
		$mailer->Username = "admin@ittoday.web.id";  // Change this to your gmail adress
		$mailer->Password = "ithariiniipb";  // Change this to your gmail password
		$mailer->From = "admin@ittoday.web.id";  // This HAVE TO be your gmail adress
		$mailer->FromName = "IT Today IPB"; // This is the from name in the email, you can put anything you like here
		$mailer->Body = $mail_body;
		$mailer->Subject = "(no-reply) Reset Password";
		$mailer->AddAddress($_POST['email']);  // This is where you put the email adress of the person you want to mail
		
		if(!$mailer->Send()){
			echo "Message was not sent<br/ >";
			echo "Mailer Error: " . $mailer->ErrorInfo;
		}else{
			echo "<div class='alert alert-success'><center>Sebuah link telah dikirmkan ke email Anda (".addslashes($_POST['email'])."). Cek email Anda untuk dapat mereset password akun Anda. <br/></center></div><br>";
		}
	}else{
		echo "<div class='alert alert-danger'><center>Tidak dapat menemukan email ".addslashes($_POST['email'])."<br> Tolong masukkan alamat email yang valid. <br/>Note: Jika Anda mendaftar dengan email palsu, Anda tidak dapat mereset password.</center></div>";
	}
}else{
?>

	<legend style="color:#800c24">Reset Password</legend>
		<form action="" method="post">
			<div class="form-group">
				<label for="email">Masukkan Email Anda</label>
				<input type="text" name="email" class="form-control" required>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-danger">
		</form>

<?php
}
?>
	</div>
</section>