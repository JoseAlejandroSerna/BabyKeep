var total_cart = 0;
var total_sale = 0;

$(document).ready(function(){
	
	viewPrice();
	
});

function viewPrice()
{
	if(varView == "Schedule" || varView == "ProductRent")
	{
		total_cart = parseInt($("#hdnTotal").val());
	}
	else
	{
		$.each(JSON_hdn_cart, function(i, cart){
			total_cart += cart.iPrice;
		});
	}

	var commission = (total_cart*commission_percentage)/100;
	total_sale = total_cart + commission + sending;

	$("#comission").text("$" + commission);
	$("#subtotal").text("$" + total_cart);
	$("#sending").text("$" + sending);
	$("#total").text("$" + total_sale);

	$("#hdnTotal").val(total_sale);
}

function valCard()
{
	cleanClassErrorCart();

	var send = true;

	if($("#name").val() == "")
	{
		$("#name").addClass("errorContat");					send = false;
	}
	/*
	else if(!OpenPay.card.validateCardNumber($("#c_number").val()))
	{
		$("#c_number").addClass("errorContat");					send = false;
	}
	else if(!OpenPay.card.validateExpiry($("#c_month").val(), $("#c_year").val()))
	{
		$("#c_month").addClass("errorContat");
		$("#c_year").addClass("errorContat");					send = false;
	}
	else if(!OpenPay.card.validateCVC($("#c_cvv").val()))
	{
		$("#c_cvv").addClass("errorContat");					send = false;
	}
	*/
	if(send)
	{
		$(".btn-pay").click();

	}
}

function cleanClassErrorCart()
{
	$("#name").removeClass("errorContat");
	$("#c_number").removeClass("errorContat");
	$("#c_month").removeClass("errorContat");
	$("#c_year").removeClass("errorContat");
	$("#c_cvv").removeClass("errorContat");
}

function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
