var arrProduct = [];
var arrStockProduct = [];
var arrColor = [];
var arrSizeByColor = [];
var arrAllSize = [];
var arrSize = [];
var priceMin = 0;
var priceMax = 0;
var cpValid = false;
var OBJ_Product = [];
var OBJ_Stock = [];
var OBJ_ColorByStock = [];
var OBJ_SizeByColor = [];
var list_Color = [];
var list_schedule = [];

var pathImageColor = "/assets/images/products/color/";
var pathImage = "/assets/images/products/";

$(document).ready(function () {
	loadCatalog();
});

function loadCatalog()
{
	// Crea OBJ Product
	$.each(JSON_products, function(i, product){

		OBJ_ColorByStock = [];
		OBJ_SizeByColor = [];

		$.each(JSON_stock_products,function(j,stock){
			if(product.idProduct == stock.idProduct)
			{

				$.each(JSON_color,function(k,color){
					if(color.idColor == stock.idColor)
					{
						$.each(JSON_size,function(l,size){
							if(size.idSize == stock.idSize)
							{	
								if (!OBJ_SizeByColor.find(o => o.idSize === size.idSize))
									OBJ_SizeByColor.push({
										"idColor":stock.idColor,
										"idSize":size.idSize,
										"vSize":size.vSize,
										"iStockBySize":stock.iStock,
										"iPriceBySize":stock.iPrice
									});
							}
						});

						if(!OBJ_ColorByStock.find(o => o.idColor === color.idColor))
							OBJ_ColorByStock.push({
								"idColor":color.idColor,
								"vColor":color.vColor,
								"vColorCode":color.vColorCode,
								"vImage":color.vImage,
								"vImageStock":stock.vImage
							});
						
					}
				});
			}
		});

		OBJ_Product.push( {
			"idProduct":product.idProduct,
			"idTypePurchase":product.idTypePurchase,
			"idTypeProduct":product.idTypeProduct,
			"vProduct":product.vProduct,
			"vDescription":product.vDescription,
			"vDescriptionDetail":product.vDescriptionDetail,
			"vImage":product.vImage,
			"vClave":product.vClave,
			"iStatus":product.iStatus,
			"OBJ_ColorByStock":OBJ_ColorByStock,
			"OBJ_SizeByColor":OBJ_SizeByColor
		} );

	});
	// Crea JSON Product
	$.each(JSON_products, function(i, product){
			
		arrStockProduct = [];
		arrSizeByColor = [];
		arrAllSize = [];

		$.each(JSON_stock_products,function(j,stock){
			if(product.idProduct == stock.idProduct)
			{

				arrColor = [];
				arrSize = [];

				$.each(JSON_size,function(l,size){
					if(size.idSize == stock.idSize)
					{
						arrSize.push( {
							"idSize":size.idSize,
							"vSize":size.vSize
						} );
						
						if (!arrAllSize.find(o => o.idSize === size.idSize))
							arrAllSize.push({
								"idSize":size.idSize,
								"vSize":size.vSize,
								"iStockBySize":stock.iStock,
								"iPriceBySize":stock.iPrice
							});
					}
				});
				
				$.each(JSON_color,function(k,color){
					if(color.idColor == stock.idColor)
					{
						arrColor.push({
							"idColor":color.idColor,
							"vColor":color.vColor,
							"vColorCode":color.vColorCode,
							"vImage":color.vImage,
							"vImageStock":stock.vImage
						});

						if (!arrSizeByColor.find(o => o.idColor === color.idColor))
							arrSizeByColor.push({
								"idColor":color.idColor,
								"vColor":color.vColor,
								"vColorCode":color.vColorCode,
								"vImage":color.vImage,
								"vImageStock":stock.vImage,
								"arrAllSize":arrAllSize
							});
					}
				});

				var cont = 1;

				if(stock.iPrice != "")
				{
					rangePrices(parseInt(stock.iPrice),cont);
				}

				arrStockProduct.push( {
					"iPrice":stock.iPrice,
					"iStock":stock.iStock,
					"arrColor":arrColor,
					"idProduct":stock.idProduct,
					"arrSize":arrSize,
					"idStockProduct":stock.idStockProduct,
					"vImage":stock.vImage,
					"iStatus":stock.iStatus
				} );

				cont++;

			}
		});

		arrProduct.push( {
			"idProduct":product.idProduct,
			"idTypeProduct":product.idTypeProduct,
			"idTypePurchase":product.idTypePurchase,
			"vClave":product.vClave,
			"vDescription":product.vDescription,
			"vDescriptionDetail":product.vDescriptionDetail,
			"vImage":product.vImage,
			"vProduct":product.vProduct,
			"arrStock":arrStockProduct,
			"arrSizeByColor":arrSizeByColor,
			"iStatus":product.iStatus
		} );

	});

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
	//////////////////////
	$( "#branch-modal" ).change(function() {

		var idBranch = $("#branch-modal option:selected").val();
		var idProduct = $("#branch-modal option:selected").attr("data-idproduct");
		viewColor(idBranch,idProduct);
	});

	$( "#size-modal" ).change(function() {
		var price = $("#size-modal option:selected").attr("data-iprice");

		$(".hdn_price").val(price);
		$("#hdnTotal").val(price);
		$(".price-modal").text("$" + price);
		$(".price-modal").attr("data-price",price);

		var advance = parseInt(price)/2;
		$("#vAdvance").val(advance);
		$(".hdn_advance").val(advance);
		//$(".total").val("$" + advance);

		$(".contDate").css("display","inline-block");
	});

	$( "#count-modal" ).change(function() {
		$(".contButton").css("display","inline-block");
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
			$(".hdn_dateFin").val(yearF + "-" + monthF + "-" + dayF);

			var d = new Date();
			var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
			$(".hdn_date").val(strDate);

			var valDate = validDate();

			if(valDate)
			{
				$(".messageError").text("");
				$(".contSchedule").css("display","inline-block");
			}
			else{
				$(".messageError").text(varErrorNotAvailable);
				$(".contSchedule").css("display","none");
			}
		}
	});
	
	$.each(JSON_cp, function(j, cp){
		if(cp.iCP == parseInt(JSON_session_vCP)){	cpValid = true;	}
	});
	
	$(".contPay").slideUp();

	if(JSON_session_vUser != "")
	{
		$(".messageLogin").slideUp();
		$(".messageErrorCp").slideUp();
		$(".viewShedule").slideDown();
	}
	else if(!cpValid)
	{
		$(".messageLogin").slideUp();
		$(".messageErrorCp").slideDown();
		$(".viewShedule").slideUp();
	}
	else{
		$(".messageLogin").slideDown();
		$(".messageErrorCp").slideUp();
		$(".viewShedule").slideUp();
	}

	var idProduct = "";
	$.each(JSON_products,function(i,product){
		idProduct = product.idProduct;
	});
	viewBranch(idProduct);
}

