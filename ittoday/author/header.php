<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Website IT Today 2016">
		<meta name="author" content="Tim Website IT Today 2016">
		
		<!-- Title -->
		<?php if(empty($_GET['page'])) { ?>
		<title>IT Today IPB 2016 | Grow Indonesia's Future with Technology</title>
		<?php }else if(!empty($_GET['page'])){ $page = strtoupper($_GET['page']); 
			if($page === "ISCS" || $page == "ISC"){
				$page = "IPB Searching Competition";
			}else if($page === "IGDC"){
				$page = "IPB Game Development Competition";
			}else if($page === "AGRIHACK"){
				$page = "Agrihack CTF";
			}else if($page === "SEMINAR"){
				$page = "Seminar IT Nasional";
			}else if($page === "LOGIN"){
				$page = "Login/Daftar";
			}else if($page === "USER"){
				$page = "Profil Saya";
			}else if($page === "FORGOTPASS" || $page === "RESETPASS"){
				$page = "Reset Password";
			}else{
				$page = "404 Not Found";
			}
			
		?>
		<title><?php echo $page." &#187; " ?>IT Today IPB 2016 | Grow Indonesia's Future with Technology</title>
		<?php } ?>
		<link rel="icon" href="img/favicon.ico">
		
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="css/scrolling-nav.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
    
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->