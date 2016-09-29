<?php
	$user = mysqli_query($conn, "SELECT id_user, nama_lengkap, email, no_hp, alamat, no_identitas, institusi FROM ittoday WHERE no_identitas IS NOT NULL ORDER BY id_user DESC");
?>	

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<?php if(empty($_GET['user'])) {  ?>
				<li class="active">Informasi pendaftar</li>
				<?php }else if(!empty($_GET['user'])) {  ?>
				<li><a href="user">Informasi pendaftar</a></li>
				<li class="active"><?php echo $_GET['user'] ?></li>
				<?php } ?>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data user</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<?php if(empty($_GET['user'])) { ?>
					<div class="panel-heading">Tabel pendaftar <span><button class="btn btn-default" onclick="$('#tablesa').bootstrapTable('togglePagination');$('#tablesa').tableExport({type:'excel', fileName: '<?php echo date("Y_m_d")?>_Data_Peserta'});$('#tablesa').bootstrapTable('togglePagination');">Download Excel</button></span></div>
					<div class="panel-body">
					<!-- <div id="toolbar">
			            <select class="form-control">
			            	<option value="all">Ekspor Semua Data</option>
			                <option value="basic">Ekspor Data Halaman Ini</option>
			            </select>
			        </div> -->
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-export="true" data-click-to-select="true"
               data-toolbar="#toolbar" data-show-columns="true" data-search="true" data-pagination="true" id="tablesa">
						    <thead>
							    <tr>
							        <th data-sortable="true">No.</th>
							        <th data-sortable="true">Nama Lengkap</th>
							        <th data-sortable="true">No. Identitas</th>
							        <th data-sortable="true">Keikutsertaan (Status Bayar)</th>
							        <th data-sortable="true">No HP</th>
							        <th data-sortable="true">E-mail</th>
							        <th data-sortable="true">Alamat</th>
							        <th data-sortable="true">Institusi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $count = 1; while ($data = mysqli_fetch_assoc($user)) { ?>
						    	<tr>
						    		<td><?php echo str_pad($count++, 3, '0', STR_PAD_LEFT) ?></td>
						    		<td><a href="?user=<?php echo $data['no_identitas'] ?>" class="btn btn-primary"><?php echo $data['nama_lengkap'] ?></a></td>
						    		<td><?php echo $data['no_identitas'] ?></td>
						    		<td><?php 
									    $isIGDC = (mysqli_query($conn, "SELECT * FROM igdc WHERE id_ketua = ".$data['id_user'].""));
										$isISC = (mysqli_query($conn, "SELECT * FROM isc WHERE id_user = ".$data['id_user'].""));
										$isDIS = (mysqli_query($conn, "SELECT * FROM digishare WHERE id_ketua = ".$data['id_user'].""));
										$isAH = (mysqli_query($conn, "SELECT * FROM agrihack WHERE id_ketua = ".$data['id_user']." AND (invalid = 0 OR invalid = 2)"));
										$isSIT = (mysqli_query($conn, "SELECT * FROM seminar WHERE id_user = ".$data['id_user'].""));
										
										if(!(mysqli_num_rows($isIGDC)) && !(mysqli_num_rows($isISC)) && !(mysqli_num_rows($isDIS)) && !(mysqli_num_rows($isAH)) && !(mysqli_num_rows($isSIT))){
											echo "-";
										}
										if(mysqli_num_rows($isIGDC)){
											$isIGDC = mysqli_fetch_assoc($isIGDC);
											if($isIGDC['status_bayar_igdc']){
												$bayar = "Sudah Bayar";
											}else{
												$bayar = "Belum Bayar";
											}
											echo "<span><i class='fa fa-check-square-o' aria-hidden='true'></i> <b>IGDC </b>($bayar)<br/><span>";
										}
										if(mysqli_num_rows($isISC)){
											$isISC = mysqli_fetch_assoc($isISC);
											if($isISC['status_bayar_isc']){
												$bayar = "Sudah Bayar";
											}else{
												$bayar = "Belum Bayar";
											}
											echo "<span><i class='fa fa-check-square-o' aria-hidden='true'></i> <b>ISC </b>($bayar)<br/><span>";
										}
										if(mysqli_num_rows($isDIS)){
											$isDIS = mysqli_fetch_assoc($isDIS);
											if($isDIS['status_bayar_dis']){
												$bayar = "Sudah Bayar";
											}else{
												$bayar = "Belum Bayar";
											}
											echo "<span><i class='fa fa-check-square-o' aria-hidden='true'></i> <b>Digital I-Share </b>($bayar)<br/><span>";
										}
										if(mysqli_num_rows($isAH)){
											$isAH = mysqli_fetch_assoc($isAH);
											if($isAH['status_bayar_ah']){
												$bayar = "Sudah Bayar";
											}else{
												$bayar = "Belum Bayar";
											}
											echo "<span><i class='fa fa-check-square-o' aria-hidden='true'></i> <b>Agrihack </b>($bayar)<br/><span>";
										}
										if(mysqli_num_rows($isSIT)){
											$isSIT = mysqli_fetch_assoc($isSIT);
											if($isSIT['status_bayar_sem']){
												$bayar = "Sudah Bayar";
											}else{
												$bayar = "Belum Bayar";
											}
											echo "<span><i class='fa fa-check-square-o' aria-hidden='true'></i> <b>Seminar </b>($bayar)<br/><span>";
										}
						    		?></td>
						    		<td><?php echo $data['no_hp'] ?></td>
						    		<td><?php echo $data['email'] ?></td>
						    		<td><?php echo $data['alamat'] ?></td>
						    		<td><?php echo $data['institusi'] ?></td>
						    	</tr>
						    	<?php } ?>
						</table>
					</div>
					<?php }else if(!empty($_GET['user'])) {  ?>
					<div class="panel-heading">Informasi pendaftar</div>
					<div class="panel-body">
						<?php 
							$identitas = addslashes(trim($_GET['user']));
							$pendaftar = mysqli_fetch_array(mysqli_query($conn, "SELECT id_user, nama_lengkap, email, no_hp, alamat, no_identitas, institusi,foto FROM ittoday WHERE no_identitas = '$identitas'"));

							$isIGDC = mysqli_query($conn, "SELECT * FROM igdc WHERE id_ketua = ".$pendaftar['id_user']."");
							$isISC = mysqli_query($conn, "SELECT * FROM isc WHERE id_user = ".$pendaftar['id_user']."");
							$isDIS = mysqli_query($conn, "SELECT * FROM digishare WHERE id_ketua = ".$pendaftar['id_user']."");
							$isAH = mysqli_query($conn, "SELECT * FROM agrihack WHERE id_ketua = ".$pendaftar['id_user']."");
							$isSIT = mysqli_query($conn, "SELECT * FROM seminar WHERE id_user = ".$pendaftar['id_user']."");
						?>
						<!-- <div class="panel-widget"> -->
							<div class="row no-padding">
								<div class="col-sm-3 col-lg-5">
									<img src="<?php echo '../'.$pendaftar['foto'];?>" class="img-usr"/>
								</div>
								<div class="col-sm-9 col-lg-7">
									<table>
										<tr>
											<td>
												Nama Lengkap
											<td>
												&nbsp;&nbsp;: <?php echo $pendaftar['nama_lengkap'] ?>
											</td>
										</tr>
										<tr>
											<td>
												Identitas
											<td>
												&nbsp;&nbsp;: <?php echo $pendaftar['no_identitas'] ?>
											</td>
										</tr>
										<tr>
											<td>
												Institusi
											<td>
												&nbsp;&nbsp;: <?php echo $pendaftar['institusi'] ?>
											</td>
										</tr>
										<tr>
											<td>
												No HP
											<td>
												&nbsp;&nbsp;: <?php echo $pendaftar['no_hp'] ?>
											</td>
										</tr>
										<tr>
											<td>
												E-mail
											<td>
												&nbsp;&nbsp;: <?php echo $pendaftar['email'] ?>
											</td>
										</tr>
										<tr>
											<td>
												Alamat
											<td>
												&nbsp;&nbsp;: <?php echo $pendaftar['alamat'] ?>
											</td>
										</tr>
									</table>
								</div>
							</div>
						<!-- </div> -->
						<div style="padding-bottom:20px;"></div>
						<h4 id="keikutsertaan">Informasi Keikutsertaan Kegiatan IT Today</h4>
						<!-- <p>Di sini akan ditampilkan berupa menu dropdown acara hanya pada kegiatan yang diikuti user ini saja. Dropdown berisikan informasi status pembayaran dan informasi spesifik terkait acara. Jika user tidak mendaftar ke salah satu acara, maka tampilkan "&lt;id user&gt; tidak terdaftar dalam acara apa pun."</p> -->
				

				<ul class="nav nav-tabs">
					<?php if (mysqli_num_rows($isIGDC)){ ?>
					<li><a href="#igdc" data-toggle="tab">IGDC</a></li>
					<?php } ?>
					<?php if (mysqli_num_rows($isISC)){ ?>
					<li><a href="#isc" data-toggle="tab">ISC</a></li>
					<?php } ?>
					<?php if (mysqli_num_rows($isDIS)){ ?>
					<li><a href="#digishare" data-toggle="tab">Digital I-Share</a></li>
					<?php } ?>
					<?php if (mysqli_num_rows($isAH)){ ?>
					<li><a href="#agrihack" data-toggle="tab">Agrihack</a></li>
					<?php } ?>
					<?php if (mysqli_num_rows($isSIT)){ ?>
					<li><a href="#seminar" data-toggle="tab">Seminar</a></li>
					<?php } ?>
				</ul>
				<div class="tab-content">

						<!-- <ul> -->
						<?php if (mysqli_num_rows($isIGDC)){ $igdcData = mysqli_fetch_assoc($isIGDC); ?>
						<div class="tab-pane" id="igdc">
						<li><legend>IPB Game Development Competition</legend>
						<div id="successIGDC"></div>
						<table>
							<tr>
								<td>Nama Tim</td>
								<td>&nbsp;: <?php echo $igdcData['tim'] ?></td>
							</tr>
							<tr>
								<td>Anggota 1</td>
								<td>&nbsp;: <?php echo $igdcData['anggota1'] ?></td>
							</tr>
							<tr>
								<td>Anggota 2</td>
								<td>&nbsp;: <?php echo $igdcData['anggota2'] ?></td>
							</tr>
							<tr>
								<td>Judul Game</td>
								<td>&nbsp;: <?php echo $igdcData['judul'] ?></td>
							</tr>
							<tr>
								<td>Link</td>
								<?php if(empty($igdcData['video'])) $varvid = "onclick='alert(\"no link available\");return false'";
									  if(empty($igdcData['game'])) $vargem = "onclick='alert(\"no link available\");return false'"; ?>
								<td>&nbsp;: <?php echo "<a href='".addhttp($igdcData['video'])."' target='_blank' ".$varvid.">Promo Video</a>", ", <a href='".addhttp($igdcData['game'])."' target='_blank' ".$vargem.">Link Game</a>"; ?></td>
							</tr>
							<tr>
								<td>Identitas (PDF)</td>
								<td>&nbsp;: <?php echo "<a href='../".$igdcData['kartu_id']."'>Identitas Tim</a>"; ?></td>
							</tr>
						</table>
						<div>Deskripsi Game:<br/><?php echo $igdcData['deskripsi'] ?></div><hr/>
						<div>Status Pembayaran: <?php $igdcData['status_bayar_igdc']? print('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)') : print('<div id="statusIGDC" style="display:inline"></div>'); ?>
						<?php if($igdcData['status_bayar_igdc']){ ?>
						<button type="button" onclick="changeStatusIGDC(<?php echo $pendaftar['id_user'] ?>,0)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php }else{ ?>
						<button type="button" onclick="changeStatusIGDC(<?php echo $pendaftar['id_user'] ?>,1)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php } ?>
						<hr></li>
						</div>
						<? } ?>

						<?php if (mysqli_num_rows($isISC)){ $iscData = mysqli_fetch_assoc($isISC); ?>
						<div class="tab-pane" id="isc">
						<li><legend>IPB Searching Competition</legend>
						<div id="successISC"></div>
						<table>
							<tr>
								<td>Identitas (PDF/Image)</td>
								<td>&nbsp;: <?php echo "<a href='../".$iscData['kartu_id']."'>Identitas Diri</a>"; ?></td>
							</tr>
						</table>
						<div>Status Pembayaran: <?php $iscData['status_bayar_isc']? print('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)') : print('<div id="statusISC" style="display:inline"></div>'); ?>
						<?php if($iscData['status_bayar_isc']){ ?>
						<button type="button" onclick="changeStatusISC(<?php echo $pendaftar['id_user'] ?>,0)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php }else{ ?>
						<button type="button" onclick="changeStatusISC(<?php echo $pendaftar['id_user'] ?>,1)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php } ?>
						<hr></li>
						</div>
						<? } ?>
						<?php if (mysqli_num_rows($isDIS)){ $disData = mysqli_fetch_assoc($isDIS); ?>
						<div class="tab-pane" id="digishare">
						<li><legend>Digital I-Share</legend>
						<div id="successDIS"></div>
						<table>
							<tr>
								<td>Nama Tim</td>
								<td>&nbsp;: <?php echo $disData['tim'] ?></td>
							</tr>
							<tr>
								<td>Anggota 1</td>
								<td>&nbsp;: <?php echo $disData['anggota1'] ?></td>
							</tr>
							<tr>
								<td>Anggota 2</td>
								<td>&nbsp;: <?php echo $disData['anggota2'] ?></td>
							</tr>
							<tr>
								<td>Judul Ide</td>
								<td>&nbsp;: <?php echo $disData['judul'] ?></td>
							</tr>
							<tr>
								<td>Kategori Ide</td>
								<td>&nbsp;: <?php echo $disData['kategori'] ?></td>
							</tr>
							<tr>
								<td>Deksripsi</td>
								<td>&nbsp;: <?php echo $disData['deskripsi'] ?></td>
							</tr>
							<tr>
								<td>Proposal (PDF)</td>
								<td>&nbsp;: <?php echo "<a href='../".$disData['proposal']."'>Link Proposal</a>" ?></td>
							</tr>
							<tr>
								<td>Identitas (PDF)</td>
								<td>&nbsp;: <?php echo "<a href='../".$disData['kartu_id']."'>Identitas Tim</a>"; ?></td>
							</tr>
						</table>
						<div>Status Pembayaran: <?php $disData['status_bayar_dis']? print('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)') : print('<div id="statusDIS" style="display:inline"></div>'); ?>
						<?php if($disData['status_bayar_dis']){ ?>
						<button type="button" onclick="changeStatusDIS(<?php echo $pendaftar['id_user'] ?>,0)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php }else{ ?>
						<button type="button" onclick="changeStatusDIS(<?php echo $pendaftar['id_user'] ?>,1)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php } ?>
						<hr></li>
						</div>
						<? } ?>
						<?php if (mysqli_num_rows($isAH)){ $ahData = mysqli_fetch_assoc($isAH); ?>
						<div class="tab-pane" id="agrihack">
						<li><legend>Agrihack</legend>
						<div id="successAH"></div>
						<table>
							<tr>
								<td>Nama Tim</td>
								<td>&nbsp;: <?php echo $ahData['tim'] ?></td>
							</tr>
							<tr>
								<td>Anggota 1</td>
								<td>&nbsp;: <?php echo $ahData['anggota1'] ?></td>
							</tr>
							<tr>
								<td>Anggota 2</td>
								<td>&nbsp;: <?php echo $ahData['anggota2'] ?></td>
							</tr>
							<tr>
								<td>Identitas (PDF)</td>
								<td>&nbsp;: <?php echo "<a href='../".$ahData['kartu_id']."'>Identitas Tim</a>"; ?></td>
							</tr>
						</table>
                                                <?php if($ahData['invalid']==1) $statInv = "(Kriteria Tidak Sesuai)"; else if($ahData['invalid']==0) $statInv = "(Belum Diverifikasi)"; else $statInv = "(Kriteria Sesuai)"; ?>
						<div>Status Pembayaran: <?php $ahData['status_bayar_ah']? print('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)') : print('<div id="statusAH" style="display:inline"></div>'); ?>
						<?php if($ahData['status_bayar_ah']){ ?>
						<button type="button" onclick="changeStatusAH(<?php echo $pendaftar['id_user'] ?>,0)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php }else{ ?>
						<button type="button" onclick="changeStatusAH(<?php echo $pendaftar['id_user'] ?>,1)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php } ?>
						<div>Verifikasi: <?php echo $statInv; ?>&nbsp;&nbsp; <button type="button" onclick="changeInvalidAH(<?php echo $pendaftar['id_user'] ?>,1)" style="display:inline;" class="btn-xs btn-primary">Tidak Sesuai</button>
						<button type="button" onclick="changeInvalidAH(<?php echo $pendaftar['id_user'] ?>,2)" style="display:inline;" class="btn-xs btn-primary">Sesuai</button></div>
						<hr></li>
						</div>
						<? } ?>
						<?php if (mysqli_num_rows($isSIT)){ $sitData = mysqli_fetch_assoc($isSIT); ?>
						<div class="tab-pane" id="seminar">
						<li><legend>Seminar IT</legend>
						<div id="successSIT"></div>

						<div>Status Pembayaran: <?php $sitData['status_bayar_sem']? print('<i class="fa fa-check-circle-o fa-2x"></i>&nbsp;(Sudah Bayar)') : print('<div id="statusSIT" style="display:inline"></div>'); ?>
						
						<?php if($sitData['status_bayar_sem']){ ?>
						<button type="button" onclick="changeStatusSIT(<?php echo $pendaftar['id_user'] ?>,0)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php }else{ ?>
						<button type="button" onclick="changeStatusSIT(<?php echo $pendaftar['id_user'] ?>,1)" style="display:inline;" class="btn-xs btn-primary">Ubah</button></div>
						<?php } ?>
						<hr></li>
						</div>
						<? } ?>
						<!-- </ul> -->
					</div>
						<? if(!(mysqli_num_rows($isIGDC)) && !(mysqli_num_rows($isISC)) && !(mysqli_num_rows($isDIS)) && !(mysqli_num_rows($isAH)) && !(mysqli_num_rows($isSIT))){ ?>
							<p class="alert alert-warning">Belum mendaftar rangkaian acara IT Today apa pun.</p>
						<?php } ?>
					<?php } ?>
					</div>
				</div>
				<img src="../img/logo.png" style="max-width:20%;float:right; padding:20px 10px 20px 0;">
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->
<?php
	function addhttp($url) {
	    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
	        $url = "http://" . $url;
	    }
	    return $url;
	}
?>

