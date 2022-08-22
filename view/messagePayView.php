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

			var JSON_products = JSON.parse(info_admin_product);
			var JSON_stock_products = JSON.parse(info_admin_stock_product);
			var JSON_branch = JSON.parse(info_admin_branch);
			var JSON_type_products = JSON.parse(info_admin_type_product);
			var JSON_type_purchase = JSON.parse(info_admin_type_purchase);
			var JSON_color = JSON.parse(info_admin_color);
			var JSON_size = JSON.parse(info_admin_size);

			var all_user = '<?php echo json_encode($all_user); ?>';
    		var JSON_all_user = JSON.parse(all_user);

			var info_promotion = '<?php echo json_encode($info_promotion); ?>';
    		var JSON_promotion = JSON.parse(info_promotion);

			var info_card = '<?php echo json_encode($info_card); ?>';
    		var JSON_card = JSON.parse(info_card);
			
			var info_kidByCard = '<?php echo json_encode($info_kidByCard); ?>';
    		var JSON_kidByCard = JSON.parse(info_kidByCard);
			
			var idAdmin = '<?php echo $_SESSION['idUser'] ?>';
			// Send
			var strComission = '<?php echo $_SESSION['vCommission'] ?>';
			var strSending = '<?php echo $_SESSION['vSending'] ?>';

			var commission = 0;
			var commission_percentage = parseFloat(strComission);
			var sending = parseFloat(strSending);
		</script>
		
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
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
													<div class="margin-bottom ">
														<div class="row">
															<div class="col-12 mb-3">
																<h3><?php echo $vMessagePay; ?></h3>
															</div>
															<div class="col-12 mb-3">
																<a href="javascript:history.back()" class="btn btn-primary">Volver</a>
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
			.errorForm{border: 1px solid red;}
			p.messageError {color: red;}
			.table td, .table th {text-align: center;}
		</style>
	</body>
</html>