<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>

            <script>
                var varView = '<?php echo $view; ?>';
                var varError = '<?php echo $schedule["seccion1_error"]; ?>';
                var service_get_available_time = "<?php echo $helper->url($view,"get_available_time"); ?>";
                var txtDefaultSelectSize = "<?php echo $schedule["seccion1_text_size"]; ?>";
                var txtDefaultSelectModel = "<?php echo $schedule["seccion1_text_select_model"]; ?>";
                var txtDefaultSelectColor = "<?php echo $schedule["seccion1_text_color"]; ?>";
                var txtDefaultSelectHour = "<?php echo $schedule["seccion1_text_hour"]; ?>";

                var info_schedule = '<?php echo json_encode($info_schedule); ?>';
			    var JSON_schedule = JSON.parse(info_schedule);

                var info_admin_hour = '<?php echo json_encode($info_admin_hour); ?>';
			    var JSON_hour = JSON.parse(info_admin_hour);

                var info_cp = '<?php echo json_encode($info_cp); ?>';
                var JSON_cp = JSON.parse(info_cp);

                var branch = '<?php echo json_encode($info_admin_branch); ?>';
                var JSON_Branch = JSON.parse(branch);
                
                var info_admin_branch_phone = '<?php echo json_encode($info_admin_branch_phone); ?>';
                var JSON_branch_phone = JSON.parse(info_admin_branch_phone);
            </script>
            <section id="wrapper" class="paddingHeaderCatalog">
                <div id="inner-wrapper" class="container">
                    <aside id="notifications"></aside>    
                    <div id="content-wrapper" class="js-content-wrapper">
                        <section id="main" class="padding-section">
                            <header class="page-header">
                                <h1 class="h1 page-title">
                                    <span> <?php echo $schedule["seccion1_title"]; ?></span>
                                </h1>
                            </header>
                            <div id="content" class="page-content">
                                <section class="register-form">
                                    <form method="post" action="<?php echo $helper->url($view,"create"); ?>"  enctype="multipart/form-data">
                                       
                                        <div class="form-group row align-items-center ">
                                            <label class="col-md-2 col-form-label required" for="name">
                                                <?php echo $schedule["seccion1_name"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="name" class="form-control" name="name" type="text" value="" disabled onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center ">
                                            <label class="col-md-2 col-form-label required" for="phone">
                                                <?php echo $schedule["seccion1_phone"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="phone" class="form-control" name="phone" type="text" value="" disabled onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center ">
                                            <label class="col-md-2 col-form-label required" for="branch">
                                                <?php echo $schedule["seccion1_branch"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idBranch" name="idBranch" class="form-control">
                                                    <option value="0"><?php echo $schedule["seccion1_text_select_branch"]; ?></option>
                                                    <?php foreach($info_admin_branch as $branch) {?>
                                                        <option value="<?php echo $branch->idBranch; ?>"><?php echo $branch->vBranch; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center ">
                                            <label class="col-md-2 col-form-label required" for="branch">
                                                <?php echo $schedule["seccion1_type_schedule"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idTypeSchedule" name="idTypeSchedule" class="form-control idTypeSchedule">
                                                    <option value="0"><?php echo $schedule["seccion1_text_type_schedule"]; ?></option>
                                                    <option value="1"><?php echo $schedule["seccion1_text_rent_type_schedule"]; ?></option>
                                                    <option value="2"><?php echo $schedule["seccion1_text_sale_type_schedule"]; ?></option>
                                                    <option value="3"><?php echo $schedule["seccion1_text_making_type_schedule"]; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>



                                        <!--Renta-->
                                        <div class="form-group row align-items-center contRent">
                                            <label class="col-md-2 col-form-label required" for="event_date_rent">
                                                <?php echo $schedule["seccion1_event_date"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="date" id="date_rent" name="date_rent" class="form-control" value="">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center contRent">
                                            <label class="col-md-2 col-form-label required" for="event_date_rent">
                                                <?php echo $schedule["seccion1_date_delivery"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="date" id="dateFin_rent" name="dateFin_rent" disabled class="form-control" value="">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center contRent">
                                            <label class="col-md-2 col-form-label required" for="model">
                                                <?php echo $schedule["seccion1_model"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idProduct_rent" name="idProduct_rent" class="form-control idProduct_rent">
                                                    <option value="0"><?php echo $schedule["seccion1_text_select_model"]; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center contRent">
                                            <label class="col-md-2 col-form-label required" for="address">
                                                Color
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idColor_rent" name="idColor_rent" class="form-control idColor_rent">
                                                    <option value="0"><?php echo $schedule["seccion1_text_color"]; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center contRent">
                                            <label class="col-md-2 col-form-label required" for="address">
                                                <?php echo $schedule["seccion1_size"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idSize_rent" name="idSize_rent" class="form-control idSize_rent">
                                                    <option value="0"><?php echo $schedule["seccion1_text_size"]; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center contRent">
                                            <label class="col-md-2 col-form-label" for="ine">
                                                <?php echo $schedule["seccion1_ine"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control-file" id="ine" name="ine">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>

                                        <div class="form-group row align-items-center contRent">
                                            <label class="col-md-2 col-form-label" for="ine">
                                                <?php echo $schedule["seccion1_advance"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="vAdvance" class="form-control" name="vAdvance" type="text" value="0" disabled >
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>


                                        <!--ventas-->
                                        <div class="form-group row align-items-center contSale">
                                            <label class="col-md-2 col-form-label required" for="date_sale">
                                                <?php echo $schedule["seccion1_event_date"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="date" id="date_sale" name="date_sale" class="form-control date_sale" value="">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center contSale">
                                            <label class="col-md-2 col-form-label required" for="phone">
                                                <?php echo $schedule["seccion1_hour"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idHour_sale" name="idHour_sale" class="form-control idHour_sale">
                                                    <option value="0"><?php echo $schedule["seccion1_text_hour"]; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center contSale">
                                            <label class="col-md-2 col-form-label required" for="model">
                                                <?php echo $schedule["seccion1_model"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idProduct_sale" name="idProduct_sale" class="form-control idProduct_sale">
                                                    <option value="0"><?php echo $schedule["seccion1_text_select_model"]; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>




                                        <!--Confeccion-->
                                        <div class="form-group row align-items-center contMaking">
                                            <label class="col-md-2 col-form-label required" for="date_making">
                                                <?php echo $schedule["seccion1_event_date"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="date" id="date_making" name="date_making" class="form-control date_making" value="">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center contMaking">
                                            <label class="col-md-2 col-form-label required" for="phone">
                                                <?php echo $schedule["seccion1_hour"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idHour_making" name="idHour_making" class="form-control idHour_making">
                                                    <option value="0"><?php echo $schedule["seccion1_text_hour"]; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center contMaking">
                                            <label class="col-md-2 col-form-label" for="product">
                                                Producto de ejemplo
                                            </label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control-file" id="product_example" name="product_example">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center contMaking">
                                            <label class="col-md-2 col-form-label required" for="idColor_making">
                                                <?php echo $schedule["seccion1_color"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idColor_making" name="idColor_making" class="form-control idColor_making">
                                                    <option value="0"><?php echo $schedule["seccion1_text_color"]; ?></option>
                                                    <?php foreach($info_admin_color as $color) {?>
                                                        <option value="<?php echo $color->idColor; ?>"><?php echo $color->vColor; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center contMaking">
                                            <label class="col-md-2 col-form-label required" for="idSize_making">
                                                <?php echo $schedule["seccion1_size"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="idSize_making" name="idSize_making" class="form-control idSize_making">
                                                    <option value="0"><?php echo $schedule["seccion1_text_size"]; ?></option>
                                                    <?php foreach($info_admin_size as $size) {?>
                                                        <option value="<?php echo $size->idSize; ?>"><?php echo $size->vSize; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center contMaking">
                                            <label class="col-md-2 col-form-label required" for="age_making">
                                                <?php echo $schedule["seccion1_age"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="age_making" class="form-control age_making" name="age_making" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="2">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center contMaking">
                                            <label class="col-md-2 col-form-label required" for="name">
                                                <?php echo $schedule["seccion1_price_range"]; ?>
                                            </label>
                                            <div class="col-4">
                                                <input id="rangeMin_making" class="form-control" name="rangeMin_making" type="text" placeholder="Min" value=""  onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
                                            </div>
                                            <div class="col-4">
                                                <input id="rangeMax_making" class="form-control" name="rangeMax_making" type="text" placeholder="Max" value=""  onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>


                                        <!--address_proof-->
                                        <div class="form-group row align-items-center contAddressProof">
                                            <label class="col-md-2 col-form-label" for="branch">
                                                <?php echo $schedule["seccion1_address_proof"]; ?>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control-file" id="address_proof" name="address_proof">
                                            </div>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="form-group row align-items-center ">
                                            <label class="col-md-10 col-form-label check_event">
                                                <input type="checkbox" id="check_event" value=""> 
                                                <?php echo $schedule["seccion1_check_event"]; ?>
                                            </label>
                                            <div class="col-md-2 form-control-comment"></div>
                                        </div>
                                        <div class="forgot-password">
                                            <p> <?php echo $schedule["seccion1_message_doubts"]; ?></p>
                                            <p>
                                                <?php 
                                                foreach($info_admin_branch as $branch) {
                                                    echo "<p>".$branch->vBranch;
                                                    foreach($info_admin_branch_phone as $phone) {
                                                        if($branch->idBranch == $phone->idBranch)
                                                        {
                                                            echo "<a class='elementor-icon elementor-social-icon elementor-social-icon-whatsapp'  href='https://wa.me/52".$phone->iBranchPhone."' target='_blank'><i class='fa fa-whatsapp'></i></a>";
                                                        }
                                                    }
                                                    echo "</p>";
                                                } 
                                                ?>
                                            </p>
                                            <p class="messageError"></p>
                                        </div>

                                        <footer class="form-footer text-center clearfix">

                                            <input type="hidden" class="hdn_vDateCreation" 	name="hdn_vDateCreation" value="<?php echo date('Y-m-d');?>"/>
                                            <input type="hidden" class="hdn_dateFin_rent" name="hdn_dateFin_rent" value=""/>
                                            <input type="hidden" class="hdn_date_schedule" name="hdn_date_schedule" value=""/>
                                            <input type="hidden" class="hdn_price_rent" name="hdn_price_rent" value=""/>
                                            <input type="hidden" class="hdn_advance_rent" name="hdn_advance_rent" value=""/>

                                            <p class="messageLogin"><?php echo $schedule["seccion1_message"]; ?></p>
                                            <span class="viewShedule btn btn-primary form-control-submit" onclick="valSchedule()"><?php echo $schedule["seccion1_button"]; ?></span>
                                            <input class="btn btn-primary form-control-submit btnSend" type="submit" value="<?php echo $schedule["seccion1_button"]; ?>" style="display:none">
                                        </footer>


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
                                    </form>
                                </section>
                            </div>
                            <footer class="page-footer">
                                <!-- Footer content -->
                            </footer>
                        </section>
                    </div>
                </div>
            </section>


            <?php include('footer.php') ?>
        </main>
        
        <?php include('linksFooter.php') ?>

    </body>
</html>