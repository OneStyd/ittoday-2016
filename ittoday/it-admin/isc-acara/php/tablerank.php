	<?php
		// header("Cache-Control: no-cache,no-store");
		require_once("../../connect_adm.php");
		$info = mysqli_query($conn, "SELECT ittoday.id_user, id_peserta, nama_lengkap, no_identitas, institusi, SUM(status) as points, MAX(waktu_menjawab) as time FROM ((isc LEFT OUTER JOIN ittoday ON isc.id_user = ittoday.id_user) LEFT OUTER JOIN isc_jawaban_user ON id_peserta = id_peserta_isc) GROUP BY id_peserta ORDER by points DESC, time, id_peserta");
	?>	
	<!-- data-toggle="table" -->
						<table class="table table-condensed" data-pagination="true" >
						    <thead>
							    <tr>
							        <th data-sortable="true">Rank</th>
							        <th data-sortable="true">Nama</th>
							        <th data-sortable="true">No Identitas</th>
							        <th data-sortable="true">Point(s)</th>
							        <th data-sortable="true">Opsi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $count = 1; while ($data = mysqli_fetch_assoc($info)) { 
						    			$string = "";
						    			if($count == 1 && isset($data['points'])) $string="<img src=\"medal/gold.png\"/ style=\"max-width: 20px;\">";
						    			if($count == 2 && isset($data['points'])) $string="<img src=\"medal/silver.png\" style=\"max-width: 20px;\"/>";
						    			if($count == 3 && isset($data['points'])) $string="<img src=\"medal/bronze.png\" style=\"max-width: 20px;\"/>";
						    	?>
						    	
						    	<tr>
						    		<td><?php echo $count++, " ", $string; ?></td>
						    		<td><?php echo $data['nama_lengkap'] ?></td>
						    		<td><?php echo $data['no_identitas'] ?></td>
						    		<td><?php if($data['points']==null) echo "-"; else echo $data['points'] ?></td>
						    		<td><input type="button" value="Lihat Jawaban" onclick="window.location.href='?id=<?php echo $data['id_peserta']; ?>'" class="btn btn-xs btn-primary"></td>
						    	</tr>
						    	<?php } ?>
						</table>


						<script src="../js/bootstrap-table.js"></script>