function viewBranch(idProduct)
{

	$(".contModal").css("display","none");

	var html_select_branch = "";
	var list_idBranch = [];
	var listBranch = [];
	var cont = 1;
	var val = "";

	$.each(JSON_products,function(i,product){
		if(product.idProduct == idProduct)
		{
			$(".img-modal").attr("src",pathImage + product.vImage);
			$(".img-modal").attr("data-idproduct",idProduct);
		}
	});

	$.each(arrProduct,function(i,product){
		if(product.idProduct == idProduct)
		{
			$(".name-modal").text(product.vProduct);
			$(".description-modal").text(product.vDescription);

			$.each(JSON_stock_products, function(j, stock){

				if(stock.idProduct == idProduct)
				{
					if(!list_idBranch.find(o => o.idBranch === stock.idBranch))
					list_idBranch.push({
							"idBranch":stock.idBranch
						});
				}
			});
			$.each(list_idBranch, function(j, idBranch){

				$.each(JSON_branch, function(j, branch){

					if(branch.idBranch == idBranch.idBranch)
					{
						if(!listBranch.find(o => o.idBranch === branch.idBranch))
							listBranch.push({
								"idBranch":branch.idBranch,
								"vBranch":branch.vBranch
							});
					}
				});
			});
			$.each(listBranch,function(j,branch){

				if(cont == 1){ val = branch.idBranch;}

				html_select_branch += "<option value='"+branch.idBranch+"' data-idproduct='"+idProduct+"' class='attribute-not-in-stock'>"+branch.vBranch+"</option>";
				cont++;
			});
		}
	});

	$("#branch-modal").empty();
	$("#branch-modal").append(html_select_branch);

	$("#branch-modal option[value='"+val+"']").attr('checked',true);
	$("#branch-modal option[value='"+val+"']").change();
	$("#branch-modal option[value='"+val+"']").prop('selected', true);

}

