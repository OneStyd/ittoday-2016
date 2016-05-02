


<div class="content">
<div id="logo" class="navbar-header" hidden><a href="./"><img src="img/logo_putih.png"></a></div>
<div class="collapse navbar-collapse">
  <ul class="nav navbar-nav navbar-right">
    <?php if(empty($_GET['page'])){ ?>
    <li class="active"><a href="#slide1" title="Next Section" class="active">Home</a></li>
    <li><a href="#isc_section" title="Next Section">ISC</a></li>
    <li><a href="#slide2" title="Next Section">IGDC</a></li>
    <li><a href="#slide4" title="Next Section">Agricode</a></li>
    <li><a href="#slide5" title="Next Section">Agrihack</a></li>
    <li><a href="#slide6" title="Next Section">Seminar IT</a></li>
    <? }else if(isset($_GET['page'])){ ?>
    <li><a href="./#slide1" title="Next Section">Home</a></li>
    <li><a href="./#isc_section" title="Next Section">ISC</a></li>
    <li><a href="./#slide2" title="Next Section">IGDC</a></li>
    <li><a href="./#slide4" title="Next Section">Agricode</a></li>
    <li><a href="./#slide5" title="Next Section">Agrihack</a></li>
    <li><a href="./#slide6" title="Next Section">Seminar IT</a></li>
    <? } ?>
    <!-- <li><a href="#slide6" title="Next Section">Tentang</a></li> -->
  </ul>
</div>
</div>