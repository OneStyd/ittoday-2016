<head>
	<title>IPB Searching Competition 2016</title>
	<link href="http://isc.ittoday.web.id/img/isc_logo.png" rel="icon" type="image/x-icon"/>
	<?php include "php/header.php" ?>
</head>
<body style="background: #800c24 url(img/isc_nyala.jpg) no-repeat fixed; background-size: cover;">
	<h1><img src="img/isc_logo.png" style="max-width:50px; vertical-align:text-top;"> IPB Searching Competition</h1>

	<div style="max-width:50%; background:#800c24; color:#fff; padding: 10px 0 10px 0; margin-right: auto; margin-left:auto;">
		<script language="javascript">
			TargetDate = "09/11/2016 09:30 AM";
			CountActive = true;
			CountStepper = -1;
			LeadingZero = true;
			DisplayFormat = "%%D%% Hari, %%H%% Jam, %%M%% Menit, %%S%% Detik";
			// DisplayFormat = "%%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
			FinishMessage = "Selamat datang peserta ISC IT Today 2016!";
		</script>
		<script language="javascript" src="js/countdown.js"></script>
	</div>
	<div style="padding-bottom:20px"></div>
	<div class="clearfix"></div>
	<div class="col-md-6 col-md-offset-3" style="background-color: rgba(128,12,36,0.7);border-radius:12px;text-align:left;">
		<div style="margin:20px 20px 0 20px;"> 
		<div class="alert alert-info"><i class="fa fa-info-circle"></i> Login menggunakan akun IT Today-mu</div>
		<div id="err_login"></div>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="email" id="email" class="form-control" placeholder="e-mail"/>
			</div>
			<div class="form-group">
				<input type="password" name="pass" id="pass" class="form-control" placeholder="password"/>
			</div>
			<div class="form-group">
				<input type="submit" value="Login" name="login" id="login" class="btn btn-danger">
				<img src="img/loading.gif" id="loadImg" style="max-width: 30px; display: none;">
			</div>
		</form>
		</div>
	</div>
</body>