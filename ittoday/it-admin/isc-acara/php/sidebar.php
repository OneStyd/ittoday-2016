	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->

		<ul class="nav menu">
			<div style="font-size:20px; padding:20px 0 10px 0;margin:10px 30px 0 30px;text-align:center;background-color:#800c24;color:#fff;border-radius:10px;">
				<div style="text-decoration:underline">Waktu Server</div>
				<?php echo date("d/m/Y"); ?><br/>
				<div id="txt"></div>
			</div>
			<li role="presentation" class="divider"></li>
			<li class="<?php if(isset($active['dashboard'])){ echo "active"; } ?>"><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
			<li class="<?php if(isset($active['buatsoal'])){ echo "active"; } ?>"><a href="buatsoal"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Buat Soal</a></li>
			<!-- <li><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
			<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li> -->
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Soal 
				</a>
				<ul class="children collapse in" id="sub-item-1">
					<li>
						<a class="<?php if(isset($active['soal-sesi1'])){ echo "active"; } ?>" href="soal-sesi1">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sesi 1
						</a>
					</li>
					<li>
						<a class="<?php if(isset($active['soal-sesi2'])){ echo "active"; } ?>" href="soal-sesi2">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sesi 2
						</a>
					</li>
				</ul>
			</li>
			<li class="<?php if(isset($active['ranking'])){ echo "active"; } ?>"><a href="ranking"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Peringkat Peserta</a></li>
			
			<!-- <li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li> -->
		</ul>

	</div><!--/.sidebar-->