function viewColor(idBranch,idProduct)
{
	$(".contColor").css("display","inline-block");
	$(".contSize").css("display","none");
	$(".contCount").css("display","none");
	$(".contButton").css("display","none");
	
	var html_li = "";
	var list_idColor = [];
	var listColor = [];

	
	$.each(JSON_stock_products, function(j, stock){

		if(stock.idProduct == idProduct && stock.idBranch == idBranch)
		{
			if(!list_idColor.find(o => o.idColor === stock.idColor))
				list_idColor.push({
					"idColor":stock.idColor,
					"vImage":stock.vImage
				});
		}
	});
	$.each(list_idColor, function(j, idColor){

		$.each(JSON_color, function(j, color){

			if(idColor.idColor == color.idColor)
			{
				if(!listColor.find(o => o.idColor === color.idColor))
					listColor.push({
						"idColor":color.idColor,
						"vColor":color.vColor,
						"vColorCode":color.vColorCode,
						"vImage":idColor.vImage
					});
			}
		});
	});

	$.each(listColor,function(j,color){

		html_li += "<li class='float-left input-container attribute-not-in-stock' data-toggle='tooltip' data-animation='false' data-placement='top' data-container='.product-variants' title='"+color.vColor+"'>" +
						"<input class='input-color' type='radio' name='color-modal' data-idbranch='"+idBranch+"' data-vimagestock='"+color.vImage+"' data-vcolor='"+color.vColor+"' data-idproduct='"+idProduct+"' data-idcolor='"+color.idColor+"' value='"+color.idColor+"'>"+
						"<span class='color' style='background-color: #"+color.vColorCode+"'>"+
							"<span class='attribute-name sr-only'>"+color.vColor+"</span>"+
						"</span>"+
					"</li>";
	});


	$("#color").empty();
	$("#color").append(html_li);

	loadEventsModal();

}

