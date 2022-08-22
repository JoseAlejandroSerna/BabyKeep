
var JSON_Cart_Temp = [];
var JSON_Cart_Update = [];
var OBJ_Product = [];
var total_cart = 0;
var total_sale = 0;
var contProduct = 0;

$(document).ready(function () {
	addToCart();
});

function addProduct()
{
	var cont = 0;

	var idProduct = 0;
	var idSize = 0;
	var idColor = 0;
	var iPrice = 0;
	var iPieces = 0;
	var vColor = "";
	var vDescription = "";
	var vUrl = "";
	var newProduct = true;

	$.each(JSON_Cart, function(i, cart){
		cont++;
	});

	if(cont > 0)
	{
		JSON_Cart_Temp = [];
		JSON_Cart_Update = [];

		$.each(JSON_Cart, function(i, cart){


			//update product
			if(	cart.idProduct == parseInt($(".img-modal").attr("data-idproduct")) && 
				cart.idSize == parseInt($("#size-modal option:selected").val()) &&
				cart.idColor == parseInt($('input[name=color-modal]:checked').val()) &&
				cart.idBranch == parseInt($("#branch-modal option:selected").val()))
			{
				idBranch = parseInt($("#branch-modal option:selected").val());
				vBranch = $("#branch-modal option:selected").text();
				idProduct = parseInt($(".img-modal").attr("data-idproduct"));
				idSize = parseInt($("#size-modal option:selected").val());
				idColor = parseInt($('input[name=color-modal]:checked').val());
				vColor = $('input[name=color-modal]:checked').attr("data-vcolor");
				iPrice = parseInt($(".price-modal").attr("data-price"));
				iPieces = parseInt($("#count-modal option:selected").val()),
				vDescription = $(".name-modal").text();
				vUrl = $(".img-modal").attr("src");
				
				newProduct = false;

				JSON_Cart_Temp.push({
					"idBranch": idBranch,
					"vBranch": vBranch,
					"idProduct": idProduct,
					"idSize": idSize,
					"idColor": idColor,
					"vColor":vColor,
					"iPrice": iPrice,
					"iPieces":iPieces,
					"vDescription": vDescription,
					"vUrl": vUrl
				});
			}
			else{
				JSON_Cart_Temp.push({
					"idBranch": cart.idBranch,
					"vBranch": cart.vBranch,
					"idProduct":cart.idProduct,
					"idSize": cart.idSize,
					"idColor":cart.idColor,
					"vColor" :cart.vColor,
					"iPrice": cart.iPrice,
					"iPieces":cart.iPieces,
					"vDescription":cart.vDescription,
					"vUrl":cart.vUrl
				});
			}
		});

		JSON_Cart = [];
		JSON_Cart = JSON_Cart_Temp;

		if(newProduct)
		{
			JSON_Cart.push({
				"idBranch":parseInt($("#branch-modal option:selected").val()),
				"vBranch" : $("#branch-modal option:selected").text(),
				"idProduct":parseInt($(".img-modal").attr("data-idproduct")),
				"idSize": parseInt($("#size-modal option:selected").val()),
				"idColor":parseInt($('input[name=color-modal]:checked').val()),
				"vColor" : $('input[name=color-modal]:checked').attr("data-vcolor"),
				"iPrice": parseInt($(".price-modal").attr("data-price")),
				"iPieces":parseInt($("#count-modal option:selected").val()),
				"vDescription":$(".name-modal").text(),
				"vUrl":$(".img-modal").attr("src")
			});
		}
	}
	else{
		JSON_Cart.push({
			"idBranch":parseInt($("#branch-modal option:selected").val()),
			"vBranch" : $("#branch-modal option:selected").text(),
			"idProduct":parseInt($(".img-modal").attr("data-idproduct")),
			"idSize": parseInt($("#size-modal option:selected").val()),
			"idColor":parseInt($('input[name=color-modal]:checked').val()),
			"vColor" : $('input[name=color-modal]:checked').attr("data-vcolor"),
			"iPrice": parseInt($(".price-modal").attr("data-price")),
			"iPieces":parseInt($("#count-modal option:selected").val()),
			"vDescription":$(".name-modal").text(),
			"vUrl":$(".img-modal").attr("src")
		});
	}

	addToCart();

	$(".cart_products").val(JSON.stringify(JSON_Cart));
	$(".btn_cart_products").click();
}

