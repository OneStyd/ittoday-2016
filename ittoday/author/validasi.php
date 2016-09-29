
<?php 
	include "connect.php";

	if(isset($_POST['email'])){
		$email = $_POST['email'];

		$cek = $conn->prepare("SELECT email FROM ittoday WHERE email=? ");
		$cek->bind_param("s", $email);
		$cek->execute();
		$cek->store_result();

		if($cek->num_rows() > 0){
			die('<font style="color:#800c24; font-style:italic;">e-mail sudah terdaftar, silakan langsung lakukan login.</font>');
		}else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  	die("Masukkan format email yang valid."); 
			}
		}	
		$cek->close();
	}

	if(isset($_POST['identitas'])){
		$identitas = $_POST['identitas'];

		$cek = $conn->prepare("SELECT no_identitas FROM ittoday WHERE no_identitas=?");
		$cek->bind_param("s", $identitas);
		$cek->execute();
		$cek->store_result();

		if($cek->num_rows() > 0){
			die('NIM Sudah Terdaftar');
		}
		$cek->close();
	}



?>
