
$(document).ready(function () {
});

function valUser()
{
	cleanClassError();
	var send = true;
	var userValid = true;
	var goAdmin = false;

	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var isEmail = regex.test($("#email").val()); 

	$.each(JSON_all_user,function(i,user){
		if(user.vEmail == $("#email").val() && user.vPassword == $("#password").val())
		{
			$(".hdn_idUser").val(user.idUser);
			$(".hdn_idPermissions").val(user.idPermissions);
			$(".hdn_vUser").val(user.vUser);
			$(".hdn_vEmail").val(user.vEmail);
			$(".hdn_vPassword").val(user.vPassword);
			$(".hdn_vPhone").val(user.vPhone);
			$(".hdn_vAddress").val(user.vAddress);
			$(".hdn_vCP").val(user.vCP);
			$(".hdn_iStatus").val(user.iStatus);

			userValid = false;
		}
	});

	if( $("#email").val() == "")
	{
		$("#email").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if(!isEmail){
		$("#email").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if( $("#password").val() == "")
	{
		$("#password").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if($("#password").val().length < 8)
	{
		$("#password").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if(userValid)
	{
		$("#email").addClass("errorContat");
		$("#password").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}

	
	if(send){ 	
		$(".btn_login").click();						
	}
}

function cleanClassError()
{
	$("#email").removeClass("errorContat");
	$("#password").removeClass("errorContat");
	$(".messageError").text("");
}

function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
