<?php
	//session_start();
	unset($_SESSION['ittoday_user']);
	if(session_destroy()){
		echo '<script>window.location.href="./"</script>';
	}else {
		return false;
	}
?>