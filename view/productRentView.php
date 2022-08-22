<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>

            <script>
                var varView = '<?php echo $view; ?>';
                var varError = '<?php echo $schedule["seccion1_error"]; ?>';
                var varErrorNotAvailable = '<?php echo $schedule["seccion1_not_available"]; ?>';

                var info_schedule = '<?php echo json_encode($info_schedule); ?>';
			    var JSON_schedule = JSON.parse(info_schedule);

                var info_cp = '<?php echo json_encode($info_cp); ?>';
                var JSON_cp = JSON.parse(info_cp);
                
            </script>
            <section id="wrapper" class="paddingHeaderCatalog">
                <div id="inner-wrapper" class="container" style="padding-top: 50px;">
                    <aside id="notifications"></aside>
                    <div id="content-wrapper" class="js-content-wrapper">
                        <section id="main">
                            <div id="product-preloader"><i class="fa fa-circle-o-notch fa-spin"></i></div>
                            <div id="main-product-wrapper" class="product-container js-product-container">
                                <div class="row product-info-row">
                                    <div class="col-md-5 col-product-image">
                                        <div class="images-container js-images-container">
                                            <div class="product-cover">
                                                <ul class="product-flags js-product-flags">
                                                    <li class="product-flag new name-modal"></li>
                                                </ul>
                                                <div id="product-images-large" class="product-images-large swiper-container column-images">
                                                    <div id="swiper-wrapper-column-images" class="swiper-wrapper">
                                                        <div class="product-lmage-large swiper-slide">                 
                                                            <img alt="Baby Keep" title="Baby Keep" width="605" height="782" src="" data-idproduct="" class="img-fluid swiper-lazy js-lazy-product-image entered loaded img-modal" data-ll-status="loaded">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="after-cover-tumbnails text-center"></div>
                                        <div class="after-cover-tumbnails2 mt-4"></div>
                                    </div>
                                    <div class="col-md-7 col-product-info">
                                        <div id="col-product-info">
                                            <div class="product_header_container clearfix">
                                                <h1 class="h1 page-title">
                                                    <span class="name-modal"></span>
                                                </h1>
                                                <div class="product-prices js-product-prices">
                                                    <div class="">
                                                        <div>
                                                            <span class="current-price">
                                                                <span class="product-price current-price-value price-modal" data-price="" content=""></span>
                                                            </span>
                                                        </div>              
                                                    </div>
                                                    <div class="tax-shipping-delivery-label"></div>
                                                </div>
                                            </div>
                                            <div class="product-information">
                                                <div id="product-description-short-133" class="rte-content product-description">
                                                    <p class="description-modal"></p>
                                                </div>
                                                
                                                <div class="product-actions js-product-actions">
                                                    <div class="product-add-to-cart pt-3 js-product-add-to-cart">
                                                        
                                                        <form method="post" action="<?php echo $helper->url($view,"create"); ?>"  enctype="multipart/form-data">
                                                        
                                                            <div class="product-variants js-product-variants">
                                                                <!--Branch-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3" style="display: inline-block;">
                                                                    <span class="form-control-label">Sucursal</span>
                                                                    <div class="custom-select2 col-6">
                                                                        <select id="branch-modal" aria-label="Branch" data-product-attribute="1" name="branch-modal" class="form-control form-control-select">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--Color-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal  contColor">
                                                                    <span class="form-control-label"><?php echo $product["color"]; ?></span>
                                                                    <ul id="color">
                                                                    </ul>
                                                                </div>
                                                                <!--Size-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contSize">
                                                                    <span class="form-control-label"><?php echo $product["size"]; ?></span>
                                                                    <div class="custom-select2 col-6">
                                                                        <select id="size-modal" aria-label="Size" data-product-attribute="1" name="size-modal" class="form-control form-control-select">
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contSize">
                                                                    <div class="col-6"></div>
                                                                </div>
                                                                
                                                                <!--Date-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contDate">
                                                                    <span class="form-control-label"><?php echo $schedule["seccion1_event_date"]; ?></span>
                                                                    <div class="custom-select2 col-6">
                                                                        <input type="date" id="date_rent" name="date_rent" class="form-control date_rent" value="">
                                                                    </div>
                                                                </div>
                                                                <!--Date delivery-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contDate">
                                                                    <span class="form-control-label"><?php echo $schedule["seccion1_date_delivery"]; ?></span>
                                                                    <div class="custom-select2 col-6">
                                                                        <input type="date" id="dateFin_rent" name="dateFin_rent" disabled class="form-control" value="">
                                                                    </div>
                                                                </div>
                                                                <!--INE-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contSchedule">
                                                                    <span class="form-control-label"><?php echo $schedule["seccion1_ine"]; ?></span>
                                                                    <div class="custom-select2 col-6">
                                                                        <input type="file" class="form-control-file" id="ine" name="ine">
                                                                    </div>
                                                                </div>
                                                                <!--Address Proof-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contSchedule">
                                                                    <span class="form-control-label"><?php echo $schedule["seccion1_address_proof"]; ?></span>
                                                                    <div class="custom-select2 col-6">
                                                                        <input type="file" class="form-control-file" id="address_proof" name="address_proof">
                                                                    </div>
                                                                </div>
                                                                <!--Advance-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contSchedule">
                                                                    <span class="form-control-label"><?php echo $schedule["seccion1_advance"]; ?></span>
                                                                    <div class="custom-select2 col-6">
                                                                        <input id="vAdvance" class="form-control" name="vAdvance" type="text" value="0" disabled >
                                                                    </div>
                                                                </div>
                                                                <!--Button-->
                                                                <div class="col-5 clearfix product-variants-item product-variants-item-3  contModal contSchedule">
                                                                    <span class="form-control-label"><br></span>
                                                                    <div class="add">
                                                                        <p class="messageLogin"><?php echo $schedule["seccion1_message"]; ?></p>
                                                                        <p class="messageErrorCp"><?php echo $schedule["seccion1_message_error_cp"]; ?></p>
                                                                        <span class="viewShedule btn btn-primary form-control-submit" onclick="valSchedule()"><?php echo $schedule["seccion1_button"]; ?></span>
                                                                        <input class="btn btn-primary form-control-submit btnSend" type="submit" value="<?php echo $schedule["seccion1_button"]; ?>" style="display:none">
                                                                    </div>
                                                                </div>
                                                                
                                                                <p class="messageError"></p>
                                                                
                                                                <!--HIDDEN-->
																<input type="hidden" class="hdn_vDateCreation" 	name="hdn_vDateCreation" value="<?php echo date('Y-m-d');?>"/>
                                                                <input type="hidden" class="hdn_dateFin" name="hdn_dateFin" value=""/>
                                                                <input type="hidden" class="hdn_date" name="hdn_date" value=""/>
                                                                <input type="hidden" class="hdn_price" name="hdn_price" value=""/>
                                                                <input type="hidden" class="hdn_advance" name="hdn_advance" value=""/>
                                                                <input type="hidden" class="hdn_idColor" name="hdn_idColor" value=""/>
                                                                <input type="hidden" class="hdn_idTypeSchedule" name="hdn_idTypeSchedule" value="1"/>
                                                                <input type="hidden" class="hdn_idProduct" name="hdn_idProduct" value="1"/>
                                                                
                                                                <!---->
                                                                <style>
                                                                    .heading{font-size: 40px;margin-top: 35px;margin-bottom: 30px;padding-left: 20px}.card{border-radius: 10px !important;margin-top: 60px;margin-bottom: 60px}.form-card{margin-left: 20px;margin-right: 20px}.form-card input, .form-card textarea, .btn-pay,.btn-pay-span{padding: 10px 15px 5px 15px;border: none;border: 1px solid lightgrey;border-radius: 6px;margin-bottom: 25px;margin-top: 2px;width: 100%;box-sizing: border-box;font-family: arial;color: #2C3E50;font-size: 14px;letter-spacing: 1px}.form-card input:focus, .form-card textarea:focus{-moz-box-shadow: 0px 0px 0px 1.5px #997c00 !important;-webkit-box-shadow: 0px 0px 0px 1.5px #997c00 !important;box-shadow: 0px 0px 0px 1.5px #997c00 !important;font-weight: bold;border: 1px solid #997c00;outline-width: 0}.input-group{position:relative;width:100%;overflow:hidden}.input-group input{position:relative;height:80px;margin-left: 1px;margin-right: 1px;border-radius:6px;padding-top: 30px;padding-left: 25px}.input-group label{position:absolute;height: 24px;background: none;border-radius: 6px;line-height: 48px;font-size: 15px;color: gray;width:100%;font-weight:100;padding-left: 25px}input:focus + label{color: #000}.btn-pay,.btn-pay-span{background-color: #997c00;height: 60px;color: #ffffff !important;font-weight: bold}.btn-pay:hover,.btn-pay-span:hover{background-color: #997c00}.fit-image{width: 100%;object-fit: cover}img{border-radius: 5px}.radio-group{position: relative;margin-bottom: 25px}.radio{display:inline-block;border-radius: 6px;box-sizing: border-box;border: 2px solid lightgrey;cursor:pointer;margin: 12px 25px 12px 0px}.radio:hover{box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.2)}.radio.selected{box-shadow: 0px 0px 0px 1px rgba(0, 0, 155, 0.4);border: 2px solid #997c00}.label-radio{font-weight: bold;color: #000000}
                                                                </style>
                                                                </br></br></br>
                                                                <div class="form-card contPay"> 
                                                                    <input type="hidden" name="token_id" id="token_id">
                                                                    <input type="hidden" name="use_card_points" id="use_card_points" value="false">
                                                                    <input type="hidden" name="hdnTotal" id="hdnTotal" value="0">

                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <div class="input-group"> 
                                                                                <input type="text" data-openpay-card="holder_name" id="name" placeholder="John Doe" autocomplete="off" data-openpay-card="holder_name" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)"> <label><?php echo $pay["name"]; ?></label> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <div class="input-group"> 
                                                                            <input type="text" autocomplete="off" data-openpay-card="card_number" id="c_number" placeholder="0000 0000 0000 0000" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" minlength="16" maxlength="16"><label><?php echo $pay["card"]; ?></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="input-group"> 
                                                                                        <input type="text" placeholder="MM" data-openpay-card="expiration_month" id="c_month" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" minlength="2" maxlength="2" class="exp"> <label>Mes</label> 
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="input-group">
                                                                                        <input type="text" placeholder="YY" data-openpay-card="expiration_year" id="c_year" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" minlength="2" maxlength="2"> <label>Año</label> 
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="input-group">
                                                                                        <input type="text" placeholder="&#9679;&#9679;&#9679;" autocomplete="off" data-openpay-card="cvv2" id="c_cvv" minlength="3" maxlength="3"><label>CVV</label> 
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <div class="input-group"> 
                                                                                <p><b>Comisión:</b> </p><p id="comission"></p> 
                                                                            </div>
                                                                            <div class="input-group"> 
                                                                                <p><b>Subotal:</b> </p><p id="subtotal"></p> 
                                                                            </div>
                                                                            <div class="input-group"> 
                                                                                <p><b>Envio:</b> </p><p id="sending"></p> 
                                                                            </div>
                                                                            <div class="input-group"> 
                                                                                <p><b>Total:</b> </p><p id="total"></p> 
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row justify-content-center">
                                                                        <div class="col-md-12"> 
                                                                            <span class="btn btn-pay-span placeicon" onclick="valCard()"><?php echo $pay["pay"]; ?></span>
                                                                            <input type="submit" value="<?php echo $pay["pay"]; ?>"name="btn_cart_products" class="btn btn-pay placeicon" style="display:none;"> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!---->
                                                            </div>
                                                        </form>
                                                        <p class="product-minimal-quantity js-product-minimal-quantity"></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs product-tabs">
                                    <a name="products-tab-anchor" id="products-tab-anchor"> &nbsp;</a>
                                    <ul id="product-infos-tabs" class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#description">
                                                <?php echo $product["description"]; ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="product-infos-tabs-content" class="tab-content">
                                        <div class="tab-pane in active" id="description">
                                            <div class="product-description">
                                                <div class="rte-content">
                                                    <p class="descriptionDetail-modal"></p>
                                                </div>             
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="product-details-tab">
                                            
                                            <div class="product-manufacturer  float-right">
                                                <label class="label">Brand</label>
                                                <a href="https://iqit-commerce.com/ps17/demo14/en/1_ankos">
                                                    <img src="https://d293e64rvqt2z5.cloudfront.net/ps17/demo14/img/m/1.jpg" class="img-fluid  manufacturer-logo" alt="Ankos" loading="lazy">
                                                </a>
                                            </div>
                                            <div class="product-reference">
                                                <label class="label">Reference </label>
                                                <span>demo_7</span>
                                            </div>
                                            <div class="product-out-of-stock"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="iqit-accordion" id="product-infos-accordion-mobile" role="tablist" aria-multiselectable="true"></div>
                            </div>


                            <div class="modal fade js-product-images-modal" id="product-modal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="easyzoom easyzoom-modal">
                                                <a href="https://d293e64rvqt2z5.cloudfront.net/ps17/demo14/451-thickbox_default/printed-chiffon-dress.jpg" class="js-modal-product-cover-easyzoom" rel="nofollow">
                                                    <img class="js-modal-product-cover product-cover-modal img-fluid" width="605" height="782" src="https://d293e64rvqt2z5.cloudfront.net/ps17/demo14/451-large_default/printed-chiffon-dress.jpg" alt="Printed Chiffon Dress">
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <footer class="page-footer"></footer>
                        </section>
                    </div>
                </div>
            </section>

            <?php include('footer.php') ?>
        </main>
        
        <?php include('linksFooter.php') ?>

    </body>
</html>