<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>
			<script>
				var info_branch = '<?php echo json_encode($info_branch); ?>';
				var JSON_branch = JSON.parse(info_branch);
			</script>
            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Sucursales</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"delete"); ?>" style="display:none;">

						<input type="hidden" class="hdn_id_delete" 	name="hdn_id_delete" value=""/>

						<button type="submit" class="btn-link btn_delete" name="btn_delete" style="display:none;">User</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url($view,"view_phone"); ?>" style="display:none;">

						<input type="hidden" class="hdn_vBranch_view" 	name="hdn_vBranch_view" value=""/>
						<input type="hidden" class="hdn_id_view" 	name="hdn_id_view" value=""/>

						<button type="submit" class="btn-link btn_view" name="btn_view" style="display:none;">view</button>
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
                                                            							<th>Direccion</th>
                                                            							<th>CP</th>
                                                            							<th>Correo</th>
                                                            							<th>Latitud</th>
                                                            							<th>Longitud</th>
                                                            							<th></th>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php 
																					foreach($info_branch as $branch) {?>
																					<tr>
																						<td><?php echo $branch->vBranch;?></td>
																						<td><?php echo $branch->vAddress;?></td>
																						<td><?php echo $branch->vCP;?></td>
																						<td><?php echo $branch->vLatitude;?></td>
																						<td><?php echo $branch->vLongitude;?></td>
																						<td><?php echo $branch->vEmail;?></td>
																						
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light float-left" onclick="View(<?php echo $branch->idBranch;?>)"><i data-feather="phone" data-toggle="tooltip" data-placement="top" title="Lista de telefonos"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $branch->idBranch;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-rigth" onclick="Delete(<?php echo $branch->idBranch;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>Nombre</th>
                                                            							<th>Direccion</th>
                                                            							<th>CP</th>
                                                            							<th>Correo</th>
                                                            							<th>Latitud</th>
                                                            							<th>Longitud</th>
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
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información de esta sucursal? <br>Se eliminara la información, productos y citas relacionados con esta sucursal.</div>
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
																				<img id="vImageBranch" class="imgModal" src="">
																			</div>
																			<div class="col-12 mb-3">
																				Nombre
																				<input id="name" class="form-control" name="name" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="100">
																			</div>

																			<div class="col-12 mb-3">
																				Dirección
																				<input id="address" class="form-control" name="address" type="text" value="" maxlength="500">
																			</div>

																			<div class="col-12 mb-3">
																				CP
																				<input id="cp" class="form-control" name="cp" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="7">
																			</div>

																			<div class="col-12 mb-3">
																				Correo
																				<input id="email" class="form-control" name="email" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)">
																			</div>

																			<div class="col-12 mb-3">
																				Latitud
																				<input id="latitude" class="form-control" name="latitude" type="text" placeholder="Ej. 25.6087214" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)">
																			</div>

																			<div class="col-12 mb-3">
																				Longitud
																				<input id="longitude" class="form-control" name="longitude" type="text" placeholder="Ej. -100.2691317" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)">
																			</div>

																			<div class="col-12 mb-3">
																				Imagen (medidas recomendadas 600x778)
																				<input type="file" class="form-control-file" id="vImage" name="vImage">
																			</div>

																			<input id="hdnImage" type="hidden" name="hdnImage" value="">
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
																				Dirección
																				<input id="address_new" class="form-control" name="address_new" type="text" value="" maxlength="500">
																			</div>

																			<div class="col-12 mb-3">
																				CP
																				<input id="cp_new" class="form-control" name="cp_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="7">
																			</div>

																			<div class="col-12 mb-3">
																				Correo
																				<input id="email_new" class="form-control" name="email_new" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)">
																			</div>

																			<div class="col-12 mb-3">
																				Latitud
																				<input id="latitude_new" class="form-control" name="latitude_new" type="text" placeholder="Ej. 25.6087214" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)">
																			</div>

																			<div class="col-12 mb-3">
																				Longitud
																				<input id="longitude_new" class="form-control" name="longitude_new" type="text" placeholder="Ej. -100.2691317" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)">
																			</div>

																			<div class="col-12 mb-3">
																				Imagen (medidas recomendadas 675x600)
																				<input type="file" class="form-control-file" id="vImage_new" name="vImage_new">
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