function cekPass(){
	var pass = document.getElementById('password_r');

	if(pass1.value == ""){
		$('#pass_error2').hide();
	}
	else{
		$('#pass_error2').show();
	}
}

function validasiEmail(){
	var email = $("#email_r").val();

	if(email == ""){
		$("#email_error").hide();
	}
	else{
		$("#email_error").show();
	}

	jQuery.ajax({
		url: "./author/validasi.php",
		data:{email: email},
		async: false,  
		type: "POST",
		success:function(data){
			$("#email_error").html(data);
		},
		error:function (){}
	});

}

function disabledT(){
	if(($("#email_error").html() == "\n") && ($("#field_terms").prop("checked"))){
		$("#registrasi_btn").attr("disabled", false);
	}else{
		$("#registrasi_btn").attr("disabled", true);
	}
}

function cekPass2(){
	var pass1 = document.getElementById('password_r');
	var pass2 = document.getElementById('password2_r');

	if(pass1.value == pass2.value){
		document.getElementById('pass_error2').innerHTML = "Password Match";
	}
	else{
		document.getElementById('pass_error2').innerHTML = "Password Doesn't Match";
	}

	if(pass2.value == ""){
		$('#pass_error2').hide();
	}
	else{
		$('#pass_error2').show();
	}
}