function infoProduct()
{
	var html_li = "";
	var html_select_size = "";
	var imageStock = "";
	var idStock = "";
	var iStock = "";
	var idProduct = "";

	$.each(arrProduct,function(i,product){
		$(".name-modal").text(product.vProduct);
		$(".description-modal").text(product.vDescription);

		$.each(product.arrSizeByColor,function(j,color){

				html_li += "<li class='float-left input-container attribute-not-in-stock' data-toggle='tooltip' data-animation='false' data-placement='top' data-container='.product-variants' title='"+color.vColor+"'>" +
								"<input class='input-color' type='radio' name='color-modal' data-vimagestock='"+color.vImageStock+"' data-vcolor='"+color.vColor+"' data-idproduct='"+product.idProduct+"' data-idcolor='"+color.idColor+"' value='"+color.idColor+"'>"+
								"<span class='color' style='background-color: #"+color.vColorCode+"'>"+
									"<span class='attribute-name sr-only'>"+color.vColor+"</span>"+
								"</span>"+
							"</li>";
		});
		

		/// Calcula precio mas bajo y ID de stock mas bajo para pre seleccionar 
		var valTemp = 0;
		var cont = 1;
		$.each(product.arrStock,function(j,stock){

			if(cont == 1){
				idProduct = stock.idProduct;
				idStock = stock.idStockProduct
				valTemp = parseInt(stock.iPrice);
				imageStock = stock.vImage;
				iStock = stock.iStock;
			}

			if(parseInt(stock.iPrice) < valTemp)
			{
				idProduct = stock.idProduct;
				idStock = stock.idStockProduct
				valTemp = parseInt(stock.iPrice);
				imageStock = stock.vImage;
				iStock = stock.iStock;
			}
			cont++;
		});
		$.each(product.arrStock,function(j,stock){

			if(stock.idStockProduct == idStock){
				$.each(stock.arrSize,function(k,size){
					html_select_size += "<option value='"+size.idSize+"' title='"+size.vSize+"' class='attribute-not-in-stock'>"+size.vSize+"</option>";
				});
			}
		});

		$(".price-modal").text("$" + valTemp);
		$(".price-modal").attr("data-price",valTemp);

		$(".descriptionDetail-modal").text(product.vDescriptionDetail);
	});

	$("#color").empty();
	$("#color").append(html_li);

	var urlImagen = pathImageColor + imageStock;
	$(".img-modal").attr("src",urlImagen);
	$(".img-modal").attr("data-idproduct",idProduct);

	// Check color
	loadEventsModal();
	$('input:radio[data-idstock='+idStock+']').attr('checked',true);
	$('input:radio[name=color-modal][data-idstock='+idStock+']').prop("checked", true);
	$('input:radio[name=color-modal]').click();
}

function loadEventsModal()
{
	// Change input radio color
	$("input[type=radio][name=color-modal]").change(function() {
		var idProduct = $('input:radio[name=color-modal]:checked').attr("data-idproduct");
		var idColor = $('input:radio[name=color-modal]:checked').attr("data-idcolor");
		var idBranch = $('input:radio[name=color-modal]:checked').attr("data-idbranch");
		var vImageStock = $('input:radio[name=color-modal]:checked').attr("data-vimagestock");
		
		var urlImagen = pathImageColor + vImageStock;
		$(".img-modal").attr("src",urlImagen);
		$(".hdn_idColor").val(idColor);

		viewSize(idProduct,idColor,idBranch);
	});
	  
}

function rangePrices(price,cont){
	if(cont == 1) {	priceMin = price;	}
	if(price > priceMax) {	priceMax = price;	}
	if(price < priceMin) {	priceMin = price;	}
}

function viewSize(idProduct,idColor,idBranch)
{	
	var html_select_size = "";
	var list_idSize = [];
	var listSize = [];

	var fistSize = "";
	var count = 1;
	
	$.each(JSON_stock_products, function(j, stock){

		if(stock.idProduct == idProduct && stock.idBranch == idBranch && stock.idColor == idColor)
		{
			if(!list_idSize.find(o => o.idSize === stock.idSize))
				list_idSize.push({
					"idSize":stock.idSize,
					"iStock":stock.iStock,
					"iPrice":stock.iPrice
				});
		}
	});
	$.each(list_idSize, function(j, idSize){

		$.each(JSON_size, function(j, size){

			if(idSize.idSize == size.idSize)
			{
				if(!listSize.find(o => o.idSize === size.idSize))
					listSize.push({
						"idSize":size.idSize,
						"vSize":size.vSize,
						"iStock":idSize.iStock,
						"iPrice":idSize.iPrice
					});
			}
		});
	});
	
	$.each(listSize,function(j,size){

		if(count == 1){ fistSize = size.idSize;}
		html_select_size += "<option value='"+size.idSize+"' data-istock='"+size.iStock+"' data-iprice='"+size.iPrice+"' title='"+size.vSize+"' class='attribute-not-in-stock'>"+size.vSize+"</option>";
		count++;
	});



	$("#size-modal").empty();
	$("#size-modal").append(html_select_size);

	$('#size-modal option[value='+fistSize+']').attr('checked',true);
	$('#size-modal option[value='+fistSize+']').change();

	$(".price-modal").text("$" + $("#size-modal option:selected").attr("data-iprice"));
	$(".price-modal").attr("data-price",$("#size-modal option:selected").attr("data-iprice"));

	$(".contSize").css("display","inline-block");
}

