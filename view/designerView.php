<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>
            
            <?php 
                $pathVideo = "/assets/video/";
                foreach($info_admin_designer as $info) {
                    $vVideoSeccion1 = $info->vVideoSeccion1; 
                    $vTitle = $info->vTitle; 
                    $vDescription1 = $info->vDescription1; 
                    $vDescription2 = $info->vDescription2; 
                    $vFirma = $info->vFirma; 
                    $iCheck1 = $info->iCheck1; 
                } 
            ?>
    
           
            <section id="wrapper" class="paddingHeaderCatalog">
                <div id="inner-wrapper" class="container">
                    <aside id="notifications"></aside>
                    <div id="content-wrapper" class="js-content-wrapper">
                     
                        <section id="main">
                            <section id="content" class="page-home">
                                <style class="elementor-frontend-stylesheet">.elementor-element.elementor-element-q0z075y > .elementor-background-overlay{background-color:#0a0a0a;opacity:0.15;}.elementor-element.elementor-element-q0z075y > .elementor-container a{color:#ffffff;}.elementor-element.elementor-element-lr3urwu{text-align:center;}.elementor-element.elementor-element-lr3urwu .elementor-heading-title, .elementor-element.elementor-element-lr3urwu .elementor-heading-title a{color:#ffffff;}.elementor-element.elementor-element-lr3urwu .elementor-heading-title{font-size:2.1rem;}.elementor-element.elementor-element-pwiergt .elementor-icon-wrapper{text-align:center;}.elementor-element.elementor-element-pwiergt.elementor-view-stacked .elementor-icon{background-color:#ffffff;}.elementor-element.elementor-element-pwiergt.elementor-view-framed .elementor-icon, .elementor-element.elementor-element-pwiergt.elementor-view-default .elementor-icon{color:#ffffff;border-color:#ffffff;}.elementor-element.elementor-element-pwiergt .elementor-icon i{transform:rotate(0deg);}.elementor-element.elementor-element-0hslfpd{margin-top:60px;margin-bottom:100px;}.elementor-element.elementor-element-958953x{text-align:center;}.elementor-element.elementor-element-958953x .elementor-heading-title{font-size:4rem;}.elementor-element.elementor-element-958953x .elementor-widget-container{margin:0px 0px 68px 0px;}.elementor-element.elementor-element-qp5fa3v{background-color:#dbc5b2;background-image:linear-gradient(180deg, #dbc5b2 0%, #a58369 100%);padding:100px 0px 100px 0px;}.elementor-element.elementor-element-50fspqx > .elementor-element-populated{z-index:2;}.elementor-element.elementor-element-8fbh3ka{text-align:left;}.elementor-element.elementor-element-8fbh3ka .elementor-heading-title{font-size:1.7rem;font-style:italic;}.elementor-element.elementor-element-8fbh3ka .elementor-widget-container{margin:0px 0px 10px 190px;}.elementor-element.elementor-element-6mttcff{text-align:left;}.elementor-element.elementor-element-6mttcff .elementor-heading-title{font-size:6rem;}.elementor-element.elementor-element-6mttcff .elementor-widget-container{margin:0px 0px 40px 190px;}.elementor-element.elementor-element-nv6y1yx .elementor-widget-container{padding:0px 150px 40px 190px;}.elementor-element.elementor-element-r8bx179 .elementor-button{color:#ffffff;background-color:#0a0a0a;}.elementor-element.elementor-element-r8bx179 .elementor-widget-container{margin:0px 0px 0px 190px;}.elementor-element.elementor-element-tpp7yhp > .elementor-element-populated{margin:0px 0px 0px -270px;z-index:1;}.elementor-element.elementor-element-9p63ghj .elementor-video-open-modal i{font-size:80px;}.elementor-element.elementor-element-u83td6y{margin-top:100px;margin-bottom:100px;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner-content{text-align:center;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-title{color:#ffffff;font-size:6rem;font-weight:bold;line-height:1.8em;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-description{display:block;}.elementor-element.elementor-element-70yyuue .elementor-button{margin-top:19px;color:#0a0a0a;background-color:#ffffff;}.elementor-element.elementor-element-70yyuue .elementor-button:hover{color:#ffffff;background-color:#000000;}.elementor-element.elementor-element-edyt3gj{background-color:#000000;padding:40px 0px 40px 0px;}.elementor-element.elementor-element-edyt3gj > .elementor-container{color:#ffffff;}.elementor-element.elementor-element-joc5ngp > .elementor-element-populated{padding:0px 30px 0px 30px;}.elementor-element.elementor-element-w7kavzm{text-align:left;}.elementor-element.elementor-element-w7kavzm .elementor-widget-container{margin:0px 0px 20px 0px;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-form{max-width:614px;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input{min-height:72px;font-size:2.2rem;font-weight:bold;text-align:left;background:rgba(10,10,10,0);color:#ffffff;border-style:solid;border-width:0px 0px 2px 0px;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-btn{min-height:72px;background:#ffffff;color:#0a0a0a;}.elementor-element.elementor-element-fqtvco5{text-align:center;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input::-webkit-input-placeholder{color:#ffffff;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input:-ms-input-placeholder{color:#ffffff;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input::placeholder{color:#ffffff;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-btn:hover{background:#e8e8e8;}.elementor-element.elementor-element-627hsxu{margin-top:100px;margin-bottom:140px;}.elementor-element.elementor-element-uvymzjv .elementor-widget-container{margin:0px 0px 40px 0px;}.elementor-element.elementor-element-ewnfa9t .elementor-widget-container{padding:0px 30px 0px 0px;}.elementor-element.elementor-element-bsmygqo .elementor-widget-container{padding:0px 0px 0px 30px;}.elementor-element.elementor-element-aj5len7{text-align:right;}.elementor-element.elementor-element-aj5len7 .elementor-heading-title{font-size:1.4rem;font-style:italic;letter-spacing:4.2px;}.elementor-element.elementor-element-aj5len7 .elementor-widget-container{margin:30px 40px 0px 0px;}.elementor-element.elementor-element-r9tgwtq{text-align:center;}.elementor-element.elementor-element-r9tgwtq .elementor-heading-title{font-size:1.8rem;}.elementor-element.elementor-element-r9tgwtq .elementor-widget-container{margin:0px 0px 5px 0px;}.elementor-element.elementor-element-n4f05rk{text-align:center;}.elementor-element.elementor-element-vemaejm .il-photo__img{height:300px;object-fit:cover;}.elementor-element.elementor-element-vemaejm .il-item{padding:20px 20px 20px 20px;}.elementor-element.elementor-element-vemaejm .elementor-instagram{margin-left:-20px;margin-right:-20px;}.elementor-element.elementor-element-vemaejm .elementor-widget-container{margin:30px 0px 0px 0px;padding:0px 40px 0px 40px;}@media(max-width: 991px){.elementor-element.elementor-element-pwiergt .elementor-icon-wrapper{text-align:center;}.elementor-element.elementor-element-8fbh3ka .elementor-widget-container{margin:0px 0px 0px 100px;}.elementor-element.elementor-element-6mttcff .elementor-widget-container{margin:0px 0px 0px 100px;}.elementor-element.elementor-element-r8bx179 .elementor-widget-container{margin:0px 0px 0px 100px;}.elementor-element.elementor-element-tpp7yhp > .elementor-element-populated{margin:0px 0px 0px 0px;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner-content{text-align:center;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-description{display:block;}.elementor-element.elementor-element-vemaejm .il-photo__img{height:100%;object-fit:cover;}}@media(max-width: 767px){.elementor-element.elementor-element-pwiergt .elementor-icon-wrapper{text-align:center;}.elementor-element.elementor-element-958953x .elementor-heading-title{font-size:3.4rem;}.elementor-element.elementor-element-8fbh3ka{text-align:center;}.elementor-element.elementor-element-8fbh3ka .elementor-heading-title{font-size:1.8rem;}.elementor-element.elementor-element-8fbh3ka .elementor-widget-container{margin:0px 0px 0px 0px;}.elementor-element.elementor-element-6mttcff{text-align:center;}.elementor-element.elementor-element-6mttcff .elementor-heading-title{font-size:4.2rem;}.elementor-element.elementor-element-6mttcff .elementor-widget-container{margin:0px 0px 0px 0px;}.elementor-element.elementor-element-nv6y1yx .elementor-widget-container{padding:0px 0px 0px 0px;}.elementor-element.elementor-element-r8bx179 .elementor-widget-container{margin:0px 0px 0px 0px;padding:30px 0px 30px 0px;}.elementor-element.elementor-element-tpp7yhp > .elementor-element-populated{margin:0px 0px 0px 0px;padding:0px 30px 0px 30px;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner-content{text-align:center;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-title{font-size:3rem;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-description{display:block;}.elementor-element.elementor-element-70yyuue .elementor-button{margin-top:7px;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input{font-size:1.7rem;}.elementor-element.elementor-element-uvymzjv .elementor-heading-title{font-size:3.4rem;}.elementor-element.elementor-element-ewnfa9t .elementor-widget-container{padding:0px 0px 0px 0px;}.elementor-element.elementor-element-bsmygqo .elementor-widget-container{padding:0px 0px 0px 0px;}.elementor-element.elementor-element-vemaejm .il-photo__img{height:100%;object-fit:cover;}}@media (min-width: 768px) {.elementor-element.elementor-element-50fspqx{width:55.942%;}.elementor-element.elementor-element-tpp7yhp{width:44.057%;}.elementor-element.elementor-element-ybfb8gt{width:26.963%;}.elementor-element.elementor-element-joc5ngp{width:46.000%;}.elementor-element.elementor-element-g1wj4ru{width:27.037%;}}</style>
                                
                                <div class="elementor">
                                    <!--SECCION 1-->
                                    <?php if($iCheck1 == 1){ ?>
                                    <div class="elementor-section elementor-element elementor-element-q0z075y elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-full elementor-section-height-default elementor-section-items-bottom animated fadeIn" data-animation="fadeIn" data-element_type="section">
                                        <div class="elementor-background-video-container">
                                            <video class="elementor-background-video elementor-html5-video" src="<?php echo $pathVideo.$vVideoSeccion1; ?>" autoplay="" loop="" muted="" style="width: 1440px; height: 810px;"></video>
                                        </div>
                                        <div class="elementor-background-overlay"></div>
                                    </div>
                                    <?php } ?>
                                    <!--SECCION 6-->
                                    <div class="elementor-section elementor-element elementor-element-627hsxu elementor-top-section elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-element elementor-element-xzdikoc elementor-col-100 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-widget elementor-element elementor-element-uvymzjv elementor-widget-heading animated elementor-invisible" data-animation="fadeIn" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <h1 class="elementor-heading-title elementor-size-default none">
                                                                        <span><?php echo $vTitle; ?></span>
                                                                    </h1>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-section elementor-element elementor-element-13gqblz elementor-inner-section elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-no">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-column elementor-element elementor-element-bdzq7gt elementor-col-50 elementor-inner-column" data-element_type="column">
                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-widget elementor-element elementor-element-ewnfa9t elementor-widget-text-editor animated elementor-invisible" data-animation="fadeIn" data-element_type="text-editor">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor rte-content">
                                                                                                <p><?php echo $vDescription1; ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-column elementor-element elementor-element-yhgsukw elementor-col-50 elementor-inner-column" data-element_type="column">
                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-widget elementor-element elementor-element-bsmygqo elementor-widget-text-editor animated elementor-invisible" data-animation="fadeIn" data-element_type="text-editor">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor rte-content">
                                                                                                <p><?php echo $vDescription1; ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-widget elementor-element elementor-element-aj5len7 elementor-widget-heading" data-element_type="heading">
                                                                                        <div class="elementor-widget-container">
                                                                                            <span class="elementor-heading-title elementor-size-default none">
                                                                                                <span><?php echo $vFirma; ?></span>
                                                                                            </span>        
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