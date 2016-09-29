<?php
	$user = mysqli_query($conn, "SELECT id_peserta, tim, anggota1, anggota2, id_user, nama_lengkap, email, no_hp, alamat, no_identitas, institusi FROM (ittoday JOIN agrihack ON id_user = id_ketua) WHERE invalid = 2 OR invalid = 0 ORDER BY id_peserta DESC") or die(mysqli_error($conn));
?>	

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<?php if(empty($_GET['user'])) {  ?>
				<li class="active">Informasi pendaftar Agrihack</li>
				<?php }else if(!empty($_GET['user'])) {  ?>
				<li><a href="user">Informasi user</a></li>
				<li class="active"><?php echo $_GET['user'] ?></li>
				<?php } ?>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data pendaftar Agrihack</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<?php if(empty($_GET['user'])) { ?>
					<div class="panel-heading">Tabel pendaftar Agrihack <span><button class="btn btn-default" onclick="$('#tablesa').bootstrapTable('togglePagination');$('#tablesa').tableExport({type:'excel', fileName: '<?php echo date("Y_m_d")?>_Data_Agrihack'});$('#tablesa').bootstrapTable('togglePagination');">Download Excel</button></span></div>
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
							        <th data-sortable="true">Angota</th>
							        <th data-sortable="true">(Status Pembayaran)</th>
							        <th data-sortable="true">E-mail</th>
							        <th data-sortable="true">Alamat</th>
							        <th data-sortable="true">Institusi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $count = 1; while ($data = mysqli_fetch_assoc($user)) { ?>
						    	<tr>
						    		<td><?php echo str_pad($count++, 3, '0', STR_PAD_LEFT) ?></td>
						    		<td><a href="./user?user=<?php echo $data['no_identitas'] ?>" class="btn btn-primary"><?php echo $data['tim'], "<br/>(", $data['nama_lengkap'].")"; ?></a></td>
						    		<td><?php echo "- ".$data['anggota1']."<br/>- ".$data['anggota2']; ?></td>
						    		<td><?php 
										$isAH = (mysqli_query($conn, "SELECT * FROM agrihack WHERE id_ketua = ".$data['id_user'].""));
										
										if(!(mysqli_num_rows($isAH))){
											echo "-";
										}else if(mysqli_num_rows($isAH)){
											$isAH = mysqli_fetch_assoc($isAH);
											if($isAH['status_bayar_ah']){
												$bayar = "Sudah Bayar";
											}else{
												$bayar = "Belum Bayar";
											}
											echo "<span><i class='fa fa-check-square-o' aria-hidden='true'></i> <b>Agrihack </b>($bayar)<br/><span>";
										}
						    		?></td>
						    		<td><?php echo $data['email'] ?></td>
						    		<td><?php echo $data['alamat'] ?></td>
						    		<td><?php echo $data['institusi'] ?></td>
						    	</tr>
						    	<?php } ?>
						</table>
					</div>
					
					<?php } ?>