function selectColor(idProduct)
{	
	var html_select_size = "";
	var arrSizeByStock = [];
	var fistSize = "";
	var count = 1;

	$.each(arrProduct,function(i,product){
		$.each(product.arrSizeByColor,function(j,sizeByColor){
			$.each(sizeByColor.arrAllSize,function(j,allSize){
				if (!arrSizeByStock.find(o => o.idSize === allSize.idSize))
				{
					arrSizeByStock.push({
						"idSize":allSize.idSize,
						"vSize":allSize.vSize
					});

					html_select_size += "<option value='"+allSize.idSize+"' data-istock='"+allSize.iStockBySize+"' data-iprice='"+size.iPriceBySize+"' title='"+allSize.vSize+"' class='attribute-not-in-stock'>"+allSize.vSize+"</option>";

					if(count == 1)
					{
						fistSize = allSize.idSize;
					}
					count++;
				}
			});
		});
	});

	$("#size-modal").empty();
	$("#size-modal").append(html_select_size);

	$('#size-modal option[value='+fistSize+']').attr('checked',true);
	$('#size-modal option[value='+fistSize+']').change();

	$(".price-modal").text("$" + $("#size-modal option:selected").attr("data-iprice"));
	$(".price-modal").attr("data-price",$("#size-modal option:selected").attr("data-iprice"));

	$("#quantity_wanted").attr("max",5);
}

function validDate()
{
	var idBranch = $("#branch-modal option:selected").val();
	var idProduct = $('input:radio[name=color-modal]:checked').attr("data-idproduct");
	var idColor = $('input:radio[name=color-modal]:checked').attr("data-idcolor");
	var idSize = $("#size-modal option:selected").val();

	var dateValid = true;
	
	$.each(list_schedule, function(k, schedule){

		if(idBranch == schedule.idBranch && idProduct == schedule.idProduct && idColor == schedule.idColor && idSize == schedule.idSize)
		{
			var dateEvent = dateIsBetweenToDates(schedule.vDateEvent);
			var dateDelivery = dateIsBetweenToDates(schedule.vDateDelivery);

			if(dateEvent || dateDelivery)
			{
				dateValid = false;
			}
		}
	});

	return dateValid;
}

function dateIsBetweenToDates(date)
{
	var dateStar = $(".hdn_date").val();
	var dateEnd = $(".hdn_dateFin").val();

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

function cleanClassError()
{
	$("#branch-modal").removeClass("errorContat");
	$("#idTypeSchedule").removeClass("errorContat");
	$("#address_proof").removeClass("errorContat");
	$("#check_event").removeClass("errorContat");
}

function valSchedule()
{
	cleanClassError();

	var send = true;
	var isOK = false;

	var idBranch 		= $("#branch-modal option:selected").val();
	
	if(idBranch == "0")
	{
		$("#branch-modal").addClass("errorContat");					send = false;
		$(".messageError").text(varError);
	}
	else if($("#size-modal option:selected").val() == "0")
	{
		$("#size-modal").addClass("errorContat");					send = false;
		$(".messageError").text(varError);
	}
	else if($("#date_rent").val() == "")
	{
		$("#date_rent").addClass("errorContat");					send = false;
		$(".messageError").text(varError);
	}
	else if($("#dateFin_rent option:selected").val() == "0")
	{
		$("#dateFin_rent").addClass("errorContat");					send = false;
		$(".messageError").text(varError);
	}
	else if($("#ine").val() == "")
	{
		$("#ine").addClass("errorContat");							send = false;
		$(".messageError").text(varError);
	}
	else if($("#address_proof").val() == "")
	{
		$("#address_proof").addClass("errorContat");				send = false;
		$(".messageError").text(varError);
	}

	if(send){ 
		viewPrice();
		$(".contPay").slideDown();
	}
}

function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
