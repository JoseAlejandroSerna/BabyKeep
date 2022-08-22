var dateFin = "";
var url = "https://babykeep.com.mx/";

$(document).ready(function () {
	
	if(varView == "Schedulce"){ loadSchedulce(); }

	if(varView == "Contact"){ loadContact(); }
});

function loadContact()
{
	$(".selbranch").empty();
	ClearContact();
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

		$.each(JSON_Branch, function (i, branch) {
			if(branch.idBranch == idBranch)
			{
				if(branch.vUrlFacebook != "")
				{
					$(".elementor-social-icon-facebook").attr("href", branch.vUrlFacebook);
					$(".elementor-social-icon-facebook").slideDown();

				}
				if(branch.vUrlInstagram != "")
				{
					$(".elementor-social-icon-instagram").attr("href", branch.vUrlInstagram);
					$(".elementor-social-icon-instagram").slideDown();

				}
				if(branch.vUrlTwitter != "")
				{
					$(".elementor-social-icon-twitter").attr("href", branch.vUrlTwitter);
					$(".elementor-social-icon-twitter").slideDown();

				}
				if(branch.vUrlPinterest != "")
				{
					$(".elementor-social-icon-pinterest").attr("href", branch.vUrlPinterest);
					$(".elementor-social-icon-pinterest").slideDown();

				}
				if(branch.iBranchPhone != "")
				{
					$(".elementor-social-icon-whatsapp").attr("href", branch.iBranchPhone);
					$(".elementor-social-icon-whatsapp").slideDown();

				}
				if(branch.vLatitude != "" && branch.vLongitude)
				{
					var urlMap = "https://maps.google.com/?ll="+branch.vLatitude+","+branch.vLongitude+"&z=14&t=m&output=embed";
					$("#mapBranch").attr("src", urlMap);
					$("#mapBranch").slideDown();

				}
				if(branch.vImage != "")
				{
					var urlSuc = "/assets/images/branch/"+branch.idBranch+"/"+branch.vImage+"";
					$(".imageSuc").attr("src", urlSuc);

				}
				
				
			}
		});

	}

	///////
	$(".selbranch").on('change', function (e) {
		ClearContact();

		$.each(JSON_Branch, function (i, branch) {
			if(branch.idBranch == $(".selbranch").val())
			{
				if(branch.vUrlFacebook != "")
				{
					$(".elementor-social-icon-facebook").attr("href", branch.vUrlFacebook);
					$(".elementor-social-icon-facebook").slideDown();

				}
				if(branch.vUrlInstagram != "")
				{
					$(".elementor-social-icon-instagram").attr("href", branch.vUrlInstagram);
					$(".elementor-social-icon-instagram").slideDown();

				}
				if(branch.vUrlTwitter != "")
				{
					$(".elementor-social-icon-twitter").attr("href", branch.vUrlTwitter);
					$(".elementor-social-icon-twitter").slideDown();

				}
				if(branch.vUrlPinterest != "")
				{
					$(".elementor-social-icon-pinterest").attr("href", branch.vUrlPinterest);
					$(".elementor-social-icon-pinterest").slideDown();

				}
				if(branch.iBranchPhone != "")
				{
					$(".elementor-social-icon-whatsapp").attr("href", branch.iBranchPhone);
					$(".elementor-social-icon-whatsapp").slideDown();

				}
				if(branch.vLatitude != "" && branch.vLongitude)
				{
					var urlMap = "https://maps.google.com/?ll="+branch.vLatitude+","+branch.vLongitude+"&z=14&t=m&output=embed";
					$("#mapBranch").attr("src", urlMap);
					$("#mapBranch").slideDown();

				}
				if(branch.vImage != "")
				{
					var urlSuc = "/assets/images/branch/"+branch.idBranch+"/"+branch.vImage+"";
					$(".imageSuc").attr("src", urlSuc);

				}
				
			}
		});
	});
}

function ClearContact()
{
	$(".elementor-social-icon-facebook").slideUp();
	$(".elementor-social-icon-instagram").slideUp();
	$(".elementor-social-icon-whatsapp").slideUp();
	$(".elementor-social-icon-twitter").slideUp();
	$(".elementor-social-icon-pinterest").slideUp();
	$("#mapBranch").slideUp();

	$(".emaiContact").removeClass("errorContat");
	$(".messageContact").removeClass("errorContat");
}

function valContact()
{
	var send = true;
	if( $(".emaiContact").val() == "")
	{
		$(".emaiContact").addClass("errorContat");
		send = false;
	}
	else if( $(".messageContact").val() == "")
	{
		$(".emaiContact").removeClass("errorContat");
		$(".messageContact").addClass("errorContat");
		send = false;
	}
	
	if(send){ 	
		$(".btnSend").click();	
	}
}

function loadSchedulce()
{
	$("#datepickerDate").datepicker({ 				//Calendario para cita
		minDate: "+30d",								//Deshabilita dias anteriores
		beforeShowDay: function(date) {				//Deshabilita solo domingos
			var day = date.getDay();
			return [(day != 0), ''];
		}
	});

	$("#datepicker").datepicker({ 					//Calendario para confeccion
		minDate: 0,									//Deshabilita dias anteriores
		//beforeShowDay: $.datepicker.noWeekends 	//Deshabilita sabados y domingos
		beforeShowDay: function(date) {				//Deshabilita solo domingos
			var day = date.getDay();
			return [(day != 0), ''];
		},
		onSelect: function(dateText) {
			$("#dateFinish").val("");

			var date 	= this.value;
			var month 	= date.split("/")[0];
			var day 	= date.split("/")[1];
			var year 	= date.split("/")[2];

			var daySelected = new Date(year + "-" + month + "-" + day);
			var dayMax = 3;

			daySelected.setDate(daySelected.getDate() + dayMax);
			var formatDayFinish = (daySelected.toISOString().split("T")[0]).split("-")[1] + "/" + (daySelected.toISOString().split("T")[0]).split("-")[2] + "/" + (daySelected.toISOString().split("T")[0]).split("-")[0];

			$("#dateFinish").val(formatDayFinish);
		}
	});
}

function ServiceLenguage(id)
{
	$.post(url + serviceLenguage,{
		idLanguage_menu: id
	},function (data,status) {
		var resp = data;
	});
}


function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
