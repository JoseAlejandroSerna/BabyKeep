<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

		<script>
			var all_user = '<?php echo json_encode($all_user); ?>';
			var JSON_all_user = JSON.parse(all_user);
			
			var info_cardModel = '<?php echo json_encode($info_cardModel); ?>';
			var JSON_cardModel = JSON.parse(info_cardModel);
		</script>
		<?php 
			$permissions_edit = false;
			if ($_SESSION['idPermissions'] == "2" || $_SESSION['idPermissions'] == "3") { $permissions_edit = true;}
		?>
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Tarjeta Club</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url($view,"delete"); ?>" style="display:none;">
						<input type="hidden" class="hdn_idUser_delete" 	name="hdn_idUser_delete" value=""/>
						<button type="submit" class="btn-link btn_adminUser_delete" name="btn_adminUser_delete" style="display:none;">User</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url($view,"view_kidByCard"); ?>" style="display:none;">

						<input type="hidden" class="hdn_idCard_view" 	name="hdn_idCard_view" value=""/>
						<input type="hidden" class="hdn_vUser_view" 	name="hdn_vUser_view" value=""/>

						<button type="submit" class="btn_view" name="btn_view" style="display:none;">User</button>
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
                                                        <div class="col-12 mb-3">
                                                        	<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" style="color: #997c00 !important;" onclick="$('.modalNew').click();">Agregar</span>
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
                                                            							<th>Numero</th>
                                                            							<th>Compras acumuladas</th>
                                                            							<th>Fecha de inicio</th>
                                                            							<th>Fecha final</th>
                                                            							<th></th>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php 
																					foreach($info_cardModel as $card) {
																						$vName = "";
																						foreach($all_user as $user) {
																							if($user->idUser == $card->idUser)
																							{
																								$vName = $user->vUser;
																							}
																						}
																						
																				?>
																					<tr>
																						<td><?php echo $card->idCard;?></td>
																						<td><?php echo $vName;?></td>
																						<td><?php echo $card->vCardNumber;?></td>
																						<td><?php echo $card->iNumberPurchases;?></td>
																						<td><?php echo $card->vStartDate;?></td>
																						<td><?php echo $card->vEndDate;?></td>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-warning float-left" onclick="View(<?php echo $card->idCard;?>)"><i data-feather="eye" data-toggle="tooltip" data-placement="top" title="Ver"></i></span>

																							<?php if ($permissions_edit) {?>
																								<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $card->idCard;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																								<span class="waves-effect waves-dark btn btn-outline-light text-danger float-rigth" onclick="Delete(<?php echo $card->idCard;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																							<?php }?>
																						</td>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>#</th>
                                                            							<th>Socio</th>
                                                            							<th>Numero</th>
                                                            							<th>Compras acumuladas</th>
                                                            							<th>Fecha de inicio</th>
                                                            							<th>Fecha final</th>
                                                            							<th></th>
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
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información de este socio? <br>Se eliminara toda información personal incluyendo los registros de citas y compras.</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_adminUser_delete').click();">Eliminar</button>
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
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>

                                								<form method="post" action="<?php echo $helper->url($view,"update"); ?>">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3">
																				Socio
																				<input id="email" class="form-control email" type="text" value="" disabled>
																			</div>

																			<div class="col-12 mb-3">
																				Numero de tarjeta
																				<input id="cardNumber" class="form-control" name="cardNumber" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="50">
																			</div>

																			<div class="col-12 mb-3">
																				Fecha de inicio
																				<input type="date" id="dateStart" name="dateStart" class="form-control" value="">
																			</div>

																			<div class="col-12 mb-3">
																				Fecha final
																				<input type="date" id="dateEnd" name="dateEnd" class="form-control" value="">
																			</div>

																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valEdit()">Actualizar</span>
																		<button type="submit" class="btn btn-primary btn_update" name="btn_update" style="display:none;"></button>
																		<input type="hidden" class="hdn_idCard" 			name="hdn_idCard" value=""/>
																		<input type="hidden" class="hdn_idUser" 			name="hdn_idUser" value=""/>
																		<input type="hidden" class="hdn_dateStart" 			name="hdn_dateStart" value=""/>
																		<input type="hidden" class="hdn_dateEnd" 			name="hdn_dateEnd" value=""/>
																		<input type="hidden" class="hdn_iNumberPurchases" 	name="hdn_iNumberPurchases" value=""/>
																	</div>
																</form>
                            								</div>
                        								</div>
                    								</div>

                    								<button type="button" class="btn btn-primary modalNew" data-toggle="modal" data-target="#exampleModal7" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>

																<form method="post" action="<?php echo $helper->url($view,"create"); ?>">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3">
																				Socio
																				<input id="email_new" class="form-control email" type="text" value="">
																				</br>
																				<span class="btn btn-primary" onclick="valUser_new()">Buscar</span>
																			</div>

																			<div class="col-12 mb-3 contForm">
																				Numero de tarjeta
																				<input id="cardNumber_new" class="form-control" name="cardNumber_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="50">
																			</div>

																			<div class="col-12 mb-3 contForm">
																				Fecha de inicio
																				<input type="date" id="dateStart_new" name="dateStart_new" class="form-control" value="">
																			</div>

																			<div class="col-12 mb-3 contForm">
																				Fecha final
																				<input type="date" id="dateEnd_new" name="dateEnd_new" class="form-control" value="">
																			</div>

																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valNew()">Guardar</span>
																		<button type="submit" class="btn btn-primary btn_create" name="btn_create" style="display:none;"></button>
																		<input type="hidden" class="hdn_idUser_new" 			name="hdn_idUser_new" value=""/>
																		<input type="hidden" class="hdn_dateStart_new" 			name="hdn_dateStart_new" value=""/>
																		<input type="hidden" class="hdn_dateEnd_new" 			name="hdn_dateEnd_new" value=""/>
																		<input type="hidden" class="hdn_iNumberPurchases_new" 	name="hdn_iNumberPurchases_new" value="0"/>
																	</div>
																</form>

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
			th{min-width: 60px;}
		</style>
	</body>
</html>