<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">

            <?php include('menu.php') ?>

            <script>
                var varView = '<?php echo $view; ?>';
                var varError = '<?php echo $user["error"]; ?>';
            </script>

            <!--Form user-->
            <form method="post" class="row" action="<?php echo $helper->url("User","update"); ?>" style="display:none;">

                <input type="hidden" class="hdn_user_idUser" name="hdn_user_idUser" value=""/>
                <input type="hidden" class="hdn_user_idPermissions" name="hdn_user_idPermissions" value=""/>
                <input type="hidden" class="hdn_user_name" name="hdn_user_name" value=""/>
                <input type="hidden" class="hdn_user_email" name="hdn_user_email" value=""/>
                <input type="hidden" class="hdn_user_password" name="hdn_user_password" value=""/>
                <input type="hidden" class="hdn_user_phone" name="hdn_user_phone" value=""/>
                <input type="hidden" class="hdn_user_address" name="hdn_user_address" value=""/>
                <input type="hidden" class="hdn_user_cp" name="hdn_user_cp" value=""/>
                <input type="hidden" class="hdn_user_coment" name="hdn_user_coment" value=""/>
                <input type="hidden" class="hdn_user_iStatus" name="hdn_user_iStatus" value=""/>

                <button type="submit" class="btn-link btn_user" name="btn_user" style="display:none;">User</button>
            </form>

            <section id="wrapper">
                <div id="inner-wrapper" class="container">
                    <aside id="notifications"></aside>    
                    <div id="content-wrapper" class="js-content-wrapper">
                        <section id="main" class="paddingHeader">
                            <header class="page-header">
                                <h1 class="h1 page-title">
                                    <span><?php echo $user["title"]; ?> </span>
                                </h1>
                            </header>
                            <div id="content" class="page-content">
                                <section class="register-form">
                                    <p style="text-align: right;font-weight: bold;">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> 
                                        <a href="<?php echo $helper->url("User","logout"); ?>">
                                            <u><?php echo $user["exit"]; ?></u>
                                        </a>
                                    </p>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="field-firstname">
                                            <?php echo $user["name"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="name" class="form-control" name="name" type="text" value="<?php echo $_SESSION['vUser']; ?>" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="phone">
                                            <?php echo $user["phone"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="phone" class="form-control" name="phone" type="text" value="<?php echo $_SESSION['vPhone']; ?>" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="address">
                                            <?php echo $user["address"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="address" class="form-control" name="address" type="text" value="<?php echo $_SESSION['vAddress']; ?>"  onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="200">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="cp">
                                            <?php echo $user["cp"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="cp" class="form-control" name="cp" type="text" value="<?php echo $_SESSION['vCP']; ?>" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="7">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>

                                    <div class="forgot-password">
                                        <p class="messageError"></p>
                                    </div>

                                    <footer class="form-footer text-center clearfix">
                                        <span class="btn btn-primary form-control-submit" onclick="valUser()"><?php echo $user["update"]; ?></span>
                                    
                                    </footer>
                                </section>
                            </div>
                            <footer class="page-footer">
                                <!-- Footer content -->
                            </footer>
                        </section>
                    </div>

                    <br><br><br>
                    <?php 
                    $contSchedule = 0;
                    foreach($info_schedule_pending as $schedule) {  $contSchedule++; } 
                    ?>
                    <?php 
                    if($contSchedule > 0){
                    ?>
                    <div class="row contCart" style="overflow: auto;">
                        <div class="col-12"><h2><?php echo $user["schedule_pending"]; ?></h2></div>
                        <div class="col-12">
                            <table class="table">
                                <thead class="thead-dark" style="text-align: center;">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?php echo $user["date"]; ?></th>
                                    <th scope="col"><?php echo $user["branch"]; ?></th>
                                    <th scope="col"><?php echo $user["type_schedule"]; ?></th>
                                    <th scope="col"><?php echo $user["product"]; ?></th>
                                    <th scope="col"><?php echo $user["price"]; ?></th>
                                    <th scope="col"><?php echo $user["advance"]; ?></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody_schedule" style="text-align: center;">
                                    <?php foreach($info_schedule_pending as $schedule) {
                                        $vBranch = "";
                                        $vProduct = "";
                                        $vAdvance = "";
                                        $vTypeSchedule = "";
                                        $Price = "";

                                        if($schedule->idTypeSchedule == 1){ $vTypeSchedule = $user["type_rent"]; }
                                        else if($schedule->idTypeSchedule == 3){ $vTypeSchedule = $user["type_making"]; }

                                        if($schedule->vAdvance != ""){  $vAdvance = "$".$schedule->vAdvance;    }

                                        foreach($info_admin_branch as $branch) {  
                                            if($branch->idBranch == $schedule->idBranch){ $vBranch = $branch->vBranch;}
                                        } 
                                        foreach($info_admin_product as $product) {  
                                            if($product->idProduct == $schedule->idProduct){ $vProduct = $product->vProduct;}
                                        }
                                        if($schedule->vPrice != ""){ $Price = "$".$schedule->vPrice; }
                                    ?>
                                        <tr>
						                    <th scope="row"><?php echo $schedule->idSchedule; ?></th>
						                    <td><?php echo $schedule->vDateEvent; ?></td>
						                    <td><?php echo $vBranch; ?></td>
                                            <td><?php echo $vTypeSchedule; ?></td>
						                    <td><?php echo $vProduct; ?></td>
						                    <td><?php echo $Price; ?></td>
						                    <td><?php echo $vAdvance; ?></td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </section>


            <?php include('footer.php') ?>
        </main>
        
        <?php include('linksFooter.php') ?>
    </body>
</html>