function addToCart()
{
	total_cart = 0;
	var total_product = 0;
	var html_products = "";
	var cont = 0;

	$(".cart-products").empty();

	$.each(JSON_Cart, function(i,cart){
		total_product = cart.iPrice*cart.iPieces; 
		total_cart += total_product;
		contProduct++;

		html_products += "<li>"+
							"<div class='row no-gutters align-items-center'>"+
								"<div class='col-3'>"+ 
									"<span class='product-image media-middle'>"+
										"<a href='#'>"+
											"<img src='"+ cart.vUrl+"' alt='"+ cart.vDescription+"' class='img-fluid' loading='lazy'>"+
										"</a>"+
									"</span>"+ 
								"</div>"+
								"<div class='col col-info'>"+
									"<button type='button' class='close' onclick='deleteProductCart("+ cart.idProduct+","+cart.idSize+","+cart.idColor+");'> <span>×</span> </button>"+
									"<div class='pb-1'>"+
										"<a href='#'>"+ cart.vDescription+"</a>"+ 
									"</div>"+
									"<div class='product-attributes text-muted pb-1'>"+
										"<div class='product-line-info'>"+
											"<span class='label'>"+strBranch+":</span>"+
											"<span class='value'>"+cart.vBranch+"</span>"+
										"</div>"+
										"<div class='product-line-info'>"+
											"<span class='label'>"+strSize+":</span>"+
											"<span class='value'>"+cart.idSize+"</span>"+
										"</div>"+
										"<div class='product-line-info'>"+ 
											"<span class='label'>"+strColor+":</span>"+ 
											"<span class='value'>"+cart.vColor+"</span>"+
										"</div>"+
										"<div class='product-line-info'>"+ 
											"<span class='label'>"+strPieces+":</span>"+ 
											"<span class='value'>"+cart.iPieces+"</span>"+
										"</div>"+
										"<div class='product-line-info'>"+ 
											"<span class='label'>Total:</span>"+ 
											"<span class='value'>"+total_product+"</span>"+
										"</div>"+
									"</div>"+
								"</div>"+
							"</div>"+
						"</li>";
	});

	var commission = (total_cart*commission_percentage)/100;
	total_sale = total_cart + commission + sending;

	$(".cart-products").append(html_products);
	$(".cart-products-count-btn").text(contProduct);

	$(".subtotal-product").text("$" + total_cart);
	$(".iva-product").text("$" + commission);
	$(".total-product").text("$" + total_sale);
	$(".sending-product").text("$" + sending);
	
	$(".hdn_iCommission").val(commission);
	$(".hdn_iSending").val(sending);
	$(".hdn_iSubtotal").val(total_cart);
	$(".hdn_iTotal").val(total_sale);
	$(".hdn_vDateCreation").val(vDateCreation);
	$(".hdn_idTypePayment").val(idTypePayment);
	$(".hdn_idUser").val(session_idUser);
	$(".hdn_idAdmin").val("0");

	if(contProduct > 0)
	{
		$(".cart-subtotals").slideDown();
		$(".cart-totals").slideDown();
		$(".cart-buttons").slideDown();
		$(".messaje-login").slideUp();
	}
	else{
		$(".cart-subtotals").slideUp();
		$(".cart-totals").slideUp();
		$(".cart-buttons").slideUp();
		$(".messaje-login").slideDown();
	}

	if(JSON_session_idUser != "0")
	{
		$(".cart-subtotals").slideDown();
		$(".cart-totals").slideDown();
		$(".cart-buttons").slideDown();
		$(".messaje-login").slideUp();
	}
	else{
		$(".cart-subtotals").slideUp();
		$(".cart-totals").slideUp();
		$(".cart-buttons").slideUp();
		$(".messaje-login").slideDown();
	}
}

function deleteProductCart(idProduct,idSize,idColor)
{
	JSON_Cart_Temp = [];
	JSON_Cart_Update = [];

	$.each(JSON_Cart, function(i, cart){

		if(	cart.idProduct != idProduct && cart.idSize != idSize)
		{
			JSON_Cart_Temp.push({
				"idBranch": cart.idBranch,
				"vBranch": cart.vBranch,
				"idProduct":cart.idProduct,
				"idSize": cart.idSize,
				"idColor":cart.idColor,
				"vColor" :cart.vColor,
				"iPrice": cart.iPrice,
				"iPieces":cart.iPieces,
				"vDescription":cart.vDescription,
				"vUrl":cart.vUrl
			});
		}
	});

	JSON_Cart = [];
	JSON_Cart = JSON_Cart_Temp;

	addToCart();

	$(".cart_products").val(JSON.stringify(JSON_Cart));
	$(".btn_cart_products").click();

}

function valCart()
{
	$(".hdn_cart").val(JSON.stringify(JSON_Cart));
	$(".btn_pay").click();
}
function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
