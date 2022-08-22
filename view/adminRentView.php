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


			var info_schedule = '<?php echo json_encode($info_schedule); ?>';
			var JSON_schedule = JSON.parse(info_schedule);

			var info_admin_hour = '<?php echo json_encode($info_admin_hour); ?>';
			var JSON_hour = JSON.parse(info_admin_hour);

			var txtDefaultSelectModel = "Selecciona el modelo";
			var txtDefaultSelectColor = "Selecciona el color";
			var txtDefaultSelectSize = "Selecciona la talla";

			
			var all_user = '<?php echo json_encode($all_user); ?>';
    		var JSON_all_user = JSON.parse(all_user);

			var info_promotion = '<?php echo json_encode($info_promotion); ?>';
			var JSON_promotion = JSON.parse(info_promotion);

			var info_card = '<?php echo json_encode($info_card); ?>';
			var JSON_card = JSON.parse(info_card);

			var info_kidByCard = '<?php echo json_encode($info_kidByCard); ?>';
			var JSON_kidByCard = JSON.parse(info_kidByCard);

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
                                <h2 class="h4 mb-0 pageH1 ">Renta</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="container-fluid mt-n10 ">
                    	<div class="svgStyle toppadding50 bottompadding50">
                        	<div class="row margin-bottom">
                            	<div class="col-xl-12">

                                	<div class="row">
                                    	<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    		<div class="card shadow margin-bottom">
												<div class="card-body">
													<div class="margin-bottom ">

														<form method="post" action="<?php echo $helper->url($view,"create"); ?>"  enctype="multipart/form-data">
															
															<div class="row">

																<div class="col-6 mb-3">
																	<input id="email" class="form-control" type="text" value="">
																	</br>
																	<span class="btn btn-primary" onclick="valUser()">Buscar</span>
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
																	Fecha de evento
																	<input type="date" id="date_rent" name="date_rent" class="form-control" value="">
																</div>
																<div class="col-6 mb-3">
																	Fecha de entrega
																	<input type="date" id="dateFin_rent" name="dateFin_rent" disabled class="form-control" value="">
																</div>
																<div class="col-6 mb-3">
																	Modelo
																	<select id="idProduct_rent" name="idProduct_rent" class="form-control idProduct_rent">
																		<option value="0">Selecciona el modelo</option>
																	</select>
																</div>
																<div class="col-6 mb-3">
																	Color
																	<select id="idColor_rent" name="idColor_rent" class="form-control idColor_rent">
																		<option value="0">Selecciona el color</option>
																	</select>
																</div>
																<div class="col-6 mb-3">
																	Talla
																	<select id="idSize_rent" name="idSize_rent" class="form-control idSize_rent">
																		<option value="0" data-iprice="0" data-istock="0" data-image="">Selecciona la talla</option>
																	</select>
																</div>
																<div class="col-6 mb-3">
																	Identificación
																	<input type="file" class="form-control-file" id="ine" name="ine">
																</div>
																<div class="col-6 mb-3">
																	Comprobante de domicilio
																	<input type="file" class="form-control-file" id="address_proof" name="address_proof">
																</div>

																<div class="col-6 mb-3">
																	Cobro de separación
																	<input id="vAdvance" class="form-control" name="vAdvance" type="text" value="0" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
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
																	<label class="col-md-10 col-form-label check_event">
																		<input type="checkbox" id="check_event" value=""> 
																		¿Su fecha de renta es correcta?
																	</label>
																</div>
																<div class="col-6 mb-3">
																	<p>
																		<b>Comision <span class="txtCommission"></span></b> $<span class="txtIva"></span>
																	</p>
																	<p>
																		<b>SubTotal: </b>$<span class="txtSubtotal"></span>
																	</p>
																	<p>
																		<b>Minimo para reparar: </b>$<span class="txtMinPrice"></span>
																	</p>
																	<p>
																		<b>Total: </b>$<span class="txtTotal"></span>
																	</p>
																</div>

																<input type="hidden" class="hdn_dateFin_rent" 			name="hdn_dateFin_rent" value=""/>
																<input type="hidden" class="hdn_date_schedule" 			name="hdn_date_schedule" value=""/>
																<input type="hidden" class="hdn_price_rent" 			name="hdn_price_rent" value=""/>
																<input type="hidden" class="hdn_advance_rent" 			name="hdn_advance_rent" value=""/>
																<input type="hidden" class="hdn_idTypeSchedule_rent" 	name="hdn_idTypeSchedule_rent" value="1"/>
																<input type="hidden" class="hdn_idUser" 				name="hdn_idUser" value="0"/>


																<input type="hidden" class="hdn_iTotal" 		name="hdn_iTotal" value=""/>
																<input type="hidden" class="hdn_vDateCreation" 	name="hdn_vDateCreation" value="<?php echo date('Y-m-d');?>"/>
																<input type="hidden" class="hdn_idCard" 		name="hdn_idCard" value="0"/>
																<input type="hidden" class="hdn_idKidByCard" 	name="hdn_idKidByCard" value="0"/>
																<input type="hidden" class="hdn_iCountPurchase" name="hdn_iCountPurchase" value="0"/>
																<input type="hidden" class="hdn_iTotalPurchase" name="hdn_iTotalPurchase" value="0"/>
																<input type="hidden" class="hdn_idPromotion" 	name="hdn_idPromotion" value="0"/>
																
																<div class="col-12 mb-3">
																	<span class="btn btn-primary" onclick="valSchedule()">Agendar</span>
																	<input class="btn btn-primary btnSend" type="submit" value="Agendar" style="display:none">
																</div>
															</div>
														</form>
													</div>
												</div>
                                        	</div>
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