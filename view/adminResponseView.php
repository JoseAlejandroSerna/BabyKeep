<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		<script>
			var info_questions = '<?php echo json_encode($info_questions); ?>';
			var JSON_questions = JSON.parse(info_questions);

			
			var info_userTest = '<?php echo json_encode($info_userTest); ?>';
			var JSON_userTest = JSON.parse(info_userTest);

			var idQuiz = '<?php echo json_encode($idQuiz); ?>';
			var JSON_idQuiz	 = JSON.parse(idQuiz);

			var info_quiz = '<?php echo json_encode($info_quiz); ?>';
			var JSON_info_quiz	 = JSON.parse(info_quiz);

			var vHourTest = '<?php echo json_encode($vHourTest); ?>';
			var JSON_vHourTest = JSON.parse(vHourTest);
		</script>
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">
								<?php 
									$vQuiz = "";
									foreach($info_quiz as $quiz) {
										if($quiz->idQuiz == $idQuiz)
										{
											$vQuiz = $quiz->vQuiz;
										}
									}

									?>
									<?php echo $vQuiz; ?>
								</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="container-fluid mt-n10 ">
                    	<div class="svgStyle toppadding50 bottompadding50">
                        	<div class="row margin-bottom">
                            	<div class="col-xl-12">
                                	<div class="row">
                                    	<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    		<div class="card shadow margin-bottom">
                                            	<div class="card-body">

                                                    <div class="row">
														<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
															<div class="card shadow margin-bottom">
																<div class="card-body">
																	<div class="margin-bottom ">
																		<div class="row">
																			<?php 
																			$vUser = "";
																			$vEmail = "";
																			$vPhone = "";
																			foreach($info_userTest as $test) {
																				foreach($all_user as $user) {
																					if($user->idUser == $test->idUser)
																					{
																						$vUser = $user->vUser;
																						$vEmail = $user->vEmail;
																						$vPhone = $user->vPhone;
																					}
																				}
																			} ?>
																			<div class="col-12 mb-3">
																				<p><?php echo $vUser;?></p>
																				<p><a href="mailto:<?php echo $vEmail;?>" target="_blank"><?php echo $vEmail;?></a></p>
																				<p>
																					<a href="https://wa.me/52<?php echo $vPhone;?>" target="_blank" class="waves-effect waves-dark btn btn-outline-light text-success float-left">
																						<i data-feather="phone" data-toggle="tooltip" data-placement="top" title="Enviar whatsapp"></i>
																					</a>
																				</p>
																			</div>
																			<?php 
																			$vQuiestions = "";
																			foreach($info_userTest as $test) {
																				foreach($info_questions as $questions) {
																					if($test->idQuestions == $questions->idQuestions)
																					{
																						$vQuiestions = $questions->vQuestions;
																					}
																				}
																			?>
																				<div class="col-12 mb-3">
																					<?php echo $vQuiestions;?>
																					<input class="form-control" type="text" value="<?php echo $test->vUserTest;?>" disabled>
																				</div>
																			<?php } ?>
																			<?php 
																			$vCommentTest = "";
																			foreach($info_commentTest as $commentTest) {
																				$vCommentTest = $commentTest->vCommentTest;
																			}
																			?>
																			<div class="col-12 mb-3">
																				<textarea name="commentTest" class="form-control" rows="10" cols="50" disabled><?php echo $vCommentTest;?></textarea>
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