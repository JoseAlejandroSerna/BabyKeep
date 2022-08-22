var list_schedule = [];

$(document).ready(function () {
	refreshTypeSchedule();
	loadSchedulce();
});

function loadSchedulce()
{
	$(".contPay").slideUp();

	$.each(JSON_schedule, function(j, schedule){
		
		if(!list_schedule.find(o => o.idSchedule === schedule.idSchedule))
			list_schedule.push({
				"idSchedule":schedule.idSchedule,
				"vDateEvent":schedule.vDateEvent,
				"vDateDelivery":schedule.vDateDelivery,
				"idUser":schedule.idUser,
				"idUserAdmin":schedule.idUserAdmin,
				"idBranch":schedule.idBranch,
				"idTypeSchedule":schedule.idTypeSchedule,
				"idHour":schedule.idHour,
				"idProduct":schedule.idProduct,
				"idColor":schedule.idColor,
				"idSize":schedule.idSize,
				"vPrice":schedule.vPrice,
				"vAdvance":schedule.vAdvance,
				"iCheckEvent":schedule.iCheckEvent,
				"iAge":schedule.iAge,
				"vMinPrice":schedule.vMinPrice,
				"vMaxPrice":schedule.vMaxPrice,
				"vDateCreation":schedule.vDateCreation,
				"vImageINE":schedule.vImageINE,
				"vImageProduct":schedule.vImageProduct,
				"vImageAddressProof":schedule.vImageAddressProof,
				"iStatus":schedule.iStatus
			});
	});

	if(JSON_session_vUser != "")
	{
		$("#name").val(JSON_session_vUser);
		$("#phone").val(JSON_session_vPhone);
		$(".messageLogin").slideUp();
		$(".viewShedule").slideDown();
	}
	else{
		$("#name").val("");
		$("#phone").val("");
		$(".messageLogin").slideDown();
		$(".viewShedule").slideUp();
	}

	$("#date_making").datepicker({ 					//Calendario para cita confeccion
		minDate: "+30d",							//Deshabilita proximos 30 dias
		dateFormat: 'dd/mm/yy',
		beforeShowDay: function(date) {				//Deshabilita solo domingos
			var day = date.getDay();
			return [(day != 0), ''];
		},
		onSelect: function(dateText) {				// al seleccionar fecha ir a buscar horarios disponibles
			
			var day 	= dateText.split("/")[0];
			var month 	= dateText.split("/")[1];
			var year 	= dateText.split("/")[2];

			$("#date_making").val(year + "-" + month + "-" + day);

			$(".hdn_date_schedule").val(year + "-" + month + "-" + day);

			viewHour();
		}
	});

	$("#date_sale").datepicker({ 					//Calendario para cita confeccion
		minDate: 0,									//Deshabilita proximos 30 dias
		dateFormat: 'dd/mm/yy',
		beforeShowDay: function(date) {				//Deshabilita solo domingos
			var day = date.getDay();
			return [(day != 0), ''];
		},
		onSelect: function(dateText) {				// al seleccionar fecha ir a buscar horarios disponibles
			
			var day 	= dateText.split("/")[0];
			var month 	= dateText.split("/")[1];
			var year 	= dateText.split("/")[2];

			$("#date_sale").val(year + "-" + month + "-" + day);

			$(".hdn_date_schedule").val(year + "-" + month + "-" + day);

			viewHourSale();
			//////
			var id = $("#idBranch option:selected").val();
			if(id != "0"){	viewProduct_sale();	}
		}
	});

	$("#date_rent").datepicker({ 					//Calendario para renta
		minDate: 0,									//Deshabilita dias anteriores
		dateFormat: 'dd/mm/yy',
		//beforeShowDay: $.datepicker.noWeekends 	//Deshabilita sabados y domingos
		beforeShowDay: function(date) {				//Deshabilita solo domingos
			var day = date.getDay();
			return [(day != 0), ''];
		},
		onSelect: function(dateText) {				// al seleccionar fecha ir a buscar horarios disponibles
			
			var day 	= dateText.split("/")[0];
			var month 	= dateText.split("/")[1];
			var year 	= dateText.split("/")[2];

			var daySelected = new Date(year + "-" + month + "-" + day);
			var dayMax = 3;

			daySelected.setDate(daySelected.getDate() + dayMax);
			var formatDayFinish = (daySelected.toISOString().split("T")[0]).split("-")[2] + "/" + (daySelected.toISOString().split("T")[0]).split("-")[1] + "/" + (daySelected.toISOString().split("T")[0]).split("-")[0];
			
			var dayF 	= formatDayFinish.split("/")[0];
			var monthF 	= formatDayFinish.split("/")[1];
			var yearF 	= formatDayFinish.split("/")[2];
			
			$("#date_rent").val(year + "-" + month + "-" + day);
			$("#dateFin_rent").val(yearF + "-" + monthF + "-" + dayF);
			$(".hdn_dateFin_rent").val(yearF + "-" + monthF + "-" + dayF);

			var d = new Date();
			var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
			$(".hdn_date_schedule").val(strDate);
			//////
			var id = $("#idBranch option:selected").val();
			if(id != "0"){	viewProduct();	}
			
		}
	});

	$(".idTypeSchedule").on('change', function (e) {
		refreshTypeSchedule();
		$(".contPay").slideUp();
		
		if($(".idTypeSchedule").val() == "1"){	$(".contRent").css("display", "flex");		$(".contAddressProof").css("display", "flex");}
		if($(".idTypeSchedule").val() == "2"){	$(".contSale").css("display", "flex");		$(".contAddressProof").css("display", "none");}
		if($(".idTypeSchedule").val() == "3"){	$(".contMaking").css("display", "flex");	$(".contAddressProof").css("display", "flex");}
	});

	$( "#idBranch" ).change(function() {
		refreshByBranch();
	});

	$( "#idProduct_rent" ).change(function() {

		var id = $("#idProduct_rent option:selected").val();

		refreshByColor();
		if(id != "0"){	viewColor();	}
	});


	$( "#idColor_rent" ).change(function() {

		var id = $("#idColor_rent option:selected").val();

		refreshByColor();
		if(id != "0"){	viewSize();	}
	});

	$( "#idSize_rent" ).change(function() {

		var price = $("#idSize_rent option:selected").attr("data-iprice");
		$(".hdn_price_rent").val(price);
		$("#hdnTotal").val(price);

		var advance = parseInt(price)/2;
		$("#vAdvance").val(advance);
		$(".hdn_advance_rent").val(advance);
		$(".total").val("$" + advance);
		
	});
}

