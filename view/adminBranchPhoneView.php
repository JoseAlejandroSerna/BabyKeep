<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>
			<script>
				var info_branch_phone = '<?php echo json_encode($info_branch_phone); ?>';
				var JSON_branch_phone = JSON.parse(info_branch_phone);
			</script>
            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Teléfonos sucursal <?php echo $vBranch; ?></h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"delete"); ?>" style="display:none;">

						<input type="hidden" class="hdn_id_delete" 	name="hdn_id_delete" value=""/>

						<button type="submit" class="btn-link btn_delete" name="btn_delete" style="display:none;">User</button>
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
                                                            							<th>Telefono</th>
                                                            							<th></th>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php 
																					foreach($info_branch_phone as $branch_phone) {?>
																					<tr>
																						<td><?php echo $branch_phone->vBranchPhone;?></td>
																						<td><?php echo $branch_phone->iBranchPhone;?></td>
																						
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $branch_phone->idBranchPhone;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-rigth" onclick="Delete(<?php echo $branch_phone->idBranchPhone;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>Nombre</th>
                                                            							<th>Telefono</th>
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
                                                            	<div class="modal-body">¿Seguro que desea eliminar este teléfono de la sucursal?</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_delete').click();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                									<!---edita-->
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
																<form method="post" action="<?php echo $helper->url($view,"update"); ?>"  enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">
																		
																			<div class="col-12 mb-3">
																				Nombre
																				<input id="name" class="form-control" name="name" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="100">
																			</div>

																			<div class="col-12 mb-3">
																				Teléfono
																				<input id="phone" class="form-control" name="phone" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																			</div>

																			<input id="hdnId" type="hidden" name="hdnId" value="">
																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valEdit()">Actualizar</span>
																		<button type="submit" class="btn btn-primary btn_update" name="btn_update" style="display:none;">Actualizar</button>
																	</div>
																</form>
                            								</div>
                        								</div>
                    								</div>
                									<!--New-->
                    								<button type="button" class="btn btn-primary modalNew" data-toggle="modal" data-target="#exampleModal7" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel7" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
																<form method="post" action="<?php echo $helper->url($view,"create"); ?>"  enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">

																		<div class="col-12 mb-3">
																				Nombre
																				<input id="name_new" class="form-control" name="name_new" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="100">
																			</div>

																			<div class="col-12 mb-3">
																				Teléfono
																				<input id="phone_new" class="form-control" name="phone_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																			</div>

																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valNew()">Actualizar</span>
																		<button type="submit" class="btn btn-primary btn_create" name="btn_create" style="display:none;">Actualizar</button>
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
		<style>
			th{min-width: 100px;}
			.imgModal{width: 100%;}
		</style>
	</body>
</html>