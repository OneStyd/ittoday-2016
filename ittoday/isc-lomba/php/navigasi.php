	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo $inclusion; ?>home"><i class="fa fa-search fa-1p5x"></i> ISC 2016</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    		<button type="button" class="btn btn-default navbar-time"><div id="navtime"></div></button>
	      <ul class="nav navbar-nav navbar-right">
	        <!-- <li><a href="#">Link</a></li> -->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-1p5x"></i> <?php echo $info['nama_lengkap'] ;?> <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <!-- <li><a href="#">Petunjuk Perlombaan</a></li> -->
	            <!-- <li><a href="rank" onclick="return false">Peringkat (belum tersedia)</a></li> -->
	            <li role="separator" class="divider"></li>
	            <li><a href="<?php echo $inclusion; ?>logout">Logout</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	