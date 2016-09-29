$(document).ready(function(){	
	$('#btn-oke').click(function(e){
		var identity = $('#identity').val();

		$("#load-screen").show();
		e.preventDefault();
		$.ajax({
			url: "modif.php",
			type: "POST",
			data: {mail: identity, acara: acara},
			success: function(data){
				$("#load-screen").delay(500).fadeOut();
				if(data == "berhasil absen"){
					alert("Berhasil!");
					$('#errMsg').html("<div class=\"alert alert-success\"><span class=\"fa fa-check-circle-o fa-2x\" style=\"vertical-align:middle;\"></span> <b>Sukses: </b>Selamat Datang di IT Today 2016 :)</div>").show().delay(3500).fadeOut();
					$('#identity').val('');
				}else{
					//alert("Gagal!\n\nAlasan: "+data);
					$('#errMsg').html("<div class=\"alert alert-warning\"><span class=\"fa fa-times-circle-o fa-2x\" style=\"vertical-align:middle;\"></span> <b>Unexpected error: </b>"+data+"</div>").show().delay(3500).fadeOut();
				}
			}
		});
	});
})