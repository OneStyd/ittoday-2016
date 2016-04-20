<?php
	include "connect.php";

	if(isset($_POST['login'])){
		$email = $_POST['email'];

		$stmt = $conn->prepare("SELECT id_user, no_identitas, password FROM ittoday WHERE email = ? LIMIT 1");

		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();

		$stmt->bind_result($user, $identitas, $db_password);
		$stmt->fetch();

		$password = $_POST['password'];
		if($stmt->num_rows==1){
			if ($db_password == md5($password)){
				session_start();
				$_SESSION['ittoday_user'] = $identitas;
				header("location: index.php");
			}
			else
				echo 'login gagal: password tidak cocok';
		}
		else echo 'login gagal: email atau password salah';

	}

	function log_in_setelah_mendaftar($identitas){
		session_start();
		$_SESSION['ittoday_user'] = $identitas;

		return true;
	}

	function buat_session(){
		session_start();

		if(isset($_SESSION['ittoday_user'])){

			// $ittoday_user_login=$_SESSION['ittoday_user'];
			$session = $GLOBALS['conn']->prepare("SELECT id_user, no_identitas FROM ittoday WHERE no_identitas = ? LIMIT 1");

			$session->bind_param("s", $_SESSION['ittoday_user']);
			$session->execute();
			$session->store_result();

			$session->bind_result($id_user, $identitas);
			$session->fetch();

			if($_SESSION['ittoday_user'] == $identitas) 
				return true;
		}else{
			return false;
		}
	}

	function log_out(){
		session_start();
		unset($_SESSION['ittoday_user']);
		if(session_destroy()){
			return true;
		}else {
			return false;
		}
	}

	function cek_login(){
		if(isset($_SESSION['ittoday_user'])){
			return true;
		}
		return false;
	}

	function get_user_info($id){
		$user_info = $GLOBALS['conn']->prepare("SELECT id_user, nama_lengkap, email, no_hp, alamat, no_identitas, institusi, tahun_masuk
						FROM ittoday WHERE no_identitas= ? LIMIT 1");

		$user_info->bind_param("s", $id);
		$user_info->execute();

		$result = mysqli_stmt_get_result($user_info);
		$row = mysqli_fetch_assoc($result);
		return $row;

	}

// fungsi yang masih nggak ngerti kegunaannya

	// function sec_session_start() {
	//     $session_name = 'ittoday_user';   // Set a custom session name
	//     $secure = true;
	//     // This stops JavaScript being able to access the session id.
	//     $httponly = true;
	//     // Forces sessions to only use cookies.
	//     if (ini_set('session.use_only_cookies', 1) === FALSE) {
	//         header("Location: index.php?err=Could not initiate a safe session (ini_set)");
	//         exit();
	//     }
	//     // Gets current cookies params.
	//     $cookieParams = session_get_cookie_params();
	//     session_set_cookie_params($cookieParams["lifetime"],
	//         $cookieParams["path"], 
	//         $cookieParams["domain"], 
	//         $secure,
	//         $httponly);
	//     // Sets the session name to the one set above.
	//     session_name($session_name);
	//     session_start();            // Start the PHP session 
	//     session_regenerate_id(true);    // regenerated the session, delete the old one. 

	//     return true;
	// }

	// function cek_login(){
	// 	if (!isset($_SESSION)){
	// 		session_start();}
	// 		$user_browser = $_SERVER['HTTP_USER_AGENT'];
	// 		$_SESSION['login_string'] = hash('sha512', $db_password . $user_browser);
	// 		if(empty($_SESSION['login string'])){
	// 			return false;
	// 		}
	// 	    //     $user = $_SESSION['user_id'];
	// 	    //     $login_string = $_SESSION['login_string'];
	// 	    //     $identitas = $_SESSION['identitas'];
		 
	// 	    //     // Get the user-agent string of the user.
	// 	    //     $user_browser = $_SERVER['HTTP_USER_AGENT'];
		 
	// 	    //     if ($stmt = $mysqli->prepare("SELECT password FROM ittoday WHERE id_user = ? LIMIT 1")) {
	// 	    //         // Bind "$user_id" to parameter. 
	// 	    //         $stmt->bind_param('i', $user_id);
	// 	    //         $stmt->execute();   // Execute the prepared query.
	// 	    //         $stmt->store_result();
		 
	// 	    //         if ($stmt->num_rows == 1) {
	// 	    //             // If the user exists get variables from result.
	// 	    //             $stmt->bind_result($password);
	// 	    //             $stmt->fetch();
	// 	    //             $login_check = hash('sha512', $password . $user_browser);
		 
	// 	    //             if ($login_check == $login_string){
	// 	    //                 // Logged In!!!! 
	// 	    //                 return true;
	// 	    //             } else {
	// 	    //                 // Not logged in 
	// 	    //                 return false;
	// 	    //             }
	// 	    //         } else {
	// 	    //             // Not logged in 
	// 	    //             return false;
	// 	    //         }
	// 	    //     } else {
	// 	    //         // Not logged in 
	// 	    //         return false;
	// 	    //     }
	// 	    // } else {
	// 	    //     // Not logged in 
	// 	    //     return false;
	// 	    // } else{
	// 	    // 	return false;
	// 	    // } 
	// 	    return true;
	//   }

	 //  function logout(){
	 //  	session_start();
 
		// // Unset all session values 
		// $_SESSION = array();
		 
		// // get session parameters 
		// $params = session_get_cookie_params();
		 
		// // Delete the actual cookie. 
		// setcookie(session_name(),
		//         '', time() - 42000, 
		//         $params["path"], 
		//         $params["domain"], 
		//         $params["secure"], 
		//         $params["httponly"]);
		 
		// // Destroy session 
		// session_destroy();
		// header('Location: ../index.php');
	 // }

?>