function refreshByBranch()
{
	html_product 	= "<option value='0'>"+txtDefaultSelectModel+"</option>";
	html_color 		= "<option value='0'>"+txtDefaultSelectColor+"</option>";
	html_size 		= "<option value='0'>"+txtDefaultSelectSize+"</option>";

	$("#date_rent").val("");
	$("#dateFin_rent").val("");
	$("#idProduct_rent").empty();
	$("#idSize_rent").empty();
	$("#idColor_rent").empty();

	$("#idProduct_rent").append(html_product);
	$("#idSize_rent").append(html_size);
	$("#idColor_rent").append(html_color);

	
	$("#date_sale").val("");
	$("#idProduct_sale").empty();
	$("#idProduct_sale").append(html_product);
}

function refreshByColor()
{
	html_size 	= "<option value='0'>"+txtDefaultSelectSize+"</option>";
	$("#idSize_rent").empty();
	$("#idSize_rent").append(html_size);
}

function refreshSize()
{
	html_size 	= "<option value='0'>"+txtDefaultSelectSize+"</option>";
	$("#size_rent").empty();
	$("#size_rent").append(html_size);
}

function refreshTypeSchedule()
{
	$(".contRent").css("display", "none");
	$(".contSale").css("display", "none");
	$(".contMaking").css("display", "none");

	//Making
	$(".date_making").val("");
	$(".idTypeSchedule_making option[value='0']").prop('selected', true);
	$(".txtColor_making").val("");
	
}

