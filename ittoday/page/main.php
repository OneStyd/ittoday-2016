		<script type="text/javascript">
			$(function(){
			if($(window).width() < 768){
			    	$('#logo_t').attr('src','img/logo_putih.png');
			    	$('#logo_t').css('width','50%');
			    	$('#logo_t').css('padding-top','20%');
			    }
			    else{
			   	$('#logo_t').attr('src','img/logo.png');
			   	$('#logo_t').css('width','85%');
			   	$('#logo_t').css('padding-top','0');
			    }

			$(window).bind("resize",function(){
			    console.log($(this).width())
			    if($(this).width() < 768){
			    	$('#logo_t').attr('src','img/logo_putih.png');
			    	$('#logo_t').css('width','50%');
			    	$('#logo_t').css('padding-top','20%');
			    }
			    else{
			   		$('#logo_t').attr('src','img/logo.png');
			   		$('#logo_t').css('width','85%');
			   		$('#logo_t').css('padding-top','0');
			    }
			    
			});
			});
		</script>
		
		<!-- Intro Section -->
		<section id="intro" class="intro-section">
			<div class="container animated">
				<div class="row">
					<div class="col-md-6" style="float:right;">
						<div class="main-text animated" id="logo_i"><img src="img/logo.png" id="logo_t"/><p class="intro-teks">#GrowIT</p></div>
					</div>
					<div class="col-md-6 intro-burung">
						<div class="main-icon animated" id="burung32"><img src="img/burung.32colors.png"></div>
					</div>
				</div>
			</div>
			<div class="down-arrow" id="bawah">
				<a href="#igdc-main" class="page-scroll"><i class="fa fa-angle-double-down fa-4x" ></i></a>
			</div>    
		</section>

		<!-- IGDC Section -->
		<section id="igdc-main" class="igdc-section">
			<div class="container animated" id="igdc-start" style="opacity: 0">
				<div class="row">
					<div class="col-lg-12">
						<h1>IPB Game Developing Competition</h1>
						<div class="section-icon"><img src="img/igdc/2.png" id="igdc-logo"/></div>
						<p>
							IGDC (IPB Game Development Competition) merupakan ajang kompetisi pembuatan games untuk mahasiswa di Indonesia.
							Kompetisi ini dapat diikuti oleh mahasiswa/pelajar di seluruh Indonesia yang memiliki passion dalam pengembangan aplikasi games. 
						</p>
						<button type="button" class="btn btn-ittoday btn-danger" onclick="window.location.href='igdc'">DETAIL</button>
					</div>
				</div>
			</div>
		</section>

		<!-- ISC Section -->
		<section id="isc-main" class="isc-section">
			<div class="container animated" id="isc-start">
				<div class="row">
					<div class="col-lg-12">
						<h1>IPB Searching Competition</h1>
						<div class="section-icon"><img src="img/isc/3.png"/></div>
						<p>
							IPB Searching Competition merupakan kompetisi menjawab pertanyaan umum melalui bantuan Search Engine. Kompetisi ini bertujuan untuk meningkatkan kemampuan pencarian melalui mesin pencari dan memaksimalkan pengetahuan ataupun informasi yang yang didapat melalui mesin pencari.
													
						</p>
						<button type="button" class="btn btn-ittoday btn-danger" onclick="window.location.href='isc'">DETAIL</button>
					</div>
				</div>
			</div>
		</section>

		<!-- Digital I-Share Section -->
		<section id="digishare-main" class="digishare-section">
			<div class="container animated" id="digishare-start">
				<div class="row">
					<div class="col-lg-12">
						<h1>Digital I-Share</h1>
						<div class="section-icon"><img src="img/digishare/4.png"/></div>
						<p>
							Digital I-Share merupakan kompetisi penciptaan ide aplikasi untuk SMA/Sederajat, diploma, dan Mahasiswa S1 di seluruh Indonesia. Peserta akan berlomba menciptakan ide kreatif tentang aplikasi yang berguna untuk mengubah masa depan dunia.
						</p>
						<button type="button" class="btn btn-ittoday btn-danger" onclick="window.location.href='digishare'">DETAIL</button>
					</div>
				</div>
			</div>
		</section>

		<!-- Agrihack Section -->
		<section id="agrihack-main" class="agrihack-section">
			<div class="container animated" id="agrihack-start">
				<div class="row">
					<div class="col-lg-12">
						<h1>Agrihack - Capture The Flag</h1>
						<div class="section-icon"><img src="img/agrihack/5.png"/></div>
						<p>
							Agrihack merupakan ajang kompetisi di bidang cyber security yaitu "Capture The Flag" untuk SMA/Sederajat dan Diploma di seluruh Indonesia. Peserta akan diminta mencari celah keamanan dari suatu objek untuk mendapatkan "flag".
						</p>
						<button type="button" class="btn btn-ittoday btn-danger" onclick="window.location.href='agrihack'">DETAIL</button>
					</div>
				</div>
			</div>
		</section>

		<!-- Seminar Section -->
		<section id="seminar-main" class="seminar-section">
			<div class="container" id="seminar-start">
				<div class="row">
					<div class="col-lg-12">
						<h1>Seminar Nasional</h1>
						<div class="section-icon animated" id="seminar-logo"><img src="img/seminar/6.png"/></div>
						<p>
							Kegiatan puncak dari IT Today 2016 yang terdiri dari Seminar dan Showcase IGDC. 
							Seminar bertemakan "The Future of Technology Devices".
						</p>
						<p>
							Showcase IGDC dapat dihadiri oleh mahasiswa se-IPB, mahasiswa seluruh Indonesia, dan masyarakat sekitar kampus IPB 
							gratis tanpa pendaftaran.
						</p>
						<button type="button" class="btn btn-ittoday btn-danger" onclick="window.location.href='seminar'">DETAIL</button>
					</div>
				</div>
			</div>
		</section>

		<!-- Tanah Section -->
		<section id="tanah-main" class="tanah-section">
			<div class="container animated" id="tanah-start">
				<div class="row">
					<div class="col-lg-12">
						<img src="img/logo.png">
						<p style="font-size:2vmax">Grow Indonesia's Future with Technology</p>
					</div>
				</div>
			</div>
		</section>
		<script>

		</script>