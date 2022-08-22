<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

		<script>
			var info_admin_product = '<?php echo json_encode($info_admin_product); ?>';
			var info_admin_stock_product = '<?php echo json_encode($info_admin_stock_product); ?>';
			var info_admin_branch = '<?php echo json_encode($info_admin_branch); ?>';
			var info_admin_type_product = '<?php echo json_encode($info_admin_type_product); ?>';
			var info_admin_type_purchase = '<?php echo json_encode($info_admin_type_purchase); ?>';
			var info_admin_color = '<?php echo json_encode($info_admin_color); ?>';
			var info_admin_size = '<?php echo json_encode($info_admin_size); ?>';

			var JSON_products = JSON.parse(info_admin_product);
			var JSON_stock_products = JSON.parse(info_admin_stock_product);
			var JSON_branch = JSON.parse(info_admin_branch);
			var JSON_type_products = JSON.parse(info_admin_type_product);
			var JSON_type_purchase = JSON.parse(info_admin_type_purchase);
			var JSON_color = JSON.parse(info_admin_color);
			var JSON_size = JSON.parse(info_admin_size);

			var all_user = '<?php echo json_encode($all_user); ?>';
    		var JSON_all_user = JSON.parse(all_user);

			var info_promotion = '<?php echo json_encode($info_promotion); ?>';
    		var JSON_promotion = JSON.parse(info_promotion);

			var info_card = '<?php echo json_encode($info_card); ?>';
    		var JSON_card = JSON.parse(info_card);
			
			var info_kidByCard = '<?php echo json_encode($info_kidByCard); ?>';
    		var JSON_kidByCard = JSON.parse(info_kidByCard);
			
			var idAdmin = '<?php echo $_SESSION['idUser'] ?>';
			// Send
			var strComission = '<?php echo $_SESSION['vCommission'] ?>';
			var strSending = '<?php echo $_SESSION['vSending'] ?>';

			var commission = 0;
			var commission_percentage = parseFloat(strComission);
			var sending = parseFloat(strSending);
		</script>
		
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Venta</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url("AdminSale","pay"); ?>" style="display:none;">

						<input type="hidden" class="hdn_idUser" 		name="hdn_idUser" value=""/>
						<input type="hidden" class="hdn_idAdmin" 		name="hdn_idAdmin" value=""/>
						<input type="hidden" class="hdn_iCommission" 	name="hdn_iCommission" value=""/>
						<input type="hidden" class="hdn_iSending" 		name="hdn_iSending" value=""/>
						<input type="hidden" class="hdn_iSubtotal" 		name="hdn_iSubtotal" value=""/>
						<input type="hidden" class="hdn_iTotal" 		name="hdn_iTotal" value=""/>
						<input type="hidden" class="hdn_vDateCreation" 	name="hdn_vDateCreation" value="<?php echo date('Y-m-d');?>"/>
						<input type="hidden" class="hdn_iStatus" 		name="hdn_iStatus" value="1"/>
						<input type="hidden" class="hdn_idTypePayment" 	name="hdn_idTypePayment" value=""/>


						<input type="hidden" class="hdn_idCard" 		name="hdn_idCard" value="0"/>
						<input type="hidden" class="hdn_idKidByCard" 	name="hdn_idKidByCard" value="0"/>
						<input type="hidden" class="hdn_iCountPurchase" name="hdn_iCountPurchase" value="0"/>
						<input type="hidden" class="hdn_iTotalPurchase" name="hdn_iTotalPurchase" value="0"/>
						<input type="hidden" class="hdn_idPromotion" 	name="hdn_idPromotion" value="0"/>
						
						<input type="hidden" class="hdn_strCart" name="hdn_strCart" value=""/>
						
						<button type="submit" class="btn-link btn_pay" name="btn_pay" style="display:none;">Cart</button>
					</form>
                    <div class="container-fluid mt-n10 ">
                    	<div class="svgStyle toppadding50 bottompadding50">
                        	<div class="row margin-bottom">
                            	<div class="col-xl-12">

                                	<div class="row">
                                    	<div class=" col-sm-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                    		<div class="card shadow margin-bottom">
												<div class="card-body" style="padding: 5px;">
													<div class="margin-bottom ">
														<div class="row">
															<div class="col-12 mb-3" style="text-align: center;">
																<img src="/assets/images/branch/logo.png" class="modalImg" style="width: 100%;">
															</div>
														</div>

													</div>
												</div>
                                        	</div>
                                    	</div>
                                    	<div class=" col-sm-9 col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                                    		<div class="card shadow margin-bottom">
												<div class="card-body">
													<div class="margin-bottom ">
														<div class="row">
															<div class="col-6 mb-3">
																<input id="email" class="form-control" type="text" value="">
																</br>
																<span class="btn btn-primary btnUser" onclick="valUser()">Buscar</span>
																<p id="txtMessageUser"></p>
															</div>
															<div class="col-6 mb-3">
																<p>Ingrese su usuario del cliente para realizar la compra,  de lo contrario <a href="<?php echo $helper->url("Account","index"); ?>">Crear una cuenta</a></p>
															</div>
															<br><br>
															<!---->
															<div class="col-12 mb-3 sectionCard">
																Niños relacionados
																<div class="form-check form-switch contCard">
																	<label><input type="radio" name="radio_card" value="0" checked="checked"> No aplicar</label><br>
																</div>
															</div>
															<br><br>
															<div class="col-12 mb-3 sectionPromotion">
																Promociones
																<div class="form-check form-switch contPromotion">
																	<label><input type="radio" name="radio_promotion" value="0" checked="checked"> No aplicar</label><br>
																</div>
															</div>
															<!---->
															<div class="col-6 mb-3">
																Sucursal
																<select id="idBranch" name="idBranch" class="form-control">
																	<option value="0">Selecciona la sucursal</option>
																	<?php foreach($info_admin_branch as $branch) {?>
																		<option value="<?php echo $branch->idBranch; ?>"><?php echo $branch->vBranch; ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-6 mb-3">
																Producto
																<select id="idProduct" name="idProduct" class="form-control">
																	<option value="0" data-image="">Selecciona el modelo</option>
																</select>
															</div>
															<div class="col-6 mb-3">
																Color
																<select id="idColor" name="idColor" class="form-control">
																	<option value="0">Selecciona el color</option>
																</select>
															</div>
															<div class="col-6 mb-3">
																Talla
																<select id="idSize" name="idSize" class="form-control">
																	<option value="0">Selecciona la talla</option>
																</select>
															</div>
															<div class="col-6 mb-3">
																Cantidad
																<select id="iStock" name="iStock" class="form-control">
																	<option value="0">0</option>
																</select>
															</div>
															<div class="col-6 mb-3">
																Precio
																<input id="price" class="form-control" name="price" type="text" value="" disabled onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="3">
															</div>
															<div class="col-12 mb-3">
																<p class="messageError"></p>
															</div>
															<div class="col-6 mb-3">
																Tipo de pago
																<select id="idTypePayment" name="idTypePayment" class="form-control">
																	<?php foreach($info_admin_type_payment as $payment) {?>
																		<option value="<?php echo $payment->idTypePayment; ?>"><?php echo $payment->vTypePayment; ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-6 mb-3">
																<p>
																	<b>Comision <span class="txtCommission"></span></b>  $<span class="txtIva"></span>
																</p>
																<p>
																	<b>SubTotal: $</b><span class="txtSubtotal"></span>
																</p>
																<p>
																	<b>Total: $</b><span class="txtTotal"></span>
																</p>
															</div>
															<div class="col-6 mb-3">
																<span class="btn btn-primary btnSale" onclick="valAdd()">Agregar</span>
															</div>
															<div class="col-6 mb-3 btnpay">
																<span class="btn btn-primary" onclick="valPay()">Pagar</span>
															</div>
														</div>

													</div>
												</div>
                                        	</div>
                                    	</div>
                            		</div>

									<div class="row contCart" style="overflow: auto;">
										<div class="col-12">
											<table class="table">
												<thead class="thead-dark">
													<tr>
													<th scope="col">Nombre</th>
													<th scope="col">Sucursal</th>
													<th scope="col">Talla</th>
													<th scope="col">Color</th>
													<th scope="col">Precio</th>
													<th scope="col">Piezas</th>
													<th scope="col">Subtotal</th>
													<th scope="col"></th>
													</tr>
												</thead>
												<tbody class="tbody_shop">
												</tbody>
											</table>
										</div>
									</div>
                            	</div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->

                </main>
            </div>
        </div>

        <?php include('footerAdmin.php') ?>
		
		<style>
			.errorForm{border: 1px solid red;}
			p.messageError {color: red;}
			.table td, .table th {text-align: center;}
		</style>
	</body>
</html>