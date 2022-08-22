<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

			<script>
				var info_admin_purchase_history = '<?php echo json_encode($info_admin_purchase_history); ?>';
				var JSON_info_admin_purchase_history = JSON.parse(info_admin_purchase_history);
			</script>
			<?php 
				$permissions_edit = false;
				if ($_SESSION['idPermissions'] == "2" || $_SESSION['idPermissions'] == "3") { $permissions_edit = true;}
			?>
            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Reporte de ventas</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url("AdminReportSale","update"); ?>" style="display:none;">
						<input type="hidden" class="hdn_iStatus" 					name="hdn_iStatus" value=""/>
						<input type="hidden" class="hdn_idPurchaseHistory_update" 	name="hdn_idPurchaseHistory_update" value=""/>

						<button type="submit" class="btn-link btn_update" name="btn_update" style="display:none;">Update</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url("AdminReportSale","delete"); ?>" style="display:none;">
						<input type="hidden" class="hdn_idPurchaseHistory_delete" 	name="hdn_idPurchaseHistory_delete" value=""/>
						<button type="submit" class="btn-link btn_delete" name="btn_delete" style="display:none;">Delete</button>
					</form>

					<div class="container-fluid mt-n10 ">
                    	<div class="svgStyle toppadding50 bottompadding50">
                        	<div class="row margin-bottom">
                            	<div class="col-xl-12">
                                	<div class="row">
                                    	<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    		<div class="card shadow margin-bottom">
                                            	<div class="card-body">

													<div class="row">
                                                        <div class="col-4 mb-3">
															<input type="date" id="date" name="date" class="form-control" value="">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                    	<div class="col-12">
                                							<div class="bottompadding50" id="dTables3">
                                    							<div class="card shadow">
                                        							<div class="card-body">
                                            							<div class="table-responsive">
                                                							<table id="export1234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    							<thead>
                                                        							<tr>
                                                           								<th>#</th>
                                                            							<th>Socio</th>
                                                            							<th>Vendedor</th>
                                                            							<th>Sucursal</th>
                                                            							<th>Modelo</th>
                                                            							<th>Talla</th>
                                                            							<th>Color</th>
                                                            							<th>Tipo de pago</th>
                                                            							<th>No. piezas</th>
                                                            							<th>Comision</th>
                                                            							<th>Envio</th>
                                                            							<th>Subtotal</th>
                                                            							<th>Total</th>
                                                            							<th>Fecha de compra</th>
                                                            							<?php if ($permissions_edit) {?>
                                                            							<th></th>
																						<?php }?>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php
																					$vUser = "";
																					$vBranch = "";
																					$vProduct = "";
																					$idSize = "0";
																					$idColor = "0";
																					$vSize = "";
																					$vColor = "";
																					$vTypePayment = "";
																					$vStatus = "";

																					foreach($info_admin_purchase_history as $purchase_history) 
																					{
																						$vUserAdmin = "Online";
																						$vClass = "";

																						foreach($all_user as $user) {
																							if($user->idUser == $purchase_history->idUser){ $vUser = $user->vUser;}
																						}
																						if($purchase_history->idUserAdmin != 0)
																						{
																							foreach($all_user as $user) {
																								if($user->idUser == $purchase_history->idUserAdmin){ $vUserAdmin = $user->vUser;}
																							}
																						}
																						foreach($info_admin_branch as $branch) {
																							if($branch->idBranch == $purchase_history->idBranch){ $vBranch = $branch->vBranch;}
																						}
																						foreach($info_admin_product as $product) {
																							if($product->idProduct == $purchase_history->idProduct){ $vProduct = $product->vProduct;}
																						}
																						foreach($info_admin_stock_product as $stock) {
																							if($stock->idStockProduct == $purchase_history->idStockProduct){ 
																								$idSize = $stock->idSize;
																								$idColor = $stock->idColor;
																							}
																						}
																						foreach($info_admin_type_payment as $type_payment) {
																							if($type_payment->idTypePayment == $purchase_history->idTypePayment){ $vTypePayment = $type_payment->vTypePayment;}
																						}
																						foreach($info_admin_color as $color) {
																							if($color->idColor == $idColor){ $vColor = $color->vColor;}
																						}
																						foreach($info_admin_size as $size) {
																							if($size->idSize == $idSize){ $vSize = $size->vSize;}
																						}

																						switch($purchase_history->iStatus)
																						{
																							case "0":
																								$vStatus = "En espera";
																								$vClass = "class='blackList'";
																								break;
																							case "1":
																								$vStatus = "En proceso";
																								$vClass = "class='inprocess'";
																								break;
																							case "2":
																								$vStatus = "Realizado";
																								$vClass = "class='delivered'";
																								break;
																						}
																				?>
																					<tr <?php echo $vClass; ?>>
																						<td><?php echo $purchase_history->idPurchaseHistory;?></td>
																						<td><?php echo $vUser;?></td>
																						<td><?php echo $vUserAdmin;?></td>
																						<td><?php echo $vBranch;?></td>
																						<td><?php echo $vProduct;?></td>
																						<td><?php echo $vSize;?></td>
																						<td><?php echo $vColor;?></td>
																						<td><?php echo $vTypePayment;?></td>
																						<td><?php echo $purchase_history->iPieces;?></td>
																						<td><?php echo "$".$purchase_history->iCommission;?></td>
																						<td><?php echo "$".$purchase_history->iSending;?></td>
																						<td><?php echo "$".$purchase_history->iSubtotal;?></td>
																						<td><?php echo "$".$purchase_history->iTotal;?></td>
																						<td><?php echo $purchase_history->vDateCreation;?></td>
                                                            							<?php if ($permissions_edit) {?>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $purchase_history->idPurchaseHistory;?>,'<?php echo $vUser;?>','<?php echo $vUserAdmin;?>','<?php echo $vBranch;?>','<?php echo $vProduct;?>','<?php echo $vSize;?>','<?php echo $vColor;?>','<?php echo $vTypePayment;?>',<?php echo $purchase_history->iPieces;?>,<?php echo $purchase_history->iCommission;?>,<?php echo $purchase_history->iSending;?>,<?php echo $purchase_history->iSubtotal;?>,<?php echo $purchase_history->iTotal;?>,'<?php echo $purchase_history->vDateCreation;?>')"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-rigth" onclick="Delete(<?php echo $purchase_history->idPurchaseHistory;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																						<?php }?>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>#</th>
                                                            							<th>Socio</th>
                                                            							<th>Vendedor</th>
                                                            							<th>Sucursal</th>
                                                            							<th>Modelo</th>
                                                            							<th>Talla</th>
                                                            							<th>Color</th>
                                                            							<th>Tipo de pago</th>
                                                            							<th>No. piezas</th>
                                                            							<th>Comision</th>
                                                            							<th>Envio</th>
                                                            							<th>Subtotal</th>
                                                            							<th>Total</th>
                                                            							<th>Fecha de compra</th>
                                                            							<?php if ($permissions_edit) {?>
                                                            							<th></th>
																						<?php }?>
                                                        							</tr>
                                                    							</tfoot>
                                                							</table>
                                            							</div>
                                        							</div>
                                    							</div>
                                							</div>
                                                    	</div>
                                                    </div>
                                                    <!---Boton elimina socio-->
                                                    <button type="button" class="btn btn-primary modalDelete" data-toggle="modal" data-target="#exampleModal4" style="display:none;">Delete</button>
                                                    
                                                	<div class="modal animated zoomIn" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                                    	<div class="modal-dialog" role="document">
                                                        	<div class="modal-content">
                                                            	<div class="modal-header">
                                                                	<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                                                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    	<span aria-hidden="true">&times;</span>
                                                                	</button>
                                                            	</div>
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información de este historial?</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_delete').click();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                									<!---Boton Edita socio-->
                    								<button type="button" class="btn btn-primary modalEdit" data-toggle="modal" data-target="#exampleModal6" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="titleEdit"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
                                								<div class="modal-body">
                                									<div class="row">
                                                            			<div class="col-12 mb-3">
																			<p>Socio: <b id="socio"></b></p>

                                                                			<p>Vendedor: <b id="vendedor"></b></p>

                                                                			<p>Sucursal: <b id="sucursal"></b></p>

                                                                			<p>Modelo: <b id="modelo"></b></p>
																			
                                                                			<p>Talla: <b id="talla"></b></p>
																			
                                                                			<p>Color: <b id="color"></b></p>
																			
                                                                			<p>Tipo de pago: <b id="tipoPago"></b></p>
																			
                                                                			<p>No. piezas: <b id="piezas"></b></p>
																			
                                                                			<p>Comision: <b id="comision"></b></p>
																			
                                                                			<p>Envio: <b id="envio"></b></p>
																			
                                                                			<p>Subtotal: <b id="subtotal"></b></p>
																			
                                                                			<p>Total: <b id="total"></b></p>
																			
                                                                			<p>Fecha de compra: <b id="fechaCompra"></b></p>
                                                            			</div>
																		<div class="col-12 mb-3 contRent">
																			<select id="iStatus" name="iStatus" class="form-control">
																				<option value="0">En espera</option>
																				<option value="1">En proceso</option>
																				<option value="2">Realizado</option>
																			</select>
																		</div>

                                									</div>
                                								</div>

                               			 						<div class="modal-footer">
                                									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    								<button type="button" class="btn btn-primary" onclick="valEdit()">Actualizar</button>
                                								</div>
                            								</div>
                        								</div>
                    								</div>
                									<!---->

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
			div#export1234_filter {display: none;}
			.delivered{color: #28a745!important;}
		</style>
	</body>
</html>