<?php
	$user = mysqli_query($conn, "SELECT id_peserta, ittoday.id_user, nama_lengkap, email, no_hp, alamat, no_identitas, institusi FROM (ittoday JOIN isc ON ittoday.id_user = isc.id_user) ORDER BY id_peserta DESC") or die(mysqli_error($conn));
?>	

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<?php if(empty($_GET['presensi'])) {  ?>
				<li class="active">Informasi pendaftar ISC</li>
				<?php }else if(!empty($_GET['presensi'])) {  ?>
				<li><a href="isc">Informasi pendaftar ISC</a></li>
				<li class="active">Presensi Peserta ISC</li>
				<?php } ?>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<?php if(empty($_GET['presensi'])) { ?>
				<h1 class="page-header">Data pendaftar ISC</h1>
				<?php }elseif(!empty($_GET['presensi']) && $_GET['presensi'] == 1){ ?>
				<h1 class="page-header">Presensi Peserta ISC</h1>
				<?php } ?>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<?php if(empty($_GET['presensi'])) { ?>
					<div class="panel-heading">Tabel pendaftar ISC <span><button class="btn btn-default" onclick="$('#tablesa').bootstrapTable('togglePagination');$('#tablesa').tableExport({type:'excel', fileName: '<?php echo date("Y_m_d")?>_Data_ISC'});$('#tablesa').bootstrapTable('togglePagination');">Download Excel</button></span></div>
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
							        <th data-sortable="true">(Status Pembayaran)</th>
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
						    		<td><a href="./user?user=<?php echo $data['no_identitas'] ?>" class="btn btn-primary"><?php echo $data['nama_lengkap'] ?></a></td>
						    		<td><?php echo $data['no_identitas'] ?></td>
						    		<td><?php 
										$isISC = (mysqli_query($conn, "SELECT * FROM isc WHERE id_user = ".$data['id_user'].""));
										
										if(!(mysqli_num_rows($isISC))){
											echo "-";
										}else if(mysqli_num_rows($isISC)){
											$isISC = mysqli_fetch_assoc($isISC);
											if($isISC['status_bayar_isc']){
												$bayar = "Sudah Bayar";
											}else{
												$bayar = "Belum Bayar";
											}
											echo "<span><i class='fa fa-check-square-o' aria-hidden='true'></i> <b>ISC </b>($bayar)<br/><span>";
										}
						    		?></td>
						    		<td><?php echo $data['no_hp'] ?></td>
						    		<td><?php echo $data['email'] ?></td>
						    		<td><?php echo $data['alamat'] ?></td>
						    		<td><?php echo $data['institusi'] ?></td>
						    	</tr>
						    	<?php } ?>
						    </tbody>
						</table>
					</div>
					<?php }elseif(!empty($_GET['presensi']) && $_GET['presensi']==1){ ?>
						<?php
							$pesertaISC = mysqli_query($conn, "SELECT * FROM (ittoday JOIN isc ON ittoday.id_user = isc.id_user) WHERE status_bayar_isc=1") or die(mysqli_error($conn));
						?>
						<div class="panel-heading">Tabel Presensi Peserta ISC <span><button class="btn btn-default" onclick="$('#presensiISC').tableExport({type:'excel', fileName: '<?php echo date("Y_m_d")?>_Data_Presensi_Peserta_ISC'});">Download Excel</button></span>
						</div>
						<?php if(isset($_GET['mod']) && $_GET['mod']=="webmaster"): ?>
						<div>
							<form method="post">
								<button type="submit" value="1" name="changePresent">Un-Present All</button>
							</form>
						</div>
						<?php endif; ?>
						<div class="panel-body">
							<table class="table table-hover" id="presensiISC">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Peserta</th>
										<th>Kehadiran</th>
									</tr>
								</thead>
								<tbody>
									<?php $count = 1; while($data = mysqli_fetch_assoc($pesertaISC)){ ?>
										<tr>
											<td><?php echo $count++; ?></td>
											<td><a href="user?user=<?php echo $data['no_identitas'] ?>"><?php echo $data['nama_lengkap'] ?></a> (<?php echo $data['email'] ?>)</td>
											<td><?php echo $data['hadir_isc']?"Hadir":"Tidak Hadir"; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php 

			if(isset($_GET['mod']) && $_GET['mod'] == 'webmaster'){
				if(isset($_POST['changePresent'])){
					mysqli_query($conn, "UPDATE isc SET hadir_isc = 0");
				}
			}

		?>
