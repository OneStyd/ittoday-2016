function changeState(status, no_soal){
	$.ajax({
		url: "php/koreksi.php",
		type: "POST",
		data: {peserta: pesertaID, status: status, no: no_soal},
		success: function(data){
			if(data == "Sukses"){
				window.location.hash = "#no"+no_soal;
				location.reload();
			}else{
				alert(data);
			}
		}
	})
}