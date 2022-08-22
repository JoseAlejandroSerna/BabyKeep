var arrProduct = [];
var arrStockProduct = [];
var arrColor = [];
var arrSizeByColor = [];
var arrAllSize = [];
var arrSize = [];
var priceMin = 0;
var priceMax = 0;

var OBJ_Product = [];
var OBJ_Stock = [];
var OBJ_ColorByStock = [];
var OBJ_SizeByColor = [];
var list_Color = [];

var filter_size = [];
var filter_color = [];

var id_typeProduct = [];
var filter_typeProduct = [];

var id_branch = [];
var filter_brach = [];

var pathImageColor = "/assets/images/products/color/";
var pathImage = "/assets/images/products/";

$(document).ready(function () {
	loadCatalog();
	loadFilter();

	eventGeneral();
});

function eventGeneral()
{
	$(".check_size").on('click', function(event){
		var id_size = this.getAttribute("data-id");
		var idCheck = "#size_" + id_size;
		var idProduct ="";
		var id_product_view = [];

		$.each(arrProduct,function(i,product){
			var viewProduct = false;
			idProduct = product.idProduct;

			$.each(product.arrSizeByColor,function(j,sizeByColor){
				$.each(sizeByColor.arrAllSize,function(j,allSize){
					if (id_size == allSize.idSize)
					{
						viewProduct = true;
					}
				});
			});

			if(viewProduct)
			{
				if(!id_product_view.find(o => o.idProduct === product.idProduct))
					id_product_view.push({
						"idProduct":product.idProduct
					});
			}

		});

		$.each(id_product_view,function(j,id){
			var classProduct = ".idProduct_" + id.idProduct;
			if ($(idCheck).is(':checked')) {
				$(classProduct).slideDown();
			}
			else{
				$(classProduct).slideUp();
			}
		});

		
	});

	$(".check_color").on('click', function(event){
		var id_color = this.getAttribute("data-id");
		var idCheck = "#color_" + id_color;
		var idProduct ="";
		var id_product_view = [];

		$.each(arrProduct,function(i,product){
			var viewProduct = false;
			idProduct = product.idProduct;

			$.each(product.arrSizeByColor,function(j,sizeByColor){
				if (id_color == sizeByColor.idColor)
				{
					viewProduct = true;
				}
			});

			if(viewProduct)
			{
				if(!id_product_view.find(o => o.idProduct === product.idProduct))
					id_product_view.push({
						"idProduct":product.idProduct
					});
			}

		});

		$.each(id_product_view,function(j,id){
			var classProduct = ".idProduct_" + id.idProduct;
			if ($(idCheck).is(':checked')) {
				$(classProduct).slideDown();
			}
			else{
				$(classProduct).slideUp();
			}
		});

		
	});

	$(".check_typeProduct").on('click', function(event){
		var id_typeProduct = this.getAttribute("data-id");
		var idCheck = "#typeProduct_" + id_typeProduct;
		var idProduct ="";
		var id_product_view = [];

		$.each(arrProduct,function(i,product){
			var viewProduct = false;
			idProduct = product.idProduct;

			if (id_typeProduct == product.idTypeProduct)
			{
				viewProduct = true;
			}

			if(viewProduct)
			{
				if(!id_product_view.find(o => o.idProduct === product.idProduct))
					id_product_view.push({
						"idProduct":product.idProduct
					});
			}

		});

		$.each(id_product_view,function(j,id){
			var classProduct = ".idProduct_" + id.idProduct;
			if ($(idCheck).is(':checked')) {
				$(classProduct).slideDown();
			}
			else{
				$(classProduct).slideUp();
			}
		});

		
	});

	$(".check_branch").on('click', function(event){
		var id_branch = this.getAttribute("data-id");
		var idCheck = "#branch_" + id_branch;
		var idProduct ="";
		var id_product_view = [];

		$.each(arrProduct,function(i,product){
			var viewProduct = false;
			idProduct = product.idProduct;

			$.each(product.arrSizeByColor,function(j,sizeByColor){
				$.each(sizeByColor.arrAllSize,function(j,allSize){
					if (id_branch == allSize.idBranch)
					{
						viewProduct = true;
					}
				});
			});

			if(viewProduct)
			{
				if(!id_product_view.find(o => o.idProduct === product.idProduct))
					id_product_view.push({
						"idProduct":product.idProduct
					});
			}

		});

		$.each(id_product_view,function(j,id){
			var classProduct = ".idProduct_" + id.idProduct;
			if ($(idCheck).is(':checked')) {
				$(classProduct).slideDown();
			}
			else{
				$(classProduct).slideUp();
			}
		});

		
	});
}