function viewHour()
{
	var idBranch = $("#idBranch option:selected").val();
	var html_hour = "<option value='0'>"+txtDefaultSelectHour+"</option>";
	var listHours_bloqueaded = [];

	$.each(list_schedule, function(k, schedule){
		if(parseInt(schedule.idTypeSchedule) == 3)
		{
			if ($(".hdn_date_schedule").val() == schedule.vDateEvent && schedule.idBranch == idBranch) {

				if(!listHours_bloqueaded.find(o => o.idHour === schedule.idHour))
						listHours_bloqueaded.push({
							"idHour":schedule.idHour
						});	
			}
		}
	});

	$.each(JSON_hour, function(j, hour){
		var valid = true;
		$.each(listHours_bloqueaded, function(j, hour_bloqueaded){
			if(hour_bloqueaded.idHour == hour.idHour){
				valid = false;
			}
		});

		if(valid)
		{
			html_hour += "<option value='"+ hour.idHour +"'>"+ hour.vHour +"</option>";
		}
	});

	$("#idHour_making").empty();
	$("#idHour_making").append(html_hour);
	
}

function viewHourSale()
{
	var idBranch = $("#idBranch option:selected").val();
	var html_hour = "<option value='0'>"+txtDefaultSelectHour+"</option>";
	var valid = true;
	var listHours_bloqueaded = [];

	$.each(list_schedule, function(k, schedule){
		if(parseInt(schedule.idTypeSchedule) == 2 || parseInt(schedule.idTypeSchedule) == 3)
		{
			if ($(".hdn_date_schedule").val() == schedule.vDateEvent && schedule.idBranch == idBranch) {

				if(!listHours_bloqueaded.find(o => o.idHour === schedule.idHour))
						listHours_bloqueaded.push({
							"idHour":schedule.idHour
						});	
			}
		}
	});

	$.each(JSON_hour, function(j, hour){
		$.each(listHours_bloqueaded, function(j, hour_bloqueaded){
			if(hour_bloqueaded.idHour == hour.idHour){
				valid = false;
			}
		});

		if(valid)
		{
			html_hour += "<option value='"+ hour.idHour +"'>"+ hour.vHour +"</option>";
		}
	});

	$("#idHour_sale").empty();
	$("#idHour_sale").append(html_hour);
	
}

function viewProduct_sale()
{
	var idBranch = $("#idBranch option:selected").val();
	var html_product = "<option value='0'>"+txtDefaultSelectModel+"</option>";
	var listproduct_by_branch = [];
	
	$.each(JSON_stock_products, function(j, stock){
		if(stock.idBranch == idBranch)
		{
			$.each(JSON_products, function(k, product){
				if(product.idTypePurchase == 2 && stock.idProduct == product.idProduct)
				{
					if(!listproduct_by_branch.find(o => o.idProduct === product.idProduct))
						listproduct_by_branch.push({
							"idProduct":product.idProduct,
							"vProduct":product.vProduct,
							"vImage":product.vImage,
						});
				}
			});
		}
	});

	$.each(listproduct_by_branch, function(j, product){
		html_product += "<option value='"+ product.idProduct +"' data-image='"+ product.vImage +"'>"+ product.vProduct +"</option>";
	});

	$("#idProduct_sale").empty();
	$("#idProduct_sale").append(html_product);
}

function viewProduct()
{
	var idBranch = $("#idBranch option:selected").val();
	var html_product = "<option value='0'>"+txtDefaultSelectModel+"</option>";
	var listproduct_by_branch = [];
	
	$.each(JSON_stock_products, function(j, stock){
		if(stock.idBranch == idBranch)
		{
			$.each(JSON_products, function(k, product){
				if(product.idTypePurchase == 1 && stock.idProduct == product.idProduct)
				{
					$.each(list_schedule, function(k, schedule){
						if(parseInt(schedule.idTypeSchedule) == 1)
						{
							var dateEvent = dateIsBetweenToDates(schedule.vDateEvent);
							var dateDelivery = dateIsBetweenToDates(schedule.vDateDelivery);

							var dateValid = true;
							var contSchedule = 0;

							$.each(list_schedule, function(k, schedule){
								if(schedule.idTypeSchedule == 1)
								{
									if(schedule.idProduct == stock.idProduct && schedule.idSize == stock.idSize && schedule.idColor == stock.idColor && schedule.idBranch == stock.idBranch)
									{
										if (dateEvent || dateDelivery) {
											contSchedule++;
										}
									}
								}
							});
							if(contSchedule >= parseInt(stock.iStock))
							{
								dateValid = false;
							}

							if(dateValid){

								if(!listproduct_by_branch.find(o => o.idProduct === product.idProduct))
									listproduct_by_branch.push({
										"idProduct":product.idProduct,
										"vProduct":product.vProduct,
										"vImage":product.vImage,
									});
							}
						}
					});
				}
			});
		}
	});

	$.each(listproduct_by_branch, function(j, product){
		html_product += "<option value='"+ product.idProduct +"' data-image='"+ product.vImage +"'>"+ product.vProduct +"</option>";
	});

	$("#idProduct_rent").empty();
	$("#idProduct_rent").append(html_product);
}

