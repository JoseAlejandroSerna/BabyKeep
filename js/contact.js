
$(document).ready(function () {
	loadContact();
	eventsContact();
	viewSocialNetwork();
});

function loadContact()
{
	$(".contPhone").slideUp();
	$(".contWhatsapp").slideUp();
	
	$(".selbranch").empty();
	
	var cont = 0;
	var idBranch = 0;
	$.each(JSON_Branch, function (i, branch) {

		$(".selbranch").append($('<option>', { 
			value: branch.idBranch,
			text : branch.vBranch 
		}));

		if(cont == 0){	idBranch = branch.idBranch;	}
		cont++;
	});

	if(cont > 0)
	{
		$(".selbranch option[value='"+ idBranch +"']").prop('selected', true);
		viewBranch();
		viewWhatsapp();
	}
}

function viewBranch()
{
	$.each(JSON_Branch, function (i, branch) {
		if(branch.idBranch == $(".selbranch").val())
		{
			if(branch.vLatitude != "" && branch.vLongitude)
			{
				var urlMap = "https://maps.google.com/?ll="+branch.vLatitude+","+branch.vLongitude+"&z=14&t=m&output=embed";
				$("#mapBranch").attr("src", urlMap);
				$("#mapBranch").slideDown();

			}
			if(branch.vImage != "")
			{
				var urlSuc = "/assets/images/branch/"+branch.vImage+"";
				$(".imageSuc").attr("src", urlSuc);

			}
			$(".hdn_email_branch").val(branch.vEmail);
			$(".hdn_vBranch").val(branch.vBranch);
			
		}
	});
}

function eventsContact()
{
	$(".selbranch").on('change', function (e) {
		viewBranch();
		viewWhatsapp();
		
	});
}

function viewWhatsapp()
{
	var html_whatsapp = "";
	var contWhat = 0;

	$(".contWhatsapp").slideUp();
	$.each(JSON_branch_phone, function (i, branch_phone) {
		if($(".selbranch").val() == branch_phone.idBranch)
		{
			contWhat++;
			html_whatsapp += "<a class='elementor-icon elementor-social-icon elementor-social-icon-whatsapp'  href='https://wa.me/52"+ branch_phone.iBranchPhone+"' target='_blank'><i class='fa fa-whatsapp'></i></a>";
		}
	});

	if(contWhat>0)
	{
		$(".contWhatsapp").slideDown();
		$(".contIconWhatsapp").empty();
		$(".contIconWhatsapp").append(html_whatsapp);
	}
}

function viewSocialNetwork()
{
	ClearContact();
	
	$.each(JSON_socialNetworks, function (i, socialNetworks) {
		if(socialNetworks.vUrlFacebook != "")
		{
			$("#urlFacebook").attr("href", socialNetworks.vUrlFacebook);
			$("#urlFacebook").slideDown();

		}
		if(socialNetworks.vUrlInstagram != "")
		{
			$("#urlInstagram").attr("href", socialNetworks.vUrlInstagram);
			$("#urlInstagram").slideDown();

		}
		if(socialNetworks.vUrlTwitter != "")
		{
			$("#urlTwitter").attr("href", socialNetworks.vUrlTwitter);
			$("#urlTwitter").slideDown();

		}
		if(socialNetworks.vUrlPinterest != "")
		{
			$("#urlPinterest").attr("href", socialNetworks.vUrlPinterest);
			$("#urlPinterest").slideDown();

		}
	});
}

function ClearContact()
{
	$(".elementor-social-icon-facebook").slideUp();
	$(".elementor-social-icon-instagram").slideUp();
	$(".elementor-social-icon-twitter").slideUp();
	$(".elementor-social-icon-pinterest").slideUp();
	$("#mapBranch").slideUp();

	$(".emaiContact").removeClass("errorContat");
	$(".messageContact").removeClass("errorContat");
}

function valContact()
{
	$("#email").removeClass("errorContat");
	$("#message").removeClass("errorContat");

	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var isEmail = regex.test($("#email").val()); 

	var send = true;
	if( $("#email").val() == "")
	{
		$("#email").addClass("errorContat");
		send = false;
	}
	else if(!isEmail)
	{
		$("#email").addClass("errorContat");
		send = false;
	}
	else if( $("#message").val() == "")
	{
		$("#message").addClass("errorContat");
		send = false;
	}
	
	if(send){ 
		$(".hdn_email").val($("#email").val());
		$(".hdn_message").val($("#message").val());	
		$(".btn-elementor-send").slideUp();
		//$(".btn_send").click();
		sendMail();
	}
}

function sendMail() {
    var link = "mailto:" + $(".hdn_email_branch").val() 
			+ "?cc=" + $(".hdn_email").val() 
            + "&subject=" + encodeURIComponent("Sucursal: " + $(".hdn_vBranch").val())
            + "&body=" + encodeURIComponent($(".hdn_message").val());
    
    window.location.href = link;
}

function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
