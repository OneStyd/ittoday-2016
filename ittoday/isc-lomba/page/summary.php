<?php
	if(isset($_GET['soal1'])) $id = 1;
	else $id = 61;

	$detail = mysqli_query($conn, "SELECT no_soal_isc, jawaban_user, sumber_user FROM isc_jawaban_user WHERE id_peserta_isc = ".$info['id_peserta']." AND no_soal_isc BETWEEN ".$id." AND ".($id+59)." ORDER BY no_soal_isc") or die(mysqli_error($conn));
	$no = mysqli_query($conn, "SELECT no_soal_isc FROM isc_jawaban_user WHERE id_peserta_isc = ".$info['id_peserta']." AND no_soal_isc BETWEEN ".$id." AND ".($id+59)."") or die(mysqli_error($conn));
	$no_arr = array();
	$i = 0;
	while($nos = mysqli_fetch_assoc($no)){
		$no_arr[$i++] = $nos['no_soal_isc'];
	}
			
?>	
	
		<div class="col-md-12">
			<table class="table table-sm table-hover">
				<thead>
				<tr>
					<th>No Soal</th>
					<th>Status Jawaban</th>
					<th>Status Link Sumber</th>
					<th>Opsi</th>
				</tr>
				</thead>
				<tbody>
		<?php for($i=$id; $i<=($id+59);$i++){ ?>
				<tr>
					<td><?php echo $i;?></td>
					<?php if(in_array($i, $no_arr)){  ?>
						<?php $details = mysqli_fetch_assoc($detail); ?>
						<td><?php echo $details['jawaban_user']; ?></td>
						<td class="col-md-4"><?php echo $details['sumber_user']; ?></td>
					<?php }else{ ?>
						<td><b><?php echo "Jawaban kosong"; ?></b></td>
						<td class="col-md-4"><b><?php echo "Link kosong"; ?></b></td>
					<?php } ?>
					<td><button type="button" onclick="window.location.href='<?php echo $i ?>'">Koreksi</button></td>
				</tr>

		<?php } ?>
				</tbody>
			</table>
		</div>