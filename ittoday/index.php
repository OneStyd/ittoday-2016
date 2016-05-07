<?php
    include "author/connect.php";
    ob_start();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT Today IPB 2016 | Grow Indonesia's Future with Technology</title>

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <style>
        @font-face{
            font-family: Arvo;
            src: url(fonts/Arvo-Bold.ttf);
            font-weight: bold;
        }
         @font-face{
            font-family: Prototype;
            src: url(fonts/Prototype.ttf);
        }
         @font-face{
            font-family: RobotoSlab;
            src: url(fonts/RobotoSlab-Regular.ttf);
        }
        @font-face{
            font-family: Aller;
            src: url(fonts/Aller_Rg.ttf);
            font-weight: 500;
        }
        @font-face{
            font-family: amicable;
            src: url(fonts/perfectly_amicable.ttf);
            font-weight: 500;
        }

        .navbar{
            background: #000;
        }

        .navbar-brand{
            font-family: amicable;
            font-size: 35px;
        }

        .navbar-default .navbar-brand{
            color:#fff !important;
        }

        .navbar-default .navbar-nav>li>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a{
            color: #fff !important;
        }

        .navbar-nav>li>a:hover{
            color:#000 !important;
            background: #fff !important;
            border-radius: 10px;
        }

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
            color: #000 !important;
            background: #fff !important;
            border-radius: 10px;
        }

        .main-text{
            padding-top:50%; 
            font-family:amicable;
            font-size:4vmax;
            line-height:1;
        }

        @media(max-width:990px){
            .main-icon>img{
                /*width:50%;*/
            }
            .main-text{
                padding-top: 0;
            }
        }

        @media(min-width:1500px){
            .main-icon>img{
                margin: auto;
                position: absolute;
                top: 820px; left: 0; bottom: 0; right: 0;
            }
        }

        .error{
            color:blue;
            font-style: italic;
        }

        #isc_slide{
            position: fixed;
            left: 10%;
            right:10%;
            bottom: 10%;
            z-index: -1;
        }

        div.text > p, div.text > h2{
            color: #fff;
        }

        .row-login {
              position:absolute;
              color:#000;
              top:50%;
              left:50%;
              padding:15px;
              -ms-transform: translateX(-50%) translateY(-50%);
              -webkit-transform: translate(-50%,-50%);
              transform: translate(-50%,-50%);
              width: 100%;
        }

        .main-icon>img{
            max-width:100%;
            height: auto;

        }

        /*.col-md-6, .col-md-12, div.col-md-6>h3, .row{
            font-size: 1vmax !important;
        }*/
        .row>.col-md-6>.main-icon>img{
            padding-bottom: 5%;
        }

       
        html, body{
            font-family: Aller;
        }

    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top top-nav-collapse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php if(empty($_GET['page'])){ ?>
                    <a class="navbar-brand page-scroll" href="#page-top">IT Today<!-- <img src="img/logo_putih.png"> --></a>
                <?php }else if(!empty($_GET['page'])){ ?>
                    <a class="navbar-brand page-scroll" href="./">IT Today<!-- <img src="img/logo_putih.png"> --></a>
                <?php } ?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <?php if(empty($_GET['page'])){ ?>

                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#igdc-main">IGDC</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#isc-main">ISC</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#agricode-main">Agricode</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#agrihack-main">Agrihack</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#seminar-main">Seminar IT</a>
                        </li>
                    <?php }else if(!empty($_GET['page'])){ ?>
                        <li class="hidden">
                            <a class="page-scroll" href="./#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./#igdc-main">IGDC</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./#isc-main">ISC</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./#agricode-main">Agricode</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./#agrihack-main">Agrihack</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./#seminar-main">Seminar IT</a>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <?php if(!cek_login()){ ?>
                        <li><a href="login"><span class="glyphicon glyphicon-user"></span>Login/Register</a></li>
                        <?php }else{ ?>
                        <li><a href="user"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
                        <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                    <?php } ?>
                 </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page -->
    <?php
        if(empty($_GET['page'])){
            include "page/main.php";

        }else if(isset($_GET['page'])){

            $page = $_GET['page'];

            if(include "page/".$page.".php");
            else{
                header("location: 404");
            }
        }
    ?>
    <!-- End Page -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrollinga-nav.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        
            function up() {
                $("#bawah").animate({bottom: "-=30"}, 1500, "swing", down);
            }
            function down() {
                $("#bawah").animate({bottom: "+=30"}, 1500, "swing", up);
            }
            down();
    });
    </script>
    <script type="text/javascript">
        // var isc = $('#isc-main').offset().top - window.innerHeight/2;
        // var next = $('#igdc-main').offset().top - (window.innerHeight/2)+10;
        //    $(window).scroll(function(){
        //         var pTop = $('#page-top').scrollTop();
        //         console.log( pTop + ' - ' + isc );
        //         console.log( pTop + ' - ' + next );
        //         if( pTop > isc && pTop < next ){
        //             $('#isc-main').css({'background': 'url(img/isc/isc_nyala.jpg) center top no-repeat fixed', 'background-size': 'cover'});
        //             $('#isc_slide').css('z-index', '0');
        //             $('#isc_slide').show(1000);
        //         }else{
        //             $('#isc-main').css({'background': 'url(img/isc/isc_mati.jpg) center top no-repeat fixed', 'background-size': 'cover'});
        //             $('#isc_slide').css('z-index', '-1');
        //             $('#isc_slide').hide();
        //             }
        // });


    </script>



</body>

</html>
