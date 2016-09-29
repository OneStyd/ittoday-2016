	<?php 

		$id = $_GET['id'];

		$info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM (isc JOIN ittoday ON isc.id_user = ittoday.id_user) WHERE id_peserta = $id"));

		$query = mysqli_query($conn, "SELECT nama_lengkap, institusi, no_identitas, no_soal, pertanyaan, jawaban, sumber, jawaban_user, sumber_user, status, waktu_menjawab
									FROM (((ittoday JOIN isc ON ittoday.id_user = isc.id_user) JOIN isc_jawaban_user ON id_peserta = id_peserta_isc) JOIN 
									isc_soal ON no_soal = no_soal_isc) WHERE id_peserta = $id ORDER BY no_soal");

		// $data = mysqli_fetch_assoc($query);

	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="./">Dashboard</a></li>
				<li><a href="ranking">Peringkat Peserta</a></li>
				<li class="active"><?php echo $info['nama_lengkap']." (".$info['institusi']." - ".$info['no_identitas'].")"; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Rangking</h1> -->
			</div>
		</div><!--/.row-->
		<style>
			th{
				text-align: center;
				margin-right: 5px;
				margin-left: 5px;
			}
		</style>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-file-o"></i> Jawaban <?php echo $info['nama_lengkap'] ?>
					</div>
					<div class="panel-body">
						<div class="alert alert-info">Status = 1 -> Jawaban benar</div>
						<table class="table table-hover table-bordered table-responsive">
							<thead>
								<tr>
									<th>No Soal</th>
									<!-- <th>Pertanyaan</th> -->
									<th>Jawaban/Sumber Seharusnya</th>
									<th>Jawaban Peserta</th>
									<th>Sumber Link Peserta</th>
									<th>Waktu Menjawab</th>
									<th>Status</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								while($data = mysqli_fetch_assoc($query)){
								?>
								<?php //if($data['no_soal'] == 61) echo '<tr><td colspan="7" style="text-align:center">Sesi 2</td></tr>'; ?>
								<tr>
									<td><span id="no<?php echo $data['no_soal'] ?>"><?php echo $data['no_soal'] ?></span></td>
									<!-- <td><?php echo $data['pertanyaan'] ?></td> -->
									<td><?php echo $data['jawaban']."<br/><a href=\"".$data['sumber']."\" class=\"btn btn-xs btn-primary\" target=\"_blank\">Link</a>" ?></td>
									<td><?php echo $data['jawaban_user'] ?></td>
									<td><?php echo "<a href=\"".$data['sumber_user']."\" class=\"btn btn-xs btn-primary\" target=\"_blank\">Link</a>" ?></td>
									<td><?php echo $data['waktu_menjawab'] ?></td>
									<td><?php echo $data['status'] ?></td>
									<td><input type="button" value="Koreksi" onclick="changeState(<?php echo $data['status']?0:1; ?>, <?php echo $data['no_soal'] ?>)" id="btn-koreksi" class="btn btn-primary"/></td>
								</tr>
								<?php
								}
								?>
							</tbody>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script>
		var pesertaID = <?php echo $id ?>;
	</script>
	<script src="js/ajaxChangeState.js" type="text/javascript"></script>