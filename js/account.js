$(document).ready(function () {
});

function valAccount()
{
	cleanClassError();
	var send = true;
	var userValid = true;

	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var isEmail = regex.test($("#email").val()); 

	$.each(JSON_all_user,function(i,user){
		if(user.vEmail == $("#email").val())
		{
			userValid = false;
			send = false;
		}
	});

	if( $("#name").val() == "")
	{
		$("#name").addClass("errorContat");		send = false;
		$(".messageError").text(varError);
	}
	else if($("#email").val() == "")
	{
		$("#email").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if(!isEmail){
		$("#email").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if($("#password").val() == "")
	{
		$("#password").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if($("#password").val().length < 8)
	{
		$("#password").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if($("#confirm_password").val() != $("#password").val())
	{
		$("#confirm_password").addClass("errorContat");
		$("#password").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if( $("#phone").val() == "")
	{
		$("#phone").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if( $("#phone").val().length != 10)
	{
		$("#phone").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if( $("#address").val() == "")
	{
		$("#address").addClass("errorContat");	send = false;
		$(".messageError").text(varError);
	}
	else if( $("#cp").val() == "")
	{
		$("#cp").addClass("errorContat");		send = false;
		$(".messageError").text(varError);
	}
	else if(!userValid)
	{	
		$("#name").addClass("errorContat");	
		$("#email").addClass("errorContat");
		$("#password").addClass("errorContat");
		$("#confirm_password").addClass("errorContat");
		$("#phone").addClass("errorContat");
		$("#address").addClass("errorContat");
		$("#cp").addClass("errorContat");

		$(".messageError").text(varUserNotValid);	
		send = false;
	}

	if(send)
	{ 		
		$(".hdn_name").val($("#name").val());
		$(".hdn_email").val($("#email").val());
		$(".hdn_password").val($("#password").val());
		$(".hdn_phone").val($("#phone").val());
		$(".hdn_address").val($("#address").val());
		$(".hdn_cp").val($("#cp").val());

		$(".btn_account").click();						
	}
}

function cleanClassError()
{
	$("#name").removeClass("errorContat");
	$("#email").removeClass("errorContat");
	$("#password").removeClass("errorContat");
	$("#confirm_password").removeClass("errorContat");
	$("#phone").removeClass("errorContat");
	$("#address").removeClass("errorContat");
	$("#cp").removeClass("errorContat");
}

function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
