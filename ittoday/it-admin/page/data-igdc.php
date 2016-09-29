<?php
	$user = mysqli_query($conn, "SELECT id_peserta, id_user, tim,nama_lengkap, email, no_hp, alamat, no_identitas, institusi, anggota1, anggota2, judul,deskripsi,game,video FROM (ittoday JOIN igdc ON id_user = id_ketua) ORDER BY id_peserta DESC") or die(mysqli_error($conn));
?>	

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<?php if(empty($_GET['presensi'])) {  ?>
				<li class="active">Informasi pendaftar IGDC</li>
				<?php }else if(!empty($_GET['presensi'])) {  ?>
				<li><a href="igdc">Informasi pendaftar IGDC</a></li>
				<li class="active">Presensi Finalis IGDC</li>
				<?php } ?>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<?php if(empty($_GET['presensi'])) { ?>
				<h1 class="page-header">Data pendaftar IGDC</h1>
				<?php }elseif(!empty($_GET['presensi']) && $_GET['presensi'] == 1){ ?>
				<h1 class="page-header">Presensi Finalis IGDC</h1>
				<?php } ?>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<?php if(empty($_GET['presensi'])) { ?>
					<div class="panel-heading">Tabel pendaftar IGDC <span><button class="btn btn-default" onclick="$('#tablesa').bootstrapTable('togglePagination');$('#tablesa').tableExport({type:'excel', fileName: '<?php echo date("Y_m_d")?>_Data_IGDC'});$('#tablesa').bootstrapTable('togglePagination');">Download Excel</button></span></div>
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
							        <th data-sortable="true">Nama Tim</th>
							        <th data-sortable="true">Anggota</th>
							        <th data-sortable="true">(Status Pembayaran)</th>
							        <th data-sortable="true">Nama Games</th>
							        <th style="display:none" data-tableexport-display="always">Deskripsi</th>
							        <th data-sortable="true">Link</th>
							        <th data-sortable="true">Alamat</th>
							        <th data-sortable="true">Institusi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $count = 1; while ($data = mysqli_fetch_assoc($user)) { ?>
						    	<tr>
						    		<td><?php echo str_pad($count++, 3, '0', STR_PAD_LEFT) ?></td>
						    		<td><a href="./user?user=<?php echo $data['no_identitas'] ?>" class="btn btn-primary"><?php echo $data['tim']."<br/>(".$data['nama_lengkap'].")"; ?></a></td>
						    		<td><?php echo "- ", $data['anggota1'], "<br/>- ", $data['anggota2']; ?></td>
						    		<td><?php 
						    			$isIGDC = (mysqli_query($conn, "SELECT * FROM igdc WHERE id_ketua = ".$data['id_user'].""));
										if(!(mysqli_num_rows($isIGDC))){
											echo "-";
										}else if(mysqli_num_rows($isIGDC)){
											$isIGDC = mysqli_fetch_assoc($isIGDC);
											if($isIGDC['status_bayar_igdc']){
												$bayar = "Sudah Bayar";
											}else{
												$bayar = "Belum Bayar";
											}
											echo "<span><i class='fa fa-check-square-o' aria-hidden='true'></i> <b>IGDC </b>($bayar)<br/><span>";
										}
						    		?></td>
						    		<td><?php echo $data['judul'] ?></td>
						    		<td style="display:none" data-tableexport-display="always"><?php echo substr($data['deskripsi'],0,200); strlen($data['deskripsi'])<200?print(""):print("..."); ?></td>
						    		<td><?php echo "Game: <a href='".$data['game']."' target='_blank'>".$data['game']."</a><br/>Video: <a href='".$data['video']."' target='_blank'>".$data['video']."</a>"?></td>
						    		<td><?php echo $data['alamat'] ?></td>
						    		<td><?php echo $data['institusi'] ?></td>
						    	</tr>
						    	<?php } ?>
						    </tbody>
						</table>
					</div>
					<?php }elseif(!empty($_GET['presensi']) && $_GET['presensi']==1){ ?>
						<?php
							$finalisIgdc = mysqli_query($conn, "SELECT * FROM (ittoday JOIN igdc ON id_user = id_ketua) WHERE id_ketua IN (86,44,164,222,41,154,217,92,53,282)") or die(mysqli_error($conn));
						?>
						<div class="panel-heading">Tabel Presensi Finalis IGDC <span><button class="btn btn-default" onclick="$('#presensiIGDC').tableExport({type:'excel', fileName: '<?php echo date("Y_m_d")?>_Data_Presensi_Finalis_IGDC'});">Download Excel</button></span>
						</div>
						<?php if(isset($_GET['mod']) && $_GET['mod']=="webmaster"): ?>
						<div>
							<form method="post">
								<button type="submit" value="1" name="changePresent">Un-Present All</button>
							</form>
						</div>
						<?php endif; ?>
						<div class="panel-body">
							<table class="table table-hover" id="presensiIGDC">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Tim</th>
										<th>Kehadiran</th>
									</tr>
								</thead>
								<tbody>
									<?php $count = 1; while($data = mysqli_fetch_assoc($finalisIgdc)){ ?>
										<tr>
											<td><?php echo $count++; ?></td>
											<td><a href="user?user=<?php echo $data['no_identitas'] ?>"><?php echo $data['tim'] ?></a> (<?php echo $data['email'] ?>)</td>
											<td><?php echo $data['hadir_igdc']?"Hadir":"Tidak Hadir"; ?></td>
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
					mysqli_query($conn, "UPDATE igdc SET hadir_igdc = 0");
				}
			}

		?>