function dateIsBetweenToDates(date)
{
	var dateStar = $(".hdn_date_schedule").val();
	var dateEnd = $(".hdn_dateFin_rent").val();

	dateStarYear = dateStar.split("-")[0];
	dateStarMonth = dateStar.split("-")[1];
	dateStarDay = dateStar.split("-")[2];

	dateEndYear = dateEnd.split("-")[0];
	dateEndMonth = dateEnd.split("-")[1];
	dateEndDay = dateEnd.split("-")[2];
	
	dateYear = date.split("-")[0];
	dateMonth = date.split("-")[1];
	dateDay = date.split("-")[2];

	var dateFrom = dateStarMonth + "/" + dateStarDay + "/" + dateStarYear;
	var dateTo = dateEndMonth + "/" + dateEndDay + "/" + dateEndYear;
	var dateCheck = dateMonth + "/" + dateDay + "/" + dateYear;

	var d1 = dateFrom.split("/");
	var d2 = dateTo.split("/");
	var c = dateCheck.split("/");

	var from = new Date(d1[2], parseInt(d1[1])-1, d1[0]);  // -1 because months are from 0 to 11
	var to   = new Date(d2[2], parseInt(d2[1])-1, d2[0]);
	var check = new Date(c[2], parseInt(c[1])-1, c[0]);

	if(check >= from && check <= to)
	{
		return true;
	}
	else{
		return false;
	}
}

function viewSize()
{
	var idProduct 	= $("#idProduct_rent option:selected").val();
	var idBranch 	= $("#idBranch option:selected").val();
	var idColor 	= $("#idColor_rent option:selected").val();
	var html_size = "<option value='0''>"+txtDefaultSelectSize+"</option>";
	
	var listsize_by_color = [];
	
	$.each(JSON_stock_products, function(j, stock){

		if(stock.idBranch == idBranch && stock.idProduct == idProduct && stock.idColor == idColor)
		{
			if(!listsize_by_color.find(o => o.idColor === stock.idColor))
				listsize_by_color.push({
					"idSize":stock.idSize,
					"iPrice":stock.iPrice,
					"vImage":stock.vImage,
					"iStock":stock.iStock
				});
		}
	});

	$.each(listsize_by_color, function(j, list){

		$.each(JSON_size, function(k, size){
			if(size.idSize == list.idSize)
			{
				html_size += "<option value='"+ size.idSize +"' data-iprice='"+list.iPrice+"' data-istock='"+list.iStock+"' data-image='"+list.vImage+"'>"+ size.vSize +"</option>";
			}
		});
	});

	$("#idSize_rent").empty();
	$("#idSize_rent").append(html_size);
}

function viewColor()
{
	var idProduct = $("#idProduct_rent option:selected").val();
	var idBranch = $("#idBranch option:selected").val();
	var html_color = "<option value='0'>"+txtDefaultSelectColor+"</option>";
	
	var listcolor_by_product = [];
	
	$.each(JSON_stock_products, function(j, stock){

		if(stock.idBranch == idBranch && stock.idProduct == idProduct)
		{
			if(!listcolor_by_product.find(o => o.idColor === stock.idColor))
				listcolor_by_product.push({
					"idColor":stock.idColor,
					"vImage":stock.vImage
				});
		}
	});

	$.each(listcolor_by_product, function(j, list){

		$.each(JSON_color, function(k, color){
			if(color.idColor == list.idColor)
			{
				html_color += "<option value='"+ color.idColor +"' data-image='"+list.vImage+"'>"+ color.vColor +"</option>";
			}
		});
	});
	$("#idColor_rent").empty();
	$("#idColor_rent").append(html_color);
}

function cleanClassError()
{
	$("#idBranch").removeClass("errorContat");
	$("#idTypeSchedule").removeClass("errorContat");
	$("#address_proof").removeClass("errorContat");
	$("#check_event").removeClass("errorContat");
}

