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
                                <h2 class="h4 mb-0 pageH1 ">Inventario de productos</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<!--Form account-->
					<form method="post" class="row" action="<?php echo $helper->url("AdminStockProduct","delete"); ?>" style="display:none;">
						<input type="hidden" class="hdnIdStockProduct_delete" 	name="hdnIdStockProduct_delete" value=""/>
						<button type="submit" class="btn-link btn_adminStockProduct_delete" name="btn_adminStockProduct_delete" style="display:none;">Producto</button>
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
                                                			<button type="button" class="btn btn-primary btnModalPaquetes" data-toggle="modal" data-target="#exampleModal7">
																Nuevo inventario
															</button>
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
                                                            							<th>Sucursal</th>
                                                            							<th>Talla</th>
                                                            							<th>Color</th>
                                                            							<th>En existencia</th>
                                                            							<th>Precio</th>
                                                            							<?php if ($permissions_edit) {?>
                                                            							<th></th>
																						<?php }?>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php foreach($info_admin_stock_product as $stock) {
																					$producto = "";
																					$sucursal = "";
																					$talla = "";
																					$ColorProducto = "";
																					foreach($info_admin_product as $product) {
																						if($stock->idProduct == $product->idProduct){	$producto = $product->vProduct; }
																					}
																					foreach($info_admin_branch as $branch) {
																						if($branch->idBranch == $stock->idBranch){		$sucursal = $branch->vBranch; }
																					}
																					foreach($info_admin_size as $size) {
																						if($size->idSize == $stock->idSize){			$talla = $size->vSize; }
																					}
																					foreach($info_admin_color as $color) {
																						if($color->idColor == $stock->idColor){			$ColorProducto = $color->vColor; }
																					}
																				?>
																					<tr <?php if($stock->iStock == 0){ echo "class='blackList'"; } ?>>
																						<td><?php echo $producto;?></td>
																						<td><?php echo $sucursal;?></td>
																						<td><?php echo $talla;?></td>
																						<td><?php echo $ColorProducto;?></td>
																						<td><?php echo $stock->iStock;?></td>
																						<td><?php echo $stock->iPrice;?></td>
																						<?php if ($permissions_edit) {?>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="StockProductEdit(<?php echo $stock->idStockProduct;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-left" onclick="StockProductDelete(<?php echo $stock->idStockProduct;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																						<?php } ?>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                            							<th>Nombre</th>
                                                            							<th>Sucursal</th>
                                                            							<th>Talla</th>
                                                            							<th>Color</th>
                                                            							<th>En existencia</th>
                                                            							<th>Precio</th>
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
                                                            	<div class="modal-body">¿Seguro que desea eliminar todo el inventario de este producto?</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_adminStockProduct_delete').click();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                									<!---Boton edit product-->
                    								<button type="button" class="btn btn-primary stockProductEdit" data-toggle="modal" data-target="#exampleModal6" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
																<form method="post" action="<?php echo $helper->url("AdminStockProduct","update"); ?>"  enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3" style="text-align: center;">
																				<img src="" class="modalImg">
																			</div>
																			<div class="col-12 mb-3">
																				Producto
																				<select id="idProduct" name="idProduct" class="form-control">
																					<?php foreach($info_admin_product as $product) {?>
																						<option value="<?php echo $product->idProduct; ?>"><?php echo $product->vProduct; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Sucursal
																				<select id="idBranch" name="idBranch" class="form-control">
																					<?php foreach($info_admin_branch as $branch) {?>
																						<option value="<?php echo $branch->idBranch; ?>"><?php echo $branch->vBranch; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Talla
																				<select id="idSize" name="idSize" class="form-control">
																					<?php foreach($info_admin_size as $size) {?>
																						<option value="<?php echo $size->idSize; ?>"><?php echo $size->vSize; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Color
																				<select id="idColor" name="idColor" class="form-control">
																					<?php foreach($info_admin_color as $color) {?>
																						<option value="<?php echo $color->idColor; ?>"><?php echo $color->vColor; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				En inventario
                                            									<input id="stock" class="form-control" name="stock" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="3">
																			</div>
																			<div class="col-12 mb-3">
																				Precio
                                            									<input id="price" class="form-control" name="price" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="5">
																			</div>
																			<div class="col-12 mb-3">
																				Imagen (medidas recomendadas 600x778)
																				<input type="file" class="form-control-file" id="imageStock" name="imageStock">
																			</div>

																			<div class="col-12 mb-3">
																				<div class="form-check form-switch">
																					<input class="form-check-input" type="checkbox" id="iStatus">
																					<label class="form-check-label" for="iStatus">Activo</label>
																				</div>
																				<input id="hdnIsatus" type="hidden" name="hdnIsatus" value="">
																				<input id="hdnImage" type="hidden" name="hdnImage" value="">
																				<input id="hdnIdStock" type="hidden" name="hdnIdStock" value="">
																			</div>
																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valStockProductEdit()">Agregar</span>
																		<button type="submit" class="btn-link btn_editStockProduct" name="btn_editStockProduct" style="display:none;">Product</button>
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
																<form method="post" action="<?php echo $helper->url("AdminStockProduct","create"); ?>"  enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3">
																				Producto
																				<select id="idProduct_new" name="idProduct_new" class="form-control">
																					<?php foreach($info_admin_product as $product) {?>
																						<option value="<?php echo $product->idProduct; ?>"><?php echo $product->vProduct; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Sucursal
																				<select id="idBranch_new" name="idBranch_new" class="form-control">
																					<?php foreach($info_admin_branch as $branch) {?>
																						<option value="<?php echo $branch->idBranch; ?>"><?php echo $branch->vBranch; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Talla
																				<select id="idSize_new" name="idSize_new" class="form-control">
																					<?php foreach($info_admin_size as $size) {?>
																						<option value="<?php echo $size->idSize; ?>"><?php echo $size->vSize; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Color
																				<select id="idColor_new" name="idColor_new" class="form-control">
																					<?php foreach($info_admin_color as $color) {?>
																						<option value="<?php echo $color->idColor; ?>"><?php echo $color->vColor; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				En inventario
                                            									<input id="stock_new" class="form-control" name="stock_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="3">
																			</div>
																			<div class="col-12 mb-3">
																				Precio
                                            									<input id="price_new" class="form-control" name="price_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="3">
																			</div>
																			<div class="col-12 mb-3">
																				Imagen (medidas recomendadas 600x778)
																				<input type="file" class="form-control-file" id="imageStock_new" name="imageStock_new">
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
																		<span class="btn btn-primary" onclick="valStockProductNew()">Agregar</span>
																		<button type="submit" class="btn-link btn_newStockProduct" name="btn_newStockProduct" style="display:none;">Product</button>
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