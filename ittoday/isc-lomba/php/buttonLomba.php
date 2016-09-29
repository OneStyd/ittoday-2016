<?php require_once("time.php"); ?>

<?php if($valid['s1']) { ?>
<input type="button" onclick="window.location.href='soal-s1/1'" value="Mulai Lomba (Sesi 1)" class="btn btn-primary"/>
<?php }else if($valid['s2']) { ?>
<input type="button" onclick="window.location.href='soal-s2/1'" value="Mulai Lomba (Sesi 2)" class="btn btn-primary"/>
<?php }else{ ?>
	<?php $diff = $pelaksanaan1->getTimestamp()-$timeFirst->getTimestamp(); ?>
<input type"button" value="Mulai Lomba" class="btn btn-primary" disabled/>
<?php } ?>