<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

			<script>
				var info_schedule = '<?php echo json_encode($info_schedule); ?>';
				var JSON_info_schedule = JSON.parse(info_schedule);
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
                                <h2 class="h4 mb-0 pageH1 ">Reporte de confección</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"update"); ?>" style="display:none;">
						<input type="hidden" class="hdn_iStatus" 			name="hdn_iStatus" value=""/>
						<input type="hidden" class="hdn_idSchedule_update" 	name="hdn_idSchedule_update" value=""/>

						<button type="submit" class="btn-link btn_update" name="btn_update" style="display:none;">Update</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url($view,"delete"); ?>" style="display:none;">
						<input type="hidden" class="hdn_idSchedule_delete" 	name="hdn_idSchedule_delete" value=""/>
						<button type="submit" class="btn-link btn_delete" 	name="btn_delete" style="display:none;">Delete</button>
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
                                                            							<th>Talla</th>
                                                            							<th>Color</th>
                                                            							<th>Hora</th>
                                                            							<th>Tipo de cita</th>
                                                            							<th>Total</th>
                                                            							<th>Adelanto</th>
                                                            							<th>Pendiente</th>
                                                            							<th>Fecha creación</th>
                                                            							<th>Fecha de evento</th>
																						<th>Ultima actualización</th>
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
																					$vTypeSchedule = "";
																					$vTypePayment = "";
																					$vStatus = "";

																					foreach($info_schedule as $schedule) 
																					{
																					if($schedule->idTypeSchedule == "3")
																					{
																							
																						$vUserAdmin = "Online";
																						$vClass = "";
																						$iAdvance = "0";
																						$iPending = "0";
																						$vHour = "";

																						if($schedule->vAdvance != "")
																						{
																							$iAdvance = intval($schedule->vAdvance);
																						}

																						$iPending = intval($schedule->vPrice) - intval($iAdvance);

																						foreach($all_user as $user) {
																							if($user->idUser == $schedule->idUser){ $vUser = $user->vUser;}
																						}
																						if($schedule->idUserAdmin != 0)
																						{
																							foreach($all_user as $user) {
																								if($user->idUser == $schedule->idUserAdmin){ $vUserAdmin = $user->vUser;}
																							}
																						}
																						foreach($info_admin_branch as $branch) {
																							if($branch->idBranch == $schedule->idBranch){ $vBranch = $branch->vBranch;}
																						}
																						foreach($info_admin_product as $product) {
																							if($product->idProduct == $schedule->idProduct){ $vProduct = $product->vProduct;}
																						}
																						foreach($info_admin_size as $size) {
																							if($size->idSize == $schedule->idSize){ $vSize = $size->vSize;}
																						}
																						foreach($info_admin_color as $color) {
																							if($color->idColor == $schedule->idColor){ $vColor = $color->vColor;}
																						}
																						foreach($info_admin_hour as $hour) {
																							if($hour->idHour == $schedule->idHour){ $vHour = $hour->vHour;}
																						}
																						foreach($info_admin_type_schedule as $type_schedule) {
																							if($type_schedule->idTypeSchedule == $schedule->idTypeSchedule){ $vTypeSchedule = $type_schedule->vTypeSchedule;}
																						}

																						switch($schedule->iStatus)
																						{
																							case "0":
																								$vStatus = "Programada";
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
																						<td><?php echo $schedule->idSchedule;?></td>
																						<td><?php echo $vUser;?></td>
																						<td><?php echo $vUserAdmin;?></td>
																						<td><?php echo $vBranch;?></td>
																						<td><?php echo $vSize;?></td>
																						<td><?php echo $vColor;?></td>
																						<td><?php echo $vHour;?></td>
																						<td><?php echo $vTypeSchedule;?></td>
																						<td><?php echo "$".$schedule->vPrice;?></td>
																						<td><?php echo "$".$iAdvance;?></td>
																						<td><?php echo "$".$iPending;?></td>
																						<td><?php echo $schedule->vDateCreation;?></td>
																						<td><?php echo $schedule->vDateEvent;?></td>
																						<td><?php echo $schedule->vDateUpdate;?></td>
                                                            							<?php if ($permissions_edit) {?>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $schedule->idSchedule;?>,'<?php echo $vUser;?>','<?php echo $vUserAdmin;?>','<?php echo $vBranch;?>','<?php echo $vProduct;?>','<?php echo $vSize;?>','<?php echo $vColor;?>','<?php echo $vHour;?>','<?php echo $vTypeSchedule;?>','<?php echo $schedule->vPrice;?>','<?php echo $schedule->vAvance;?>',<?php echo $iPending;?>,'<?php echo $schedule->vDateEvent;?>','<?php echo $schedule->vDateDelivery;?>')"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-rigth" onclick="Delete(<?php echo $schedule->idSchedule;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																						<?php }?>
																					</tr>
                                                                                <?php
																				}
																				} ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>#</th>
                                                            							<th>Socio</th>
                                                            							<th>Vendedor</th>
                                                            							<th>Sucursal</th>
                                                            							<th>Talla</th>
                                                            							<th>Color</th>
                                                            							<th>Hora</th>
                                                            							<th>Tipo de cita</th>
                                                            							<th>Total</th>
                                                            							<th>Adelanto</th>
                                                            							<th>Pendiente</th>
                                                            							<th>Fecha creación</th>
                                                            							<th>Fecha de evento</th>
																						<th>Ultima actualización</th>
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

                                                                			<p style="display:none">Modelo: <b id="modelo"></b></p>
																			
                                                                			<p>Talla: <b id="talla"></b></p>
																			
                                                                			<p>Color: <b id="color"></b></p>
																			
                                                                			<p>Hora: <b id="hora"></b></p>
																			
                                                                			<p>Tipo de cita: <b id="tipoCita"></b></p>
																			
                                                                			<p>Total: <b id="total"></b></p>
																			
                                                                			<p>Adelanto: <b id="adelanto"></b></p>
																			
                                                                			<p>Pendiente: <b id="pendiente"></b></p>
																			
                                                                			<p>Fecha de evento: <b id="fechaEvento"></b></p>
																			
                                                                			<p style="display:none">Fecha de regreso: <b id="fechaRegreso"></b></p>
                                                            			</div>

																		<div class="col-12 mb-3 contRent">
																			<select id="iStatus" name="iStatus" class="form-control">
																				<option value="0">Programada</option>
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