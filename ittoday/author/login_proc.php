<?php
	include "connect.php";
	if(isset($_POST['login'])){
		$email = $_POST['email'];

		$stmt = $conn->prepare("SELECT id_user, password FROM ittoday WHERE email = ? LIMIT 1");

		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();

		$stmt->bind_result($user, $db_password);
		$stmt->fetch();

		$password = $_POST['password'];
		if($email == ""){
			echo "errno202";
		}else if($stmt->num_rows==1){
			if ($db_password == md5($password)){
				session_start();
				$_SESSION['ittoday_user'] = $email;
				echo '<script>window.location.href="./"</script>';
			}
			else
				echo 'errno200';
		}
		else echo 'errno201';

		mysqli_close($conn);
	}

?>