	<?php
		$datas1 = mysqli_query($conn, "SELECT * FROM isc_soal WHERE no_soal < 61");

		if(empty($_GET['soal'])){
			
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<li class="active">Soal Sesi 1</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-folder-o"></i> Arsip Soal</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Soal Sesi 1
					</div>
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							        <th data-sortable="true">No. Soal</th>
							        <th data-sortable="true">Pertanyaan</th>
							        <th data-sortable="true">Jawaban</th>
							        <th data-sortable="true">Link</th>
							        <th>Opsi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php while ($data = mysqli_fetch_assoc($datas1)) { ?>
						    	<tr>
						    		<td><?php echo $data['no_soal'] ?></td>
						    		<td><?php echo $data['pertanyaan'] ?></td>
						    		<td><?php echo $data['jawaban'] ?></td>
						    		<td><?php echo $data['sumber'] ?></td>
						    		<td><input type="button" value="Edit" onclick="window.location.href='?soal=<?php echo $data['no_soal'] ?>'" class="btn btn-primary"></td>
						    	</tr>
						    	<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<?php }else if(isset($_GET['soal'])){
			include "editsoal.php";
	} ?>
