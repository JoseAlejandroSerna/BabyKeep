<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		<script>
			var info_quiz = '<?php echo json_encode($info_quiz); ?>';
			var JSON_quiz = JSON.parse(info_quiz);

			
			var info_UserTest = '<?php echo json_encode($info_UserTest); ?>';
			var JSON_UserTest = JSON.parse(info_UserTest);
		</script>
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Encuentas</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"view_questions"); ?>" style="display:none;">

						<input type="hidden" class="hdn_idQuiz_view" 	name="hdn_idQuiz_view" value=""/>
						<input type="hidden" class="hdn_vQuiz_view" 	name="hdn_vQuiz_view" value=""/>

						<button type="submit" class="btn_view" name="btn_view" style="display:none;">User</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url($view,"view_test"); ?>" style="display:none;">
						<input type="hidden" class="hdn_idQuiz_test" 	name="hdn_idQuiz_test" value=""/>
						<input type="hidden" class="hdn_vHourTest_test"	name="hdn_vHourTest_test" value=""/>
						<button type="submit" class="btn_view_test" name="btn_view_test" style="display:none;">User</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url($view,"delete"); ?>" style="display:none;">
						<input type="hidden" class="hdn_idQuiz_delete" 		name="hdn_idQuiz_delete" value=""/>
						<input type="hidden" class="hdn_hourTest_delete" 	name="hdn_hourTest_delete" value=""/>
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
                                                        	<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" style="color: #997c00 !important;" onclick="$('.btn_modalNew').click();">Agregar</span>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                    	<div class="col-12">
															<div class="bottompadding50" id="dTables">
                                    							<div class="card shadow">
                                        							<div class="card-body">
																		<div class="table-responsive">
																			<table id="example" class="display table" style="width:100%">
																				<thead>
																					<tr>
																						<th>Encuenta</th>
																						<th>Ver</th>
																					</tr>
																				</thead>
																				<tbody>
																				<?php foreach($info_quiz as $quiz) {?>
																					<tr>
																						<td><?php echo $quiz->vQuiz;?></td>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-warning float-left" onclick="View(<?php echo $quiz->idQuiz;?>)"><i data-feather="eye" data-toggle="tooltip" data-placement="top" title="Ver"></i></span>
																						</td>
																					</tr>
                                                                                <?php } ?>
																				</tbody>
																				<tfoot>
																					<tr>
																						<th>Encuenta</th>
																						<th>Ver</th>
																					</tr>
																				</tfoot>
																			</table>
																		</div>
                                        							</div>
                                    							</div>
                                							</div>
                                                    	</div>
                                                    </div>

													<br><br><br>

													<div class="row">
                                                    	<div class="col-12">
															<h3>Encuestas realizadas</h3>
															<div class="bottompadding50" id="dTables3">
                                    							<div class="card shadow">
                                        							<div class="card-body">
                                            							<div class="table-responsive">
                                                							<table id="export1234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    							<thead>
																					<tr>
																						<th>Usuario</th>
																						<th>Encuenta</th>
																						<th>Fecha</th>
																						<th>Hora</th>
																						<th></th>
																					</tr>
																				</thead>
																				<tbody>
																				<?php 
																				foreach($info_UserTest as $test) {
																					$vUser = "";
																					$vQuiz = "";
																					$idQuiz = "";
																					foreach($info_quiz as $quiz) {
																						if($test->idQuiz == $quiz->idQuiz) {
																							$vQuiz = $quiz->vQuiz;
																							$idQuiz = $quiz->idQuiz;
																						}
																					}
																					foreach($all_user as $user) {
																						if($user->idUser == $test->idUser) {
																							$vUser = $user->vUser;
																						}
																					}
																				?>
																						<tr>
																							<td><?php echo $vUser;?></td>
																							<td><?php echo $vQuiz;?></td>
																							<td><?php echo $test->vDate;?></td>
																							<td><?php echo $test->vHourTest;?></td>
																							<td>
																								<span class="waves-effect waves-dark btn btn-outline-light text-warning float-left" onclick="ViewTest(<?php echo $idQuiz;?>,'<?php echo $test->vHourTest;?>')"><i data-feather="eye" data-toggle="tooltip" data-placement="top" title="Ver"></i></span>
																						
																								<span class="waves-effect waves-dark btn btn-outline-light text-danger float-left" onclick="Delete(<?php echo $idQuiz;?>,'<?php echo $test->vHourTest;?>')"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																							</td>
																						</tr>
                                                                                <?php } ?>
																				</tbody>
																				<tfoot>
																					<tr>
																						<th>Usuario</th>
																						<th>Encuenta</th>
																						<th>Fecha</th>
																						<th>Hora</th>
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
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información? </div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_delete').click();">Eliminar</button>
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
                    </div>
                    <!-- ============================================================== -->

                </main>
            </div>
        </div>

        <?php include('footerAdmin.php') ?>
		<style>
			.dt-buttons{display:none;}
		</style>
	</body>
</html>