function loadCatalog()
{
	// Crea OBJ Product
	$.each(JSON_products, function(i, product){

		OBJ_ColorByStock = [];
		OBJ_SizeByColor = [];

		$.each(JSON_stock_products,function(j,stock){
			if(product.idProduct == stock.idProduct)
			{


				if(!id_branch.find(o => o.idBranch === stock.idBranch))
					id_branch.push({
						"idBranch":stock.idBranch
					});

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
										"idBranch":stock.idBranch,
										"iStockBySize":stock.iStock,
										"iPriceBySize":stock.iPrice
									});

									
								if (!filter_size.find(o => o.idSize === size.idSize))
								filter_size.push({
									"idColor":stock.idColor,
									"idSize":size.idSize,
									"vSize":size.vSize,
									"idBranch":stock.idBranch,
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
								"vImage":color.vImage
							});

						if(!filter_color.find(o => o.idColor === color.idColor))
							filter_color.push({
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

		if(!id_typeProduct.find(o => o.idTypeProduct === product.idTypeProduct))
			id_typeProduct.push({
				"idTypeProduct":product.idTypeProduct
			});

		OBJ_Product.push( {
			"idProduct":product.idProduct,
			"idTypePurchase":product.idTypePurchase,
			"idTypeProduct":product.idTypeProduct,
			"vProduct":product.vProduct,
			"vDescription":product.vDescription,
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
								"idBranch":stock.idBranch,
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
					"idBranch":stock.idBranch,
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
			"vImage":product.vImage,
			"vProduct":product.vProduct,
			"arrStock":arrStockProduct,
			"arrSizeByColor":arrSizeByColor,
			"iStatus":product.iStatus
		} );

	});
	////
	$.each(id_typeProduct, function(i, typeProduct){

		$.each(JSON_type_products, function(j, val){
			if(typeProduct.idTypeProduct == val.idTypeProduct)
			{
				filter_typeProduct.push( {
					"idTypeProduct":val.idTypeProduct,
					"vTypeProduct":val.vTypeProduct
				});
			}
		});
	});
	////
	$.each(id_branch, function(i, branch){

		$.each(JSON_branch, function(j, val){
			if(branch.idBranch == val.idBranch)
			{
				filter_brach.push( {
					"idBranch":val.idBranch,
					"vBranch":val.vBranch
				});
			}
		});
	});
	////
	$( "#branch-modal" ).change(function() {

		var idBranch = $("#branch-modal option:selected").val();
		var idProduct = $("#branch-modal option:selected").attr("data-idproduct");
		viewColor(idBranch,idProduct);
	});
	$( "#size-modal" ).change(function() {

		var html_select_count = "";
		var istock = $("#size-modal option:selected").attr("data-istock");

		for (var i = 1; i <= parseInt(istock); i++) {
			html_select_count += "<option value='"+i+"'  class='attribute-not-in-stock'>"+i+"</option>";
		}

		$(".price-modal").text("$" + $("#size-modal option:selected").attr("data-iprice"));
		$(".price-modal").attr("data-price",$("#size-modal option:selected").attr("data-iprice"));

		$("#count-modal").empty();
		$("#count-modal").append(html_select_count);

		$('#count-modal option[value=1]').attr('checked',true);
		$('#count-modal option[value=1]').change();

		$(".contCount").css("display","inline-block");
	});

	$( "#count-modal" ).change(function() {
		$(".contButton").css("display","inline-block");
	});

	$("#search_center_filter_toggler" ).click(function() {
		$("#facets_search_center").slideToggle("100");
	});

}

function loadFilter()
{
	//Size
	var html_filter_size = "";
	$.each(filter_size, function(i, size){
		html_filter_size += "<li class='size_"+ size.idSize+"'>"+
								"<label class='facet-label check_size' data-id='"+ size.idSize +"' for='size_"+ size.idSize +"'>"+
									"<span class='custom-checkbox'>"+
										"<input id='size_"+ size.idSize+"' type='checkbox'>"+
										"<span class='ps-shown-by-js'><i class='fa fa-check checkbox-checked' aria-hidden='true'></i></span>"+
									"</span>"+
										+ size.vSize +
								"</label>"+
							"</li>";
	});

	$("#contSize").empty();
	$("#contSize").append(html_filter_size);

	///Color
	var html_filter_color = "";
	$.each(filter_color,function(i,color){
		html_filter_color += "<li class='color_"+ color.idColor+"'>"+
								"<label class='facet-label check_color' data-id='"+ color.idColor +"' for='color_"+ color.idColor +"'>"+
									"<span class='custom-checkbox' data-toggle='tooltip' data-animation='false' data-placement='top' data-boundary='window' data-original-title='"+ color.vColor+"'>"+
										"<input id='color_"+ color.idColor+"' type='checkbox'>"+
										"<span class='color' style='background-color:#"+color.vColorCode+"'></span>"+
									"</span>"+
								"</label>"+
							"</li>";
	});

	$("#contColor").empty();
	$("#contColor").append(html_filter_color);

	///Type product
	var html_filter_typeProduct = "";
	$.each(filter_typeProduct,function(i,typeProduct){
		html_filter_typeProduct += 	"<li class='typeProduct_"+ typeProduct.idTypeProduct +"'>"+
										"<label class='facet-label check_typeProduct' data-id='"+ typeProduct.idTypeProduct +"' for='typeProduct_"+ typeProduct.idTypeProduct +"'>"+
											"<span class='custom-checkbox'>"+
												"<input id='typeProduct_"+ typeProduct.idTypeProduct +"' type='checkbox'>"+
												"<span class='ps-shown-by-js'><i class='fa fa-check checkbox-checked' aria-hidden='true'></i></span>"+
											"</span>"+
												typeProduct.vTypeProduct +
										"</label>"+
									"</li>";
	});

	$("#contTypeProduct").empty();
	$("#contTypeProduct").append(html_filter_typeProduct);

	///Branch
	var html_filter_branch = "";
	$.each(filter_brach,function(i,branch){
		html_filter_branch += 	"<li class='branch_"+ branch.idBranch+"'>"+
									"<label class='facet-label check_branch' data-id='"+ branch.idBranch +"' for='branch_"+ branch.idBranch +"'>"+
										"<span class='custom-checkbox'>"+
											"<input id='branch_"+ branch.idBranch+"' type='checkbox'>"+
											"<span class='ps-shown-by-js'><i class='fa fa-check checkbox-checked' aria-hidden='true'></i></span>"+
										"</span>"+
											branch.vBranch +
									"</label>"+
								"</li>";
	});

	$("#contBranch").empty();
	$("#contBranch").append(html_filter_branch);
}

function buttonView(e)
{
	var classButtonEye = ".classEye-" + e.getAttribute("data-idproduct");
	$(classButtonEye).click();
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

		viewSize(idProduct,idColor,idBranch);
	});
	  
}

function rangePrices(price,cont){
	if(cont == 1) {	priceMin = price;	}
	if(price > priceMax) {	priceMax = price;	}
	if(price < priceMin) {	priceMin = price;	}
}

function openDetail(e){
	$("#btn-detail-modal").click();

	infoModal(e.getAttribute("data-id"));
	viewBranch(e.getAttribute("data-id"));
}

function productDetail(e){
	$(".hdn-idProduct").val(e.getAttribute("data-id"));
	$(".btnProductDetail").click();
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
function infoModal(id)
{
	var html_li = "";
	var html_select_size = "";
	var imageStock = "";
	var idStock = "";
	var iStock = "";
	var idProduct = "";
	var list_idBranch = [];
	var listBranch = [];

	$.each(arrProduct,function(i,product){
		if(product.idProduct == id)
		{
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


		}
	});

	$("#color").empty();
	$("#color").append(html_li);


	// Check color
	loadEventsModal();
	$('input:radio[data-idstock='+idStock+']').attr('checked',true);
	$('input:radio[name=color-modal][data-idstock='+idStock+']').prop("checked", true);
	$('input:radio[name=color-modal]').click();
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
		if(product.idProduct == idProduct)
		{
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
		}
	});

	$("#size-modal").empty();
	$("#size-modal").append(html_select_size);

	$('#size-modal option[value='+fistSize+']').attr('checked',true);
	$('#size-modal option[value='+fistSize+']').change();

	$(".price-modal").text("$" + $("#size-modal option:selected").attr("data-iprice"));
	$(".price-modal").attr("data-price",$("#size-modal option:selected").attr("data-iprice"));

	$("#quantity_wanted").attr("max",5);
}
function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
