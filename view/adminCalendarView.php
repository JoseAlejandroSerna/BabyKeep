<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

		<script>
			var info_admin_product = '<?php echo json_encode($info_admin_product); ?>';
			var info_admin_stock_product = '<?php echo json_encode($info_admin_stock_product); ?>';
			var info_admin_branch = '<?php echo json_encode($info_admin_branch); ?>';
			var info_admin_type_product = '<?php echo json_encode($info_admin_type_product); ?>';
			var info_admin_type_purchase = '<?php echo json_encode($info_admin_type_purchase); ?>';
			var info_admin_color = '<?php echo json_encode($info_admin_color); ?>';
			var info_admin_size = '<?php echo json_encode($info_admin_size); ?>';
			var info_admin_hour = '<?php echo json_encode($info_admin_hour); ?>';
			
			var JSON_products = JSON.parse(info_admin_product);
			var JSON_stock_products = JSON.parse(info_admin_stock_product);
			var JSON_branch = JSON.parse(info_admin_branch);
			var JSON_type_products = JSON.parse(info_admin_type_product);
			var JSON_type_purchase = JSON.parse(info_admin_type_purchase);
			var JSON_color = JSON.parse(info_admin_color);
			var JSON_size = JSON.parse(info_admin_size);
			var JSON_hour = JSON.parse(info_admin_hour);
			
			var info_schedule = '<?php echo json_encode($info_schedule); ?>';
			var JSON_schedule = JSON.parse(info_schedule);
			
			var all_user = '<?php echo json_encode($all_user); ?>';
    		var JSON_all_user = JSON.parse(all_user);
		</script>
		
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">
									Calendario
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"update"); ?>" style="display:none;">

						<input type="hidden" class="hdn_idSchedule" 	name="hdn_idSchedule" value=""/>
						<input type="hidden" class="hdn_vAdvance" 		name="hdn_vAdvance" value=""/>
						<input type="hidden" class="hdn_iStatus" 		name="hdn_iStatus" value=""/>
						<input type="hidden" class="hdn_vDateUpdate" 	name="hdn_vDateUpdate" value="<?php echo date('Y-m-d');?>"/>

						<button type="submit" class="btn-link btn_update" name="btn_update" style="display:none;">Cart</button>
					</form>
					<div class="row margin-bottom">
						<div class="col-xl-12">
							<div class="row">
								<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="card shadow margin-bottom">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-3">
													<div class="card-body">
														<h4 class="card-title m-t-10">Estatus de citas</h4>
														<div class="row">
															<div class="col-md-12">
																<div id="external-events" class="mb-2">
																	<div class="status_schedule estatus-0" data-class="bg-info">Programada</div>
																	<div class="status_schedule estatus-1" data-class="bg-success">En proceso</div>
																	<div class="status_schedule estatus-2" data-class="bg-success">Finalizada</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-9">
													<div id='calendar-container'>
														<div id='calendar'></div>
													</div>
												</div>
											</div>

											<button type="button" class="btn btn-primary btn_info_schedule" data-toggle="modal" data-target="#exampleModal4" style="display:none;">Zoom In</button>

											<div class="modal animated zoomIn" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
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
																	<p>Nombre:			<b><span id="name"></span></b></p>
																	<p>Telefono:		<b><span id="phone"></span></b></p>
																	<p>Tipo de cita:	<b><span id="typeSchedule"></span></b></p>
																	<p>Fecha en que se realizo pedido:<b><span id="vDateCreation"></span></b></p>
																	<p>Sucursal:		<b><span id="vBranch"></span></b></p>
																	<p>Fecha de renta:	<b><span id="vDateEvent"></span></b></p>
																</div>
																<div class="col-12 mb-3 contRent">
																	<p>Fecha de entrega:<b><span id="vDateDelivery"></span></b></p>
																	<p>Modelo:<b><span id="vProduct"></span></b></p>
																	<p>Color:<b><span id="vColor" class="vColor"></span></b></p>
																	<p>Talla:<b><span id="vSize" class="vSize"></span></b></p>
																	<p>Identificación:
																		<img id="vImageINE" class="imgModal" src="">
																	</p>
																</div>

																<div class="col-12 mb-3 contMaking">
																	<p>Hora:<b><span id="vHour"></span></b></p>
																	<p>Modelo de referencia:
																		<img id="vImageProduct" class="imgModal" src="">
																	</p>
																	<p>Color:<b><span id="vColor" class="vColor"></span></b></p>
																	<p>Talla:<b><span id="vSize" class="vSize"></span></b></p>
																	<p>Edad:<b><span id="iAge"></span></b></p>
																	<p>Precio Minimo:<b><span id="vMinPrice"></span></b></p>
																	<p>Precio Maximo:<b><span id="vMaxPrice"></span></b></p>
																</div>

																<div class="col-12 mb-3">
																	<p>Comprobante de domicilio:
																		<img id="vImageAddressProof" class="imgModal" src="">
																	</p>
																</div>

																<div class="col-12 mb-3">
																	<p>Precio:<b><span id="vPrice"></span></b></p>
																	<p>Anticipo:<b><span id="vAdvance"></span></b></p>
																</div>

																<div class="col-12 mb-3">
																	<input type="text" id="txt_vAdvance" name="txt_vAdvance" class="form-control" placeholder="Anticipo" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="5">
																</div>

																<div class="col-12 mb-3">
																	<select id="iStatus" name="iStatus" class="form-control">
																		<option value="0">Cita programada</option>
																		<option value="1">En proceso</option>
																		<option value="2">Finalizada</option>
																	</select>
																</div>

															</div>
														</div>

														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
															<button type="button" class="btn btn-primary" onclick="valCalendar()">Actualizar</button>
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
		
		<script>
			
			var list_schedule = [];
			var vUser = "";
			var vBranch = "";
			var vProduct = "";
			var vColor = "";
			var vSize = "";

			$.each(JSON_schedule, function(j, schedule){
				$.each(JSON_all_user, function(i, user){
					if(user.idUser == schedule.idUser){	vUser = user.vUser;	}
				});
				
				if(!list_schedule.find(o => o.groupId === schedule.idSchedule))
					list_schedule.push({
						"groupId":schedule.idSchedule,
						"title":vUser,
						"start":schedule.vDateEvent,
						"end":schedule.vDateDelivery,
						"idUser":schedule.idUser,
						"idUserAdmin":schedule.idUserAdmin,
						"idBranch":schedule.idBranch,
						"vBranch":vBranch,
						"idTypeSchedule":schedule.idTypeSchedule,
						"idHour":schedule.idHour,
						"idProduct":schedule.idProduct,
						"vProduct":vProduct,
						"idColor":schedule.idColor,
						"vColor":vColor,
						"idSize":schedule.idSize,
						"vSize":vSize,
						"vPrice":schedule.vPrice,
						"vAdvance":schedule.vAdvance,
						"iCheckEvent":schedule.iCheckEvent,
						"iAge":schedule.iAge,
						"vMinPrice":schedule.vMinPrice,
						"vMaxPrice":schedule.vMaxPrice,
						"vDateCreation":schedule.vDateCreation,
						"vImageINE":schedule.vImageINE,
						"vImageProduct":schedule.vImageProduct,
						"vImageAddressProof":schedule.vImageAddressProof,
						"iStatus":schedule.iStatus
					});
			});

			document.addEventListener('DOMContentLoaded', function () {

				var Calendar = FullCalendar.Calendar;
				var Draggable = FullCalendarInteraction.Draggable;
				var containerEl = document.getElementById('external-events');
				var calendarEl = document.getElementById('calendar');
				var checkbox = document.getElementById('drop-remove');
				
				new Draggable(containerEl, {
					itemSelector: '.fc-event',
					eventData: function (eventEl) {
						return {
							title: eventEl.innerText
						};
					}
				});

				var today = new Date();
				var dd = String(today.getDate()).padStart(2, '0');
				var mm = String(today.getMonth() + 1).padStart(2, '0');
				var yyyy = today.getFullYear();
				today = yyyy + '-' +mm + '-' + dd;

				var calendar = new FullCalendar.Calendar(calendarEl, {

					plugins: ['interaction', 'dayGrid', 'timeGrid'],
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'dayGridMonth,timeGridWeek,timeGridDay'
					},

					defaultDate:  today,
					navLinks: true,
					selectable: true,
					selectMirror: true,

					select: function (arg) {

						//limpiaModal();

						//$(".btn_info_schedule").click();
					},

					editable: true,
					eventLimit: true,
					events: list_schedule
				});

				calendar.render();

			});

		</script>

		
		<style>
			.muestraNuevaFecha{display:none;}
			.estatus-1 {background-color: #e3e3e3 !important;}
			.estatus-2 {background-color: lightgreen !important;}
			.estatus-0 {background-color: red !important;}
			.external-events {
				text-align: center;
				color: black;
				font-weight: bold;
			}
			.status_schedule {
				text-align: center;
				color: black;
				font-weight: bold;
				font-size: .85em;
				line-height: 1.4;
				border: 3px solid #fff!important;
				border-radius: 10px!important;
			}
			.imgModal {width: 100%;}
			.errorForm {border: 1px red solid;}
		</style>

	</body>
</html>