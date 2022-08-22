<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Usuarios</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url("AdminUser","delete"); ?>" style="display:none;">

						<input type="hidden" class="hdn_idUser_delete" 	name="hdn_idUser_delete" value=""/>

						<button type="submit" class="btn-link btn_adminUser_delete" name="btn_adminUser_delete" style="display:none;">User</button>
					</form>
					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url("AdminUser","update"); ?>" style="display:none;">

						<input type="hidden" class="hdn_idUser" 		name="hdn_idUser" value=""/>
						<input type="hidden" class="hdn_idPermissions_update" 	name="hdn_idPermissions_update" value=""/>
						<input type="hidden" class="hdn_vUser" 			name="hdn_vUser" value=""/>
						<input type="hidden" class="hdn_vEmail" 		name="hdn_vEmail" value=""/>
						<input type="hidden" class="hdn_vPassword" 		name="hdn_vPassword" value=""/>
						<input type="hidden" class="hdn_vPhone" 		name="hdn_vPhone" value=""/>
						<input type="hidden" class="hdn_vAddress" 		name="hdn_vAddress" value=""/>
						<input type="hidden" class="hdn_vCP" 			name="hdn_vCP" value=""/>
						<input type="hidden" class="hdn_vComent" 		name="hdn_vComent" value=""/>
						<input type="hidden" class="hdn_iStatus" 		name="hdn_iStatus" value=""/>

						<button type="submit" class="btn-link btn_adminUser" name="btn_adminUser" style="display:none;">User</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url("AdminUser","create"); ?>" style="display:none;">

						<input type="hidden" class="hdn_name" name="hdn_name" value=""/>
						<input type="hidden" class="hdn_email" name="hdn_email" value=""/>
						<input type="hidden" class="hdn_password" name="hdn_password" value=""/>
						<input type="hidden" class="hdn_phone" name="hdn_phone" value=""/>
						<input type="hidden" class="hdn_address" name="hdn_address" value=""/>
						<input type="hidden" class="hdn_cp" name="hdn_cp" value=""/>
						<input type="hidden" class="hdn_coment" name="hdn_coment" value=""/>
						<input type="hidden" class="hdn_idPermissions" name="hdn_idPermissions" value=""/>
						
						<button type="submit" class="btn-link btn_create" name="btn_create" style="display:none;">user</button>
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
                                                        	<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" style="color: #997c00 !important;" onclick="$('.userNew').click();">Agregar</span>
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
                                                            							<th>Correo</th>
                                                            							<th>Telefono</th>
                                                            							<th>Direccion</th>
                                                            							<th>CP</th>
                                                            							<th>Tipo de usuario</th>
                                                            							<th></th>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php 
																					foreach($all_user as $user) {

																						$vPermissions = "";
																						foreach($info_permissions as $permissions) {
																							if($permissions->idPermissions == $user->idPermissions){ $vPermissions = $permissions->vPermissions;}
																						}
																				?>
																					<tr <?php if($user->iStatus == 0){ echo "class='blackList'"; }else if($user->iStatus == 2){ echo "class='vipList'"; } ?>>
																						<td><?php echo $user->vUser;?></td>
																						<td><?php echo $user->vEmail;?></td>
																						<td><?php echo $user->vPhone;?></td>
																						<td><?php echo $user->vAddress;?></td>
																						<td><?php echo $user->vCP;?></td>
																						<td><?php echo $vPermissions;?></td>
																						
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="UserEdit(<?php echo $user->idUser;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-rigth" onclick="UserDelete(<?php echo $user->idUser;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>Nombre</th>
                                                            							<th>Correo</th>
                                                            							<th>Telefono</th>
                                                            							<th>Direccion</th>
                                                            							<th>CP</th>
                                                            							<th>Tipo de usuario</th>
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
                                                    <button type="button" class="btn btn-primary userDelete" data-toggle="modal" data-target="#exampleModal4" style="display:none;">Delete</button>
                                                    
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
                    								<button type="button" class="btn btn-primary userEdit" data-toggle="modal" data-target="#exampleModal6" style="display:none;">Edit</button>
                    								
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
                                                                			Nombre
                                            								<input id="name" class="form-control" name="name" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
                                                            			</div>

                                                            			<div class="col-12 mb-3">
                                                                			Telefono
                                            								<input id="phone" class="form-control" name="phone" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
                                                            			</div>

                                                            			<div class="col-12 mb-3">
                                                                			Dirección
                                            								<input id="address" class="form-control" name="address" type="text" value=""  onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="200">
                                                            			</div>

                                                            			<div class="col-12 mb-3">
                                                                			CP
                                            								<input id="cp" class="form-control" name="cp" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="7">
                                                            			</div>

																		<div class="col-12 mb-3">
																			<div class="form-check form-switch">
																				<label><input type="radio" name="iStatus" value="0"> Lista negra</label><br>
																				<label><input type="radio" name="iStatus" value="1"> Regular</label><br>
																				<label><input type="radio" name="iStatus" value="2"> VIP</label>
																			</div>
																		</div>

																		<div class="col-12 mb-3">
																			Comentario
																			<textarea id="coment" class="form-control" name="coment" rows="10" cols="50" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500"></textarea>
																		</div>

																		<div class="col-12 mb-3">
																			Tipo de usuario
																			<select id="idPermissions_update" name="idPermissions_update" class="form-control">
																				<option value="0">Selecciona el tipo de usuario</option>
																				<?php foreach($info_permissions as $permissions) {?>
																					<option value="<?php echo $permissions->idPermissions; ?>"><?php echo $permissions->vPermissions; ?></option>
																				<?php } ?>
																			</select>
																			<p id="description"></p>
																		</div>
                                									</div>
                                								</div>

																<div class="forgot-password">
																	<p class="messageError"></p>
																</div>

                               			 						<div class="modal-footer">
                                									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    								<button type="button" class="btn btn-primary" onclick="valUserEdit()">Actualizar</button>
                                								</div>
                            								</div>
                        								</div>
                    								</div>

                    								<button type="button" class="btn btn-primary userNew" data-toggle="modal" data-target="#exampleModal7" style="display:none;">Edit</button>
                    								
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
                                                                			Nombre
                                            								<input id="name_new" class="form-control" name="name_new" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
                                                            			</div>

																		<div class="col-12 mb-3">
                                                                			Correo
                                            								<input id="email_new" class="form-control" name="email_new" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="100">
                                                            			</div>

																		<div class="col-12 mb-3">
                                                                			Contraseña
                                            								<input id="password_new" class="form-control" name="password_new" type="password" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="50">
                                                            			</div>

																		<div class="col-12 mb-3">
																			Condirmar Contraseña
																			<input id="conf_password_new" class="form-control" name="conf_password_new" type="password" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="50">
																		</div>

                                                            			<div class="col-12 mb-3">
                                                                			Telefono
                                            								<input id="phone_new" class="form-control" name="phone_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
                                                            			</div>

                                                            			<div class="col-12 mb-3">
                                                                			Dirección
                                            								<input id="address_new" class="form-control" name="address_new" type="text" value=""  onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="200">
                                                            			</div>

                                                            			<div class="col-12 mb-3">
                                                                			CP
                                            								<input id="cp_new" class="form-control" name="cp_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="7">
                                                            			</div>

																		<div class="col-12 mb-3">
																			Tipo de usuario
																			<select id="idPermissions" name="idPermissions" class="form-control">
																				<option value="0" data-description="">Selecciona el tipo de usuario</option>
																				<?php foreach($info_permissions as $permissions) {?>
																					<option value="<?php echo $permissions->idPermissions; ?>" data-description="<?php echo $permissions->vDescription; ?>"><?php echo $permissions->vPermissions; ?></option>
																				<?php } ?>
																			</select>
																			</br>
																			<p id="txtdescription"></p>
																		</div>

                                									</div>
                                								</div>

																<div class="forgot-password">
																	<p class="messageError"></p>
																</div>

                               			 						<div class="modal-footer">
                                									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    								<button type="button" class="btn btn-primary" onclick="valUserNew()">Guardar</button>
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
			th{min-width: 60px;}
		</style>
	</body>
</html>