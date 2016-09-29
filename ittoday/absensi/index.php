<?php session_start(); $acara = array("isc", "igdc", "seminar"); ?>

<html>
	<head>
		<title>Absensi <?php echo isset($_GET['acara'])?"- ".strtoupper($_GET['acara']):""; ?> | IT Today IPB 2016</title>

		<!-- Bootstrap Core CSS -->
		<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
		<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

		<!-- JS Library -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">

		<style>
			body{
				font-family: "Comfortaa";
				background-color: #800c24;
				position: relative;
				z-index: 0
			}

			.divider{
				padding-bottom:20px;
			}

			.grey-bg{
				background-color: #eee;
				border-radius: 8px;
				padding: 10px 0 10px 0;
				text-align: center;
				/*line-height: 100px;*/
			}

			.paragraph {
			  display: inline-block;
			  vertical-align: middle;
			  line-height: normal;      
			}

			.text-norm{
				text-align: left;
			}
			#load-screen {
			    width: 100%;
			    height: 100%;
			    background: url("25.gif") no-repeat center center #fff;
			    position: fixed;
			    opacity: 0.7;
			    z-index: 1;
			}
			@font-face {
				font-family: FontAwesome;
				src: url(//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/fonts/fontawesome-webfont.eot);
				src: url(//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/fonts/fontawesome-webfont.eot) format('embedded-opentype')
				,url(//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/fonts/fontawesome-webfont.woff) format('woff')
				,url(//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/fonts/fontawesome-webfont.ttf) format('truetype')
				,url(//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/fonts/fontawesome-webfont.svg) format('svg');
				font-weight: 400;
				font-style: normal;
			}


		</style>
	</head>
	<body>
		<div id="load-screen" style="display:none"></div>
		<div class="divider">&nbsp;</div>
		<div class="container">
			<div class="row">
				<div class="jumbotron">
					<div class="row">
				    	<div class="col-md-4">
				    		<img src="https://ittoday.web.id/img/logo.png" style="max-width:60%;" id="home"/>
				    	</div>
				    	<div class="col-md-8">
				    		<h1>Presensi IT Today 2016</h1>
				    	</div>
				    </div> 
				</div>
				<div class="grey-bg">
					<?php if(empty($_GET['acara'])): ?>
						<?php $tokenNow = generateRandomString() ?>
						<button type="button" onclick="window.location.href='?acara=isc&amp;token=<?php echo $tokenNow; ?>'" class="btn btn-default">ISC</button>
						<button type="button" onclick="window.location.href='?acara=igdc&amp;token=<?php echo $tokenNow; ?>'" class="btn btn-default">IGDC</button>
						<button type="button" onclick="window.location.href='?acara=seminar&amp;token=<?php echo $tokenNow; ?>'" class="btn btn-default">Seminar</button>
					<?php elseif(isset($_GET['acara']) && in_array($_GET['acara'], $acara)): ?>
						<?php include "view.php"; ?>
					<?php else: ?>
						<p class="paragraph">Maaf, Halaman yang Anda akses tidak tersedia :( </p>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$('#home').hover(
				function(){
					$(this).attr("style", "max-width:63%");
				}, function(){
					$(this).attr("style", "max-width:60%");
				}
			);
			$('#home').click(function(){
				window.location.href="./";
			});

		</script>
	</body>
</html>

<?php
	function generateRandomString($length = 20) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }

	    $_SESSION['token'] = $randomString;

	    return $randomString;
	}

?>