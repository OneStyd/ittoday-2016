	var data = <?php echo $diffInSeconds; ?>;

		if(data>0)
			$('#wow').html("Tersisa: " + Math.floor(data / 3600) + " jam " + Math.floor(data % 3600 / 60) + " menit " + data % 60 + " detik");

		$(document).everyTime('1s', function(i){
			$.ajax({
			  url: "<?php echo $inclusion; ?>php/time.php",
			  success: function(data){
			  	if(data != "timesup"){
			  		$('#wow').html("Tersisa: " + Math.floor(data / 3600) + " jam " + Math.floor(data % 3600 / 60) + " menit " + data % 60 + " detik");
			  	}else{
			  		$('#wow').html();
			  		$(this).stop();
			  		window.location.href="<?php echo $inclusion;?>summary";
			  	}
			  }
			});
		});