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
                                <h2 class="h4 mb-0 pageH1 ">Productos</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url("AdminProduct","delete"); ?>" style="display:none;">
						<input type="hidden" class="hdnIdProduct_delete" 	name="hdnIdProduct_delete" value=""/>
						<button type="submit" class="btn-link btn_adminProduct_delete" name="btn_adminProduct_delete" style="display:none;">Producto</button>
					</form>

                    <div class="container-fluid mt-n10 ">
                    	<div class="svgStyle toppadding50 bottompadding50">
                        	<div class="row margin-bottom">
                            	<div class="col-xl-12">
                                	<div class="row">
                                    	<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    		<div class="card shadow margin-bottom">
                                            	<div class="card-body">
                                                    <div class="row mb-4">
                                                		<div class="col-12">
															<?php if ($permissions_edit) {?>
																<button type="button" class="btn btn-primary btnModalPaquetes" data-toggle="modal" data-target="#exampleModal7">
																	Nuevo producto
																</button>
															<?php }?>
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
                                                           								<th>Clave</th>
                                                            							<th>Nombre</th>
                                                            							<th>Descripción</th>
                                                            							<th>Tipo de producto</th>
																						<?php if ($permissions_edit) {?>
                                                            							<th></th>
																						<?php }?>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php foreach($info_admin_product as $product) {?>
																					<tr <?php if($product->iStatus == 0){ echo "class='blackList'"; } ?>>
																						<td><?php echo $product->vClave;?></td>
																						<td><?php echo $product->vProduct;?></td>
																						<td><?php echo $product->vDescription;?></td>
																						
																						<?php foreach($info_admin_type_purchase as $typePurchase) {?>
																							<?php if($typePurchase->idTypePurchase == $product->idTypePurchase){ ?>
																								<td><?php echo $typePurchase->vTypePurchase;?></td>
																							<?php } ?>
																						<?php } ?>
																						<?php if ($permissions_edit) {?>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="ProductEdit(<?php echo $product->idProduct;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-left" onclick="ProductDelete(<?php echo $product->idProduct;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																						<?php } ?>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>Clave</th>
                                                            							<th>Nombre</th>
                                                            							<th>Descripción</th>
                                                            							<th>Tipo de producto</th>
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
                                                    <!---Boton elimina product-->
                                                    <button type="button" class="btn btn-primary productDelete" data-toggle="modal" data-target="#exampleModal4" style="display:none;">Delete</button>
                                                    
                                                	<div class="modal animated zoomIn" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                                    	<div class="modal-dialog" role="document">
                                                        	<div class="modal-content">
                                                            	<div class="modal-header">
                                                                	<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                                                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    	<span aria-hidden="true">&times;</span>
                                                                	</button>
                                                            	</div>
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información de este producto?</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_adminProduct_delete').click();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                									<!---Boton edit product-->
                    								<button type="button" class="btn btn-primary productEdit" data-toggle="modal" data-target="#exampleModal6" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
																<form method="post" action="<?php echo $helper->url("AdminProduct","update"); ?>"  enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3" style="text-align: center;">
																				<img src="" class="modalImg">
																			</div>
																			<div class="col-12 mb-3">
																				Tipo de compra
																				<select id="typePurchase" name="typePurchase" class="form-control">
																					<?php foreach($info_admin_type_purchase as $typePurchase) {?>
																						<option value="<?php echo $typePurchase->idTypePurchase; ?>"><?php echo $typePurchase->vTypePurchase; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Tipo de producto
																				<select id="typeProduct" name="typeProduct" class="form-control">
																					<?php foreach($info_admin_type_product as $typeProduct) {?>
																						<option value="<?php echo $typeProduct->idTypeProduct; ?>"><?php echo $typeProduct->vTypeProduct; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Nombre
																				<input id="name" class="form-control" name="name" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Descripción
																				<textarea id="description" class="form-control" name="description" rows="10" cols="50" maxlength="500"></textarea>
																			</div>
																			<div class="col-12 mb-3">
																				Descripción detallada
																				<textarea id="descriptionDetail" class="form-control" name="descriptionDetail" rows="10" cols="50" maxlength="500"></textarea>
																			</div>
																			<div class="col-12 mb-3">
																				Clave
																				<input id="key" class="form-control" name="key" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="100">
																			</div>
																			<div class="col-12 mb-3">
																				Imagen (medidas recomendadas 600x778)
																				<input type="file" class="form-control-file" id="imageEdit" name="imageEdit">
																			</div>

																			<div class="col-12 mb-3">
																				<div class="form-check form-switch">
																					<input class="form-check-input" type="checkbox" id="iStatus">
																					<label class="form-check-label" for="iStatus">Activo</label>
																				</div>
																				<input id="hdnIsatus" type="hidden" name="hdnIsatus" value="">
																				<input id="hdnImage" type="hidden" name="hdnImage" value="">
																				<input id="hdnIdProduct" type="hidden" name="hdnIdProduct" value="">
																			</div>
																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<button type="button" class="btn btn-primary" onclick="valProductEdit()">Actualizar</button>
																		<button type="submit" class="btn-link btn_product" name="btn_product" style="display:none;">Product</button>
																	</div>
																</form>
                            								</div>
                        								</div>
                    								</div>
                									<!---->
                									<!---Boton new product-->
                    								<button type="button" class="btn btn-primary productNew" data-toggle="modal" data-target="#exampleModal7" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel7" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
																<form method="post" action="<?php echo $helper->url("AdminProduct","create"); ?>"  enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3">
																				Tipo de compra
																				<select id="typePurchase_new" name="typePurchase_new" class="form-control">
																					<?php foreach($info_admin_type_purchase as $typePurchase) {?>
																						<option value="<?php echo $typePurchase->idTypePurchase; ?>"><?php echo $typePurchase->vTypePurchase; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Tipo de producto
																				<select id="typeProduct_new" name="typeProduct_new" class="form-control">
																					<?php foreach($info_admin_type_product as $typeProduct) {?>
																						<option value="<?php echo $typeProduct->idTypeProduct; ?>"><?php echo $typeProduct->vTypeProduct; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Nombre
																				<input id="name_new" class="form-control" name="name_new" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Descripción
																				<textarea id="description_new" class="form-control" name="description_new" rows="10" cols="50" maxlength="500"></textarea>
																			</div>
																			<div class="col-12 mb-3">
																				Descripción detallada
																				<textarea id="descriptionDetail_new" class="form-control" name="descriptionDetail_new" rows="10" cols="50" maxlength="500"></textarea>
																			</div>
																			<div class="col-12 mb-3">
																				Clave
																				<input id="key_new" class="form-control" name="key_new" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="100">
																			</div>
																			<div class="col-12 mb-3">
																				Imagen (medidas recomendadas 600x778)
																				<input type="file" class="form-control-file" id="imageEdit_new" name="imageEdit_new">
																			</div>

																			<div class="col-12 mb-3">
																				<div class="form-check form-switch">
																					<input class="form-check-input" type="checkbox" id="iStatus_new">
																					<label class="form-check-label" for="iStatus_new">Activo</label>
																				</div>
																				<input id="hdnIsatus_new" type="hidden" name="hdnIsatus_new" value="">
																			</div>
																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valProductNew()">Agregar</span>
																		<button type="submit" class="btn-link btn_newProduct" name="btn_newProduct" style="display:none;">Product</button>
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

	</body>
</html>