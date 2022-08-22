<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		<script>
			var info_kidByCard = '<?php echo json_encode($info_kidByCard); ?>';
			var JSON_kidByCard = JSON.parse(info_kidByCard);
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
                                <h2 class="h4 mb-0 pageH1 "><?php echo $vUser; ?></h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"delete"); ?>" style="display:none;">
						<input type="hidden" class="hdn_idKidByCard_delete" 	name="hdn_idKidByCard_delete" value=""/>
						<button type="submit" class="btn_delete" name="btn_delete" style="display:none;">User</button>
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
																						<th>Nombre</th>
																						<th>Edad</th>
																						<th>Compras realizadas</th>
																						<th>Total de compras</th>
                                                            							<?php if ($permissions_edit) {?>
                                                            							<th></th>
																						<?php }?>
																					</tr>
																				</thead>
																				<tbody>
																				<?php foreach($info_kidByCard as $kidByCard) {?>
																					<tr>
																						<td><?php echo $kidByCard->vName;?></td>
																						<td><?php echo $kidByCard->iAge;?></td>
																						<td><?php echo $kidByCard->iNumberPurchases;?></td>
																						<td><?php echo "$".$kidByCard->iTotalPurchases;?></td>
																						<?php if ($permissions_edit) {?>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $kidByCard->idKidByCard;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-left" onclick="Delete(<?php echo $kidByCard->idKidByCard;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																						<?php }?>
																					</tr>
                                                                                <?php } ?>
																				</tbody>
																				<tfoot>
																					<tr>
																						<th>Nombre</th>
																						<th>Edad</th>
																						<th>Compras realizadas</th>
																						<th>Total de compras</th>
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
                                                    <!---elimina-->
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
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información?</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_delete').click();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                									<!---Edita-->
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
																				Nombre
																				<input id="name" class="form-control" name="name" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Edad
																				<input id="age" class="form-control" name="age" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																			</div>
																			<div class="col-12 mb-3">
																				Compras realizadas
																				<input id="iNumberPurchases" class="form-control" name="iNumberPurchases" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																			</div>
																			<div class="col-12 mb-3">
																				Total de compras
																				<input id="iTotalPurchases" class="form-control" name="iTotalPurchases" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
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
																		<input type="hidden" class="hdn_idKidByCard"	name="hdn_idKidByCard" value=""/>
																	</div>
																</form>
                            								</div>
                        								</div>
                    								</div>
                									<!--Nuevo-->
													<button type="button" class="btn btn-primary modalNew" data-toggle="modal" data-target="#exampleModal7" style="display:none;">New</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel7" aria-hidden="true">
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
																				Nombre
																				<input id="name_new" class="form-control" name="name_new" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Edad
																				<input id="age_new" class="form-control" name="age_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
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
                        </div>
                    </div>
                    <!-- ============================================================== -->

                </main>
            </div>
        </div>

        <?php include('footerAdmin.php') ?>

	</body>
</html>