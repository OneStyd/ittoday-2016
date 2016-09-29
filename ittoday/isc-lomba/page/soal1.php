
<?php if($_GET['soal1']!="summary") { ?>
<div class="alert alert-info" style="padding: 10px 0 10px 10px;"><i class="fa fa-2x fa-info-circle"></i> Setiap jawaban yang Anda ketik akan langsung disimpan oleh sistem.</div>
<?php } ?>
<div class="row"><div id="wow"></div>
		
	<?php if($_GET['soal1'] != "summary"){ 
		include "php/submitjawaban.php";
		include "php/statusisi.php";
	?>
	<h3 class="page-header" style="padding-left:5px;"><i class="fa fa-question-circle"></i> Soal <?php echo $_GET['soal1']; ?>/60</h3>
	<div class="col-md-4" style="border-right: 1px solid #ddd">
		<?php
			for($i=1; $i<=60; $i++){
				$isNULL = "isset";
				if(!isAnswer($i, $info['id_peserta'])){
					$isNULL = "default";
				}
				if($_GET['soal1']!=$i)
					echo '<button onclick="cekAns('.$i.')" style="width:50px;" class="btn btn-'.$isNULL.' btn-xs">'.$i.'</button>';
				else
					echo '<button style="width:50px;" class="btn btn-'.$isNULL.' btn-xs" disabled>'.$i.'</button>';
			}
		?>
	</div>
	<div class="col-md-8">
		<?php 
			function strip_single_tag($str,$tag){
			    $str=preg_replace('/<'.$tag.'[^>]*>/i', '', $str);
			    $str=preg_replace('/<\/'.$tag.'>/i', '<br/>', $str);
			    return $str;
			} 
			
			$soal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT pertanyaan FROM isc_soal WHERE no_soal = ".addslashes(strip_tags($_GET['soal1'])).""));
			if($soal['pertanyaan']==NULL) echo "<i> Soal belum tersedia </i>";
 			else echo strip_single_tag($soal['pertanyaan'], 'p');
		?>
		<form method="post" id="soalisc">
			<div class="form-group" style="padding-top:20px;">
				<label for="jawaban">Jawaban</label>
				<input type="text" name="jawaban" id="ans" onchange="cekAns(0)" value="<?php echo $jawaban_user ?>" placeholder="jawaban untuk pertanyaan di atas" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="source">Sumber Link</label>
				<input type="text" name="source" id="sou" onchange="cekAns(0)" value="<?php echo $sumber_user ?>" placeholder="Link sumber halaman terkait pertanyaan" class="form-control"/>
			</div>
			<div class="form-group">
				<?php if($_GET['soal1']!=1) { $back = $_GET['soal1']-1; ?>
				<input type="button" name="back" class="btn btn-primary" onclick="cekAns(<?php echo $back; ?>)" value="Back"/>
				<?php } ?>
				<?php $next = $_GET['soal1']+1; if($_GET['soal1']==60) {  ?>
				<input type="button" name="btn_submit_all" id="btn_submit" class="btn btn-primary" onclick="cekAns(<?php echo $next; ?>)" value="Finish"/>
				<?php }else{ ?>
				<input type="button" name="btn_submit" onclick="cekAns(<?php echo $next ?>)" id="btn_submit" class="btn btn-primary" value="Next"/>
				<?php } ?>
			</div>
		</form>
	</div>
	<?php }else if($_GET['soal1'] == "summary"){ print('<h3 class="page-header" style="padding-left:5px;"><i class="fa fa-file-o"></i> Summary</h3>'); include "page/summary.php"; } ?>
</div>
	<script>
		$('#soalisc').bind("keypress", function(e){
			if(e.which == 13){
				cekAns(<?php echo $next; ?>);
			}
		});
	</script>
	<script>
		function cekAns(pindah){
			var no_soal = <?php echo $_GET['soal1'] ?>;
			var id_peserta = <?php echo $info['id_peserta'] ?>;
			var jawaban = $('#ans').val();
			var source = $('#sou').val();
			var submit = $('#btn_submit').val();

			$.ajax({
				url: "<?php echo $inclusion; ?>php/submitjawaban.php",
				type: "POST",
				data: {no_soal: no_soal, id_peserta: id_peserta, jawaban: jawaban, source: source, btn_submit: submit},
				success: function(data){
					if(pindah <= 60 && pindah!=0){
						window.location.href=pindah;
					}else if(pindah==61){
						window.location.href="summary";
					}
				}
			})
		}
	</script>
	<script>
		var data = <?php echo $diffInSeconds; ?>;

		if(data>0)
			$('#wow').html("Tersisa: " + Math.floor(data / 3600) + " jam " + Math.floor(data % 3600 / 60) + " menit " + data % 60 + " detik");

		$(document).everyTime('1s', function(i){
			$.ajax({
			  url: "<?php echo $inclusion; ?>php/ajaxtime.php",
			  success: function(data){
			  	if(data != "timesup"){
			  		$('#wow').html("Tersisa: " + Math.floor(data / 3600) + " jam " + Math.floor(data % 3600 / 60) + " menit " + data % 60 + " detik");
			  	}else{
			  		$('#wow').html();
			  		$(this).stop();
			  		window.setTimeout(function(){
			  			window.location.href="selesai";
			  		},1500);
			  	}
			  }
			});
		});
	</script>
