//function validateLogin(){
	$("#btn-login").click(function(event){
	  var login = $("#btn-login").val();
      var email = $("#email").val();
      var password = $("#password").val();

      event.preventDefault();
      $.ajax({
        url: "./author/login_proc.php",
        type: "POST",
        data: {login: login, email:email, password: password},
        success: function(data){
          if(data == 'errno200'){
            //event.preventDefault();
            $("#err_login").html("<div class='alert alert-warning alert-dismissible'>Invalid Login: Password salah</div>");
            // alert("wrongpass");
          }else if(data == 'errno201'){
            $("#err_login").html("<div class='alert alert-warning alert-dismissible'>Invalid Login: Anda belum terdaftar</div>");
          }else if(data == 'errno202'){
            $("#err_login").html("<div class='alert alert-danger alert-dismissible'>Invalid Login: No Input</div>");
          }else{
            window.location.href="./user";
          }
        }
      });
  });
//}

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