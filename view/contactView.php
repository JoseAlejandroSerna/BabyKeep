
<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>
            <script>
                var branch = '<?php echo json_encode($info_admin_branch); ?>';
                var JSON_Branch = JSON.parse(branch);

                var info_admin_socialNetworks = '<?php echo json_encode($info_admin_socialNetworks); ?>';
                var JSON_socialNetworks = JSON.parse(info_admin_socialNetworks);
                
                var info_admin_branch_phone = '<?php echo json_encode($info_admin_branch_phone); ?>';
                var JSON_branch_phone = JSON.parse(info_admin_branch_phone);
            </script>
            <!--Form account-->
            <form method="post" class="row" action="<?php echo $helper->url($view,"sendEmail"); ?>" style="display:none;">

                <input type="hidden" class="hdn_email" 		name="hdn_email" value=""/>
                <input type="hidden" class="hdn_message" 	name="hdn_message" value=""/>

                <button type="submit" class="btn-link btn_send" name="btn_send" style="display:none;">create</button>
            </form>
            <section id="wrapper" class="paddingHeaderCatalog">
                <div id="inner-wrapper" class="container">
                    <aside id="notifications"></aside>
                    <div id="content-wrapper" class="js-content-wrapper">
                        <section id="main" class="padding-section">
                            <header class="page-header">
                                <h1 class="h1 page-title">
                                    <span><?php echo $contact["seccion1_title"]; ?></span>
                                </h1>
                                <div class="form-group contBranch">
                                    <label class="form-control-label"><?php echo $contact["seccion1_subtitle"]; ?></label>
                                    <select class="form-control selbranch"></select>
                                </div>
                            </header>
                            <section id="content" class="page-content page-cms page-cms-7">
                                <style class="elementor-frontend-stylesheet">.elementor-element.elementor-element-4h4sph8{background-color:#f8f8f8;}.elementor-element.elementor-element-f5m8jpo > .elementor-element-populated{padding:40px 40px 40px 40px;}.elementor-element.elementor-element-42k33yd{text-align:center;}.elementor-element.elementor-element-42k33yd .elementor-heading-title{font-size:1.8rem;}.elementor-element.elementor-element-j026p5e .elementor-divider-separator{border-top-style:solid;border-top-width:3px;width:6%;}.elementor-element.elementor-element-j026p5e .elementor-divider{text-align:center;padding-top:15px;padding-bottom:15px;}.elementor-element.elementor-element-z8k9dc1 .elementor-icon-list-icon{font-size:15px;}.elementor-element.elementor-element-z8k9dc1 .elementor-icon-list-items{text-align:center;}.elementor-element.elementor-element-z8k9dc1 .elementor-icon-list-text{padding-left:2px;}.elementor-element.elementor-element-z8k9dc1 .elementor-widget-container{padding:10px 0px 20px 0px;}.elementor-element.elementor-element-1axfad5{text-align:center;}.elementor-element.elementor-element-1axfad5 .elementor-social-icon{background-color:#0a0a0a;color:#ffffff !important;padding:0.5em;}.elementor-element.elementor-element-1axfad5 .elementor-social-icon i{font-size:19px;}.elementor-element.elementor-element-1axfad5 .elementor-social-icon:not(:last-child){margin-right:14px;}.elementor-element.elementor-element-eri23j9 .swiper-pagination-bullet{width:5px;height:5px;}.elementor-element.elementor-element-zc6nm10{background-color:#f8f8f8;}.elementor-element.elementor-element-mu3bkk1 iframe{height:600px;}.elementor-element.elementor-element-i7zo2x6 > .elementor-element-populated{padding:40px 60px 40px 60px;}.elementor-element.elementor-element-hvaje3t{text-align:center;}.elementor-element.elementor-element-hvaje3t .elementor-heading-title{font-size:1.8rem;}.elementor-element.elementor-element-k6p3bla .elementor-divider-separator{border-top-style:solid;border-top-width:3px;width:6%;}.elementor-element.elementor-element-k6p3bla .elementor-divider{text-align:center;padding-top:15px;padding-bottom:15px;}.elementor-element.elementor-element-nydsfv5 .form-control-label{display:none;}.elementor-element.elementor-element-nydsfv5 .elementor-attachment-field{display:none;}.elementor-element.elementor-element-nydsfv5 .form-control{min-height:45px;}.elementor-element.elementor-element-nydsfv5 .elementor-attachment-field .btn{padding-top:0px;padding-bottom:0px;line-height:45px;}.elementor-element.elementor-element-nydsfv5 textarea.form-control{min-height:101px;}.elementor-element.elementor-element-nydsfv5 .form-control, .elementor-element.elementor-element-nydsfv5 .custom-select2, .elementor-element.elementor-element-nydsfv5 .custom-select2 option{background:#ffffff;}.elementor-element.elementor-element-nydsfv5 .elementor-widget-container{margin:25px 0px 0px 0px;padding:0% 0% 0% 0%;}@media(max-width: 991px){.elementor-element.elementor-element-1axfad5{text-align:center;}}@media(max-width: 767px){.elementor-element.elementor-element-1axfad5{text-align:center;}.elementor-element.elementor-element-i7zo2x6 > .elementor-element-populated{padding:40px 40px 40px 40px;}}</style>
                                <div class="elementor">
                                    <div class="elementor-section elementor-element elementor-element-4h4sph8 elementor-top-section elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section-content-middle" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-element elementor-element-f5m8jpo elementor-col-50 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">

                                                            <div class="elementor-widget elementor-element elementor-element-42k33yd elementor-widget-heading" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default none">
                                                                    <span><span><?php echo $menu["follow"]; ?></span></span>
                                                                    </h2>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-j026p5e elementor-widget-divider" data-element_type="divider">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-divider">
                                                                        <span class="elementor-divider-separator"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-1axfad5 elementor-widget-social-icons elementor-shape-circle" data-element_type="social-icons">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-social-icons-wrapper">
                                                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook" id="urlFacebook" href="" target="_blank">
                                                                            <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram" id="urlInstagram" href="" target="_blank">
                                                                            <i class="fa fa-instagram"></i>
                                                                        </a>
                                                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-twitter" id="urlTwitter" href="" target="_blank">
                                                                            <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-pinterest" id="urlPinterest" href="" target="_blank">
                                                                            <i class="fa fa-pinterest"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br><br>

                                                            <div class="elementor-widget elementor-element elementor-element-42k33yd elementor-widget-heading contWhatsapp">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default none"><span><?php echo $contact["seccion2_title"]; ?></span></h2>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-j026p5e elementor-widget-divider contWhatsapp">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-1axfad5 elementor-widget-social-icons elementor-shape-circle contWhatsapp">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-social-icons-wrapper contIconWhatsapp">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-column elementor-element elementor-element-jzke3xe elementor-col-50 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <img class="swiper-slide-image swiper-lazy swiper-lazy-loaded imageSuc" alt="Baby Kepp" src="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-section elementor-element elementor-element-zc6nm10 elementor-top-section elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section-content-middle" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-element elementor-element-4xgoxwj elementor-col-50 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-widget elementor-element elementor-element-mu3bkk1 elementor-widget-google_maps" data-element_type="google_maps" style="width: 100%;">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-custom-embed">
                                                                        <iframe id="mapBranch" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ll=25.6087214,-100.269131&z=14&t=m&output=embed"></iframe>
                                                                    </div>        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-column elementor-element elementor-element-i7zo2x6 elementor-col-50 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-widget elementor-element elementor-element-hvaje3t elementor-widget-heading" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default none">
                                                                        <span><?php echo $contact["seccion3_title"]; ?></span>
                                                                    </h2>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-k6p3bla elementor-widget-divider" data-element_type="divider">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-divider">
                                                                        <span class="elementor-divider-separator"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Form-->
                                                            <div class="elementor-widget elementor-element elementor-element-nydsfv5 elementor-widget-prestashop-widget-ContactForm" data-element_type="prestashop-widget-ContactForm" style="width: 100%;">
                                                                <div class="elementor-widget-container">
                                                                    
                                                                    <div class="elementor-contactform-wrapper">
                                                                        <div class="contact-form">
                                                                                <div class="js-elementor-contact-norifcation-wrapper"></div>
                                                                                <section class="form-fields">
                                                                                    <div class="form-group">
                                                                                        <input class="form-control emaiContact" id="email" name="email" type="email" value="" placeholder="<?php echo $contact["seccion3_email"]; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <textarea class="form-control messageContact" id="message" name="message" placeholder="<?php echo $contact["seccion3_message"]; ?>" rows="3"></textarea>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <span class="messageError"></span>
                                                                                    </div>
                                                                                </section>
                        
                                                                                <footer class="form-footer">
                                                                                    <span class="btn btn-primary btn-elementor-send btn-block" onclick="valContact()"><?php echo $contact["seccion3_send"]; ?></span>
																                    <input type="hidden" class="hdn_email_branch" 	name="hdn_email_branch" value=""/>
                                                                                    <input type="hidden" class="hdn_vBranch" 	    name="hdn_vBranch" value=""/>
                                                                                </footer>
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
                            </section>
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