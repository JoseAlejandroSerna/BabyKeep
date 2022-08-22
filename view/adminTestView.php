<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		<script>
			var info_questions = '<?php echo json_encode($info_questions); ?>';
			var JSON_questions = JSON.parse(info_questions);
			var idQuiz = idQuiz;
			
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
                                <h2 class="h4 mb-0 pageH1 "><?php echo $vQuiz; ?></h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"create"); ?>" style="display:none;">

						<input type="hidden" class="hdn_strTest_create" 	name="hdn_strTest_create" value=""/>
						<input type="hidden" class="hdn_idUser_create" 		name="hdn_idUser_create" value=""/>
						<input type="hidden" class="hdn_idQuiz_create" 		name="hdn_idQuiz_create" value="<?php echo $idQuiz; ?>"/>
						<input type="hidden" class="hdn_hourTest" 			name="hdn_hourTest" value=""/>
						<input type="hidden" class="hdn_commentTest" 		name="hdn_commentTest" value=""/>
						
						<button type="submit" class="btn_create" name="btn_create" style="display:none;">User</button>
					</form>

					<div class="container-fluid mt-n10 ">
                    	<div class="svgStyle toppadding50 bottompadding50">
                        	<div class="row margin-bottom">
                            	<div class="col-xl-12">

                                	<div class="row">
                                    	<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    		<div class="card shadow margin-bottom">
												<div class="card-body">
													<div class="margin-bottom ">
														<div class="row">
															<div class="col-6 mb-3">
																<input id="email" class="form-control" type="text" value="">
																</br>
																<span class="btn btn-primary" onclick="valUser()">Realizar encuenta</span>
															</div>
															<div class="col-6 mb-3">
																<p>Ingrese su usuario, en caso de lo contrario <a href="<?php echo $helper->url("Account","index"); ?>">Crear una cuenta</a></p>
															</div>
														</div>
														<div class="row contQuiz">
															<?php
																$cont = 0; 
																foreach($info_questions as $questions) {
																	$cont++;
															?>
																<div class="col-12 mb-3">
																	<?php echo $questions->vQuestions;?>
																	<input id="test_<?php echo $questions->idQuestions;?>" class="form-control test_<?php echo $cont;?>" name="test_<?php echo $questions->idQuestions;?>" type="text" value="" maxlength="500" style="display:none;">
																	<!---->
																	<div class="rating">
																		<form class="rating-form" id="form_test_<?php echo $questions->idQuestions;?>">

																			<label>
																				<input type="radio" name="test_<?php echo $questions->idQuestions;?>_rating" data-count="test_<?php echo $cont;?>" class="super-happy" value="5" />
																				<svg viewBox="0 0 24 24"><path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
																			</label>

																			<label>
																				<input type="radio" name="test_<?php echo $questions->idQuestions;?>_rating" data-count="test_<?php echo $cont;?>" class="happy" value="4" />
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" /></svg>
																			</label>

																			<label>
																				<input type="radio" name="test_<?php echo $questions->idQuestions;?>_rating" data-count="test_<?php echo $cont;?>" class="neutral" value="3" />
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" /></svg>
																			</label>

																			<label>
																				<input type="radio" name="test_<?php echo $questions->idQuestions;?>_rating" data-count="test_<?php echo $cont;?>" class="sad" value="2" />
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" /></svg>
																			</label>

																			<label>
																				<input type="radio" name="test_<?php echo $questions->idQuestions;?>_rating" data-count="test_<?php echo $cont;?>" class="super-sad" value="1" />
																				<svg viewBox="0 0 24 24"><path d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg>
																			</label>

																		</form>
																	</div>
																	<!---->
																</div>
															<?php } ?>
																<div class="col-12 mb-3">
																	Dejanos tu comentario
																	<textarea id="commentTest" name="commentTest" class="form-control" rows="10" cols="50"></textarea>
																</div>
															
															<div class="col-12 mb-3">
																<p class="messageError"></p>
															</div>
															<div class="col-12 mb-3 btnpay">
																<span class="btn btn-primary" onclick="valForm()">Guardar</span>
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
		.rating {
		padding: 0.4rem 0.4rem 0.1rem 0.4rem;
		border-radius: 2.2rem;
		}

		svg {
		fill: rgb(242, 242, 242);
		height: 3.6rem;
		width: 3.6rem;
		margin: 0.2rem;
		}

		.rating-form-2 svg {
		height: 3rem;
		width: 3rem;
		margin: 0.5rem;
		}

		#radios label {
		position: relative;
		}

		input[type="radio"] {
		position: absolute;
		opacity: 0;
		}

		input[type="radio"] + svg {
		-webkit-transition: all 0.2s;
		transition: all 0.2s;
		}

		input + svg {
		cursor: pointer;
		}

		input[class="super-happy"]:hover + svg,
		input[class="super-happy"]:checked + svg,
		input[class="super-happy"]:focus + svg {
		fill: rgb(0, 109, 217);
		}

		input[class="happy"]:hover + svg,
		input[class="happy"]:checked + svg,
		input[class="happy"]:focus + svg {
		fill: rgb(0, 204, 79);
		}

		input[class="neutral"]:hover + svg,
		input[class="neutral"]:checked + svg,
		input[class="neutral"]:focus + svg {
		fill: rgb(232, 214, 0);
		}

		input[class="sad"]:hover + svg,
		input[class="sad"]:checked + svg,
		input[class="sad"]:focus + svg {
		fill: rgb(229, 132, 0);
		}

		input[class="super-sad"]:hover + svg,
		input[class="super-sad"]:checked + svg,
		input[class="super-sad"]:focus + svg {
		fill: rgb(239, 42, 16);
		}
		.svgStyle svg {
			fill: #0102164d;
			color: #282957;
		}
		</style>
	</body>
</html>