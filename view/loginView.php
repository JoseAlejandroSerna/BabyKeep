<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>
            <script>
                var varView = '<?php echo $view; ?>';
                var varError = '<?php echo $login["seccion1_error"]; ?>';
                var varUserNotValid = '<?php echo $login["seccion1_user_not_valid"]?>';
                var serviceLogin = "<?php echo $helper->url($view,"login"); ?>";
            </script>
            <section id="wrapper">
                <div id="inner-wrapper" class="container">
                    <aside id="notifications"></aside>
                    <div id="content-wrapper" class="js-content-wrapper">
                        <section id="main" class="paddingHeader">
                            <header class="page-header">
                                <h1 class="h1 page-title">
                                    <span><?php echo $login["seccion1_title"]; ?></span>
                                </h1>
                            </header>
                            <div id="content" class="page-content">
                                <section class="login-form">
                                    <form id="login-form" action="<?php echo $helper->url("Login","login"); ?>" method="post">

                                        <section>
                                            <!---EMAIL-->
                                            <div class="form-group row align-items-center ">
                                                <label class="col-md-2 col-form-label required" for="field-email">
                                                    <?php echo $login["seccion1_email"]; ?>
                                                </label>
                                                <div class="col-md-8">
                                                    <input id="email" class="form-control txtEmail" name="email" type="email" value="" autocomplete="email" required="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="100">
                                                </div>
                                                <div class="col-md-2 form-control-comment"></div>
                                            </div>
                                            <!--PASSWORD-->
                                            <div class="form-group row align-items-center ">
                                                <label class="col-md-2 col-form-label required" for="field-password">
                                                    <?php echo $login["seccion1_password"]; ?>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-group js-parent-focus">
                                                        <input id="password" class="form-control js-child-focus js-visible-password txtPassword" name="password" aria-label="Password input of at least 5 characters" title="Baby Keep" autocomplete="current-password" type="password" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="50">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button" data-action="show-password">
                                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 form-control-comment"></div>
                                            </div>
                                            <div class="forgot-password">
                                                <p class="messageError"></p>
                                            </div>
                                        </section>
                                        <footer class="form-footer text-center clearfix">
                                            <span class="btn btn-primary form-control-submit" onclick="valUser()"><?php echo $login["seccion1_button"]; ?></span>
                                            <input class="btn btn-primary form-control-submit btnSend" type="submit" value="<?php echo $login["seccion1_button"]; ?>" style="display:none">
                                            
                                        </footer>
                                    </form>
                                </section>
                                <hr>
                                <div class="no-account">
                                    <a href="<?php echo $helper->url("Account","index"); ?>" data-link-action="display-register-form">
                                        <?php echo $login["seccion1_no_account"]; ?>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
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