function cleanClassErrorRent()
{
	$("#date_rent").removeClass("errorContat");
	$("#dateFin_rent").removeClass("errorContat");
	$("#idProduct_rent").removeClass("errorContat");
	$("#idColor_rent").removeClass("errorContat");
	$("#idSize_rent").removeClass("errorContat");
	$("#ine").removeClass("errorContat");
}

function cleanClassErrorMaking()
{
	$("#date_making").removeClass("errorContat");
	$("#idHour_making").removeClass("errorContat");
	$("#idColor_making").removeClass("errorContat");
	$("#idSize_making").removeClass("errorContat");
	$("#age_making").removeClass("errorContat");
	$("#rangeMin_making").removeClass("errorContat");
	$("#rangeMax_making").removeClass("errorContat");
}

function cleanClassErrorSale()
{
	$("#date_sale").removeClass("errorContat");
	$("#idHour_sale").removeClass("errorContat");
}

function valSchedule()
{
	cleanClassError();
	cleanClassErrorMaking();
	cleanClassErrorSale();
	cleanClassErrorRent();

	var send = true;
	var isOK = false;
	var cpValid = false;

	var idTypeSchedule 	= $("#idTypeSchedule option:selected").val();
	var idBranch 		= $("#idBranch option:selected").val();
	
	/////
	$.each(JSON_cp, function(j, cp){
		if(cp.iCP == parseInt(JSON_session_vCP)){	cpValid = true;	}
	});
	/////
	
	if(idBranch == "0")
	{
		$("#idBranch").addClass("errorContat");					send = false;
		$(".messageError").text(varError);
	}
	else if(idTypeSchedule == "0")
	{
		$("#idTypeSchedule").addClass("errorContat");			send = false;
		$(".messageError").text(varError);
	}
	else if(idTypeSchedule == "1")
	{
		isOK = valRent();
	}
	else if(idTypeSchedule == "2")
	{
		isOK = valSale();
	}
	else if(idTypeSchedule == "3")
	{
		isOK = valMaking();
	}
	else if(!$('#check_event').is(":checked"))
	{
		$("#check_event").addClass("errorContat");			send = false;
		$(".messageError").text(varError);
	}

	if(send && isOK && cpValid){ 
		if(idTypeSchedule == "1")
		{
			viewPrice();
			$(".contPay").slideDown();
		}
		else{
			$(".btnSend").click();
		}
	}
}

function valSale()
{
	var isOK = true;
	if($("#date_sale").val() == "")
	{
		$("#date_sale").addClass("errorContat");			isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#idHour_sale option:selected").val() == "0")
	{
		$("#idHour_sale").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#idProduct_sale option:selected").val() == "0")
	{
		$("#idProduct_sale").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}

	return isOK;
}

function valRent()
{
	var isOK = true;
	if($("#date_rent").val() == "")
	{
		$("#date_rent").addClass("errorContat");			isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#dateFin_rent option:selected").val() == "0")
	{
		$("#dateFin_rent").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#idProduct_rent option:selected").val() == "0")
	{
		$("#idProduct_rent").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#idColor_rent option:selected").val() == "0")
	{
		$("#idColor_rent").addClass("errorContat");			isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#idSize_rent option:selected").val() == "0")
	{
		$("#idSize_rent").addClass("errorContat");			isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#ine").val() == "")
	{
		$("#ine").addClass("errorContat");					isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#address_proof").val() == "")
	{
		$("#address_proof").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}

	return isOK;
}

function valMaking()
{
	var isOK = true;
	if($("#date_making").val() == "")
	{
		$("#date_making").addClass("errorContat");			isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#idHour_making option:selected").val() == "0")
	{
		$("#idHour_making").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#idColor_making option:selected").val() == "0")
	{
		$("#idColor_making").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#idSize_making option:selected").val() == "0")
	{
		$("#idSize_making").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#age_making").val() == "")
	{
		$("#age_making").addClass("errorContat");			isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#rangeMin_making").val() == "")
	{
		$("#rangeMin_making").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#rangeMax_making").val() == "")
	{
		$("#rangeMax_making").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if(parseInt($("#rangeMin_making").val()) > parseInt($("#rangeMax_making").val()))
	{
		$("#rangeMin_making").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}
	else if($("#address_proof").val() == "")
	{
		$("#address_proof").addClass("errorContat");		isOK = false;
		$(".messageError").text(varError);
	}

	return isOK;
}
function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
