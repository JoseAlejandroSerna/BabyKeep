<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

			<?php 
				$permissions_edit = false;
				if ($_SESSION['idPermissions'] == "2" || $_SESSION['idPermissions'] == "3") { $permissions_edit = true;}
			?>
            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Lista de colores</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url("AdminColor","delete"); ?>" style="display:none;">

						<input type="hidden" class="hdn_idColor_delete" name="hdn_idColor_delete" value=""/>

						<button type="submit" class="btn-link btn_admin_delete" name="btn_admin_delete" style="display:none;">User</button>
					</form>
					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url("AdminColor","update"); ?>" style="display:none;">

						<input type="hidden" class="hdn_idColor" 		name="hdn_idColor" value=""/>
						<input type="hidden" class="hdn_vColor" 		name="hdn_vColor" value=""/>
						<input type="hidden" class="hdn_vColorCode" 	name="hdn_vColorCode" value=""/>
						<input type="hidden" class="hdn_vImage" 		name="hdn_vImage" value=""/>

						<button type="submit" class="btn-link btn_admin_update" name="btn_admin_update" style="display:none;">update</button>
					</form>

					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url("AdminColor","create"); ?>" style="display:none;">

						<input type="hidden" class="hdn_vColor_new" 		name="hdn_vColor_new" value=""/>
						<input type="hidden" class="hdn_vColorCode_new" 	name="hdn_vColorCode_new" value=""/>
						<input type="hidden" class="hdn_vImage_new" 		name="hdn_vImage_new" value=""/>

						<button type="submit" class="btn-link btn_admin_create" name="btn_admin_create" style="display:none;">create</button>
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
                                                            							<th>Codigo</th>
                                                            							<?php if ($permissions_edit) {?>
                                                            							<th></th>
																						<?php }?>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php foreach($info_admin_color as $color) {?>
																					<tr>
																						<td><?php echo $color->vColor;?></td>
																						<td><?php echo $color->vColorCode;?></td>
																						<?php if ($permissions_edit) {?>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="ColorEdit(<?php echo $color->idColor;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-left" onclick="ColorDelete(<?php echo $color->idColor;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																						<?php } ?>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
																						<th>Nombre</th>
																						<th>Codigo</th>
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
                                                    <!---Boton elimina-->
                                                    <button type="button" class="btn btn-primary colorDelete" data-toggle="modal" data-target="#exampleModal4" style="display:none;">Delete</button>
                                                    
                                                	<div class="modal animated zoomIn" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                                    	<div class="modal-dialog" role="document">
                                                        	<div class="modal-content">
                                                            	<div class="modal-header">
                                                                	<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                                                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    	<span aria-hidden="true">&times;</span>
                                                                	</button>
                                                            	</div>
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información de este color?</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_admin_delete').click();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                									<!---Boton Edita -->
                    								<button type="button" class="btn btn-primary colorEdit" data-toggle="modal" data-target="#exampleModal6" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
                                								<div class="modal-body">
                                									<div class="row">
                                                            			<div class="col-12 mb-3">
                                                                			Nombre de color
                                            								<input id="vColor" class="form-control" name="vColor" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
                                                            			</div>

                                                            			<div class="col-12 mb-3">
                                                                			Codigo
                                            								<input id="vColorCode" class="form-control" name="vColorCode" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="10">
                                                            			</div>
                                									</div>
                                								</div>

																<div class="forgot-password">
																	<p class="messageError"></p>
																</div>

                               			 						<div class="modal-footer">
                                									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    								<button type="button" class="btn btn-primary" onclick="valColorEdit()">Actualizar</button>
                                								</div>
                            								</div>
                        								</div>
                    								</div>

                									<!---Boton nuevo-->
                    								<button type="button" class="btn btn-primary modalNew" data-toggle="modal" data-target="#exampleModal7" style="display:none;">new</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
                                								<div class="modal-body">
                                									<div class="row">
                                                            			<div class="col-12 mb-3">
                                                                			Nombre de color
                                            								<input id="vColor_new" class="form-control" name="vColor_new" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
                                                            			</div>

                                                            			<div class="col-12 mb-3">
                                                                			Codigo
                                            								<input id="vColorCode_new" class="form-control" name="vColorCode_new" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="10">
                                                            			</div>
                                									</div>
                                								</div>

																<div class="forgot-password">
																	<p class="messageError"></p>
																</div>

                               			 						<div class="modal-footer">
                                									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    								<button type="button" class="btn btn-primary" onclick="valColorNew()">Guardar</button>
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

	</body>
</html>