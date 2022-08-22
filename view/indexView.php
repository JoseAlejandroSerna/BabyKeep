<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>
            
            <?php 
                $pathVideo = "/assets/video/";
                foreach($info_admin_main as $info) {
                    $vVideoSeccion1 = $info->vVideoSeccion1; 
                    $vVideoSeccion2 = $info->vVideoSeccion2; 
                    $vVideoSeccion3 = $info->vVideoSeccion3; 
                    $vVideoSeccion4 = $info->vVideoSeccion4; 
                    $vVideoSeccion5 = $info->vVideoSeccion5; 
                } 
            ?>
           
            <section id="wrapper" class="paddingHeaderCatalog">
                <div id="inner-wrapper" class="container">
                    <aside id="notifications"></aside>
                    <div id="content-wrapper" class="js-content-wrapper">
                     
                        <section id="main">
                            <section id="content" class="page-home">
                                <style class="elementor-frontend-stylesheet">.elementor-element.elementor-element-q0z075y >.elementor-element.elementor-element-lr3urwu{text-align:center;}.elementor-element.elementor-element-lr3urwu .elementor-heading-title, .elementor-element.elementor-element-lr3urwu .elementor-heading-title a{color:#ffffff;}.elementor-element.elementor-element-lr3urwu .elementor-heading-title{font-size:2.1rem;}.elementor-element.elementor-element-pwiergt .elementor-icon-wrapper{text-align:center;}.elementor-element.elementor-element-pwiergt.elementor-view-stacked .elementor-icon{background-color:#ffffff;}.elementor-element.elementor-element-pwiergt.elementor-view-framed .elementor-icon, .elementor-element.elementor-element-pwiergt.elementor-view-default .elementor-icon{color:#ffffff;border-color:#ffffff;}.elementor-element.elementor-element-pwiergt .elementor-icon i{transform:rotate(0deg);}.elementor-element.elementor-element-0hslfpd{margin-top:60px;margin-bottom:100px;}.elementor-element.elementor-element-958953x{text-align:center;}.elementor-element.elementor-element-958953x .elementor-heading-title{font-size:4rem;}.elementor-element.elementor-element-958953x .elementor-widget-container{margin:0px 0px 68px 0px;}.elementor-element.elementor-element-qp5fa3v{background-color:#f8f8f8;padding:100px 0px 100px 0px;}.elementor-element.elementor-element-50fspqx > .elementor-element-populated{z-index:2;}.elementor-element.elementor-element-8fbh3ka{text-align:left;}.elementor-element.elementor-element-8fbh3ka .elementor-heading-title{font-size:1.7rem;font-style:italic;}.elementor-element.elementor-element-8fbh3ka .elementor-widget-container{margin:0px 0px 10px 190px;}.elementor-element.elementor-element-6mttcff{text-align:left;}.elementor-element.elementor-element-6mttcff .elementor-heading-title{font-size:6rem;}.elementor-element.elementor-element-6mttcff .elementor-widget-container{margin:0px 0px 40px 190px;}.elementor-element.elementor-element-nv6y1yx .elementor-widget-container{padding:0px 150px 40px 190px;}.elementor-element.elementor-element-r8bx179 .elementor-button{color:#000;background-color:#fff;font-size:30px;}.elementor-element.elementor-element-r8bx179 .elementor-widget-container{margin:0px 0px 0px 190px;}.elementor-element.elementor-element-tpp7yhp > .elementor-element-populated{margin:0px 0px 0px -270px;z-index:1;}.elementor-element.elementor-element-9p63ghj .elementor-video-open-modal i{font-size:80px;}.elementor-element.elementor-element-u83td6y{margin-top:100px;margin-bottom:100px;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner-content{text-align:center;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-title{color:#ffffff;font-size:6rem;font-weight:bold;line-height:1.8em;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-description{display:block;}.elementor-element.elementor-element-70yyuue .elementor-button{margin-top:19px;color:#0a0a0a;background-color:#ffffff;}.elementor-element.elementor-element-70yyuue .elementor-button:hover{color:#ffffff;background-color:#000000;}.elementor-element.elementor-element-edyt3gj{background-color:#000000;padding:40px 0px 40px 0px;}.elementor-element.elementor-element-edyt3gj > .elementor-container{color:#ffffff;}.elementor-element.elementor-element-joc5ngp > .elementor-element-populated{padding:0px 30px 0px 30px;}.elementor-element.elementor-element-w7kavzm{text-align:left;}.elementor-element.elementor-element-w7kavzm .elementor-widget-container{margin:0px 0px 20px 0px;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-form{max-width:614px;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input{min-height:72px;font-size:2.2rem;font-weight:bold;text-align:left;background:rgba(10,10,10,0);color:#ffffff;border-style:solid;border-width:0px 0px 2px 0px;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-btn{min-height:72px;background:#ffffff;color:#0a0a0a;}.elementor-element.elementor-element-fqtvco5{text-align:center;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input::-webkit-input-placeholder{color:#ffffff;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input:-ms-input-placeholder{color:#ffffff;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input::placeholder{color:#ffffff;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-btn:hover{background:#e8e8e8;}.elementor-element.elementor-element-627hsxu{margin-top:100px;margin-bottom:140px;}.elementor-element.elementor-element-uvymzjv .elementor-heading-title{font-size:6rem;}.elementor-element.elementor-element-uvymzjv .elementor-widget-container{margin:0px 0px 40px 0px;}.elementor-element.elementor-element-ewnfa9t .elementor-widget-container{padding:0px 30px 0px 0px;}.elementor-element.elementor-element-bsmygqo .elementor-widget-container{padding:0px 0px 0px 30px;}.elementor-element.elementor-element-aj5len7{text-align:right;}.elementor-element.elementor-element-aj5len7 .elementor-heading-title{font-size:1.4rem;font-style:italic;letter-spacing:4.2px;}.elementor-element.elementor-element-aj5len7 .elementor-widget-container{margin:30px 40px 0px 0px;}.elementor-element.elementor-element-r9tgwtq{text-align:center;}.elementor-element.elementor-element-r9tgwtq .elementor-heading-title{font-size:1.8rem;}.elementor-element.elementor-element-r9tgwtq .elementor-widget-container{margin:0px 0px 5px 0px;}.elementor-element.elementor-element-n4f05rk{text-align:center;}.elementor-element.elementor-element-vemaejm .il-photo__img{height:300px;object-fit:cover;}.elementor-element.elementor-element-vemaejm .il-item{padding:20px 20px 20px 20px;}.elementor-element.elementor-element-vemaejm .elementor-instagram{margin-left:-20px;margin-right:-20px;}.elementor-element.elementor-element-vemaejm .elementor-widget-container{margin:30px 0px 0px 0px;padding:0px 40px 0px 40px;}@media(max-width: 991px){.elementor-element.elementor-element-pwiergt .elementor-icon-wrapper{text-align:center;}.elementor-element.elementor-element-8fbh3ka .elementor-widget-container{margin:0px 0px 0px 100px;}.elementor-element.elementor-element-6mttcff .elementor-widget-container{margin:0px 0px 0px 100px;}.elementor-element.elementor-element-r8bx179 .elementor-widget-container{margin:0px 0px 0px 100px;}.elementor-element.elementor-element-tpp7yhp > .elementor-element-populated{margin:0px 0px 0px 0px;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner-content{text-align:center;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-description{display:block;}.elementor-element.elementor-element-vemaejm .il-photo__img{height:100%;object-fit:cover;}}@media(max-width: 767px){.elementor-element.elementor-element-pwiergt .elementor-icon-wrapper{text-align:center;}.elementor-element.elementor-element-958953x .elementor-heading-title{font-size:3.4rem;}.elementor-element.elementor-element-8fbh3ka{text-align:center;}.elementor-element.elementor-element-8fbh3ka .elementor-heading-title{font-size:1.8rem;}.elementor-element.elementor-element-8fbh3ka .elementor-widget-container{margin:0px 0px 0px 0px;}.elementor-element.elementor-element-6mttcff{text-align:center;}.elementor-element.elementor-element-6mttcff .elementor-heading-title{font-size:4.2rem;}.elementor-element.elementor-element-6mttcff .elementor-widget-container{margin:0px 0px 0px 0px;}.elementor-element.elementor-element-nv6y1yx .elementor-widget-container{padding:0px 0px 0px 0px;}.elementor-element.elementor-element-r8bx179 .elementor-widget-container{margin:0px 0px 0px 0px;padding:30px 0px 30px 0px;}.elementor-element.elementor-element-tpp7yhp > .elementor-element-populated{margin:0px 0px 0px 0px;padding:0px 30px 0px 30px;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner-content{text-align:center;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-title{font-size:3rem;}.elementor-element.elementor-element-70yyuue .elementor-iqit-banner .elementor-iqit-banner-description{display:block;}.elementor-element.elementor-element-70yyuue .elementor-button{margin-top:7px;}.elementor-element.elementor-element-fqtvco5 .elementor-newsletter-input{font-size:1.7rem;}.elementor-element.elementor-element-uvymzjv .elementor-heading-title{font-size:3.4rem;}.elementor-element.elementor-element-ewnfa9t .elementor-widget-container{padding:0px 0px 0px 0px;}.elementor-element.elementor-element-bsmygqo .elementor-widget-container{padding:0px 0px 0px 0px;}.elementor-element.elementor-element-vemaejm .il-photo__img{height:100%;object-fit:cover;}}@media (min-width: 768px) {.elementor-element.elementor-element-50fspqx{width:55.942%;}.elementor-element.elementor-element-tpp7yhp{width:44.057%;}.elementor-element.elementor-element-ybfb8gt{width:26.963%;}.elementor-element.elementor-element-joc5ngp{width:46.000%;}.elementor-element.elementor-element-g1wj4ru{width:27.037%;}}</style>
                                
                                <div class="elementor">
                                    <!--SECCION 1-->
                                    <div class="elementor-section elementor-element elementor-element-q0z075y elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-full elementor-section-height-default elementor-section-items-bottom animated fadeIn" data-animation="fadeIn" data-element_type="section">
                                        <div class="elementor-background-video-container">
                                            <video class="elementor-background-video elementor-html5-video" src="<?php echo $pathVideo.$vVideoSeccion1; ?>" autoplay="autoplay" loop="loop" muted defaultMuted playsinline  oncontextmenu="return false;"  preload="auto" style="width: 1440px; height: 810px;"></video>
                                        </div>
                                        <div class="elementor-background-overlay"></div>
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-element elementor-element-b2uvu1a elementor-col-100 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap" style="text-align: center;">
                                                            <div class="elementor-widget elementor-element elementor-element-lr3urwu elementor-widget-heading" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default none">
                                                                        <a href="<?php echo $helper->url("Catalog","index"); ?>"><?php echo $main["seccion1_title"]; ?></a>
                                                                    </h2>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-pwiergt elementor-widget-icon elementor-view-default" data-element_type="icon">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-icon-wrapper">
                                                                        <a class="elementor-icon" href="<?php echo $helper->url("Catalog","index"); ?>">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--SECCION 2-->
                                    <div class="elementor-section elementor-element elementor-element-qp5fa3v elementor-top-section elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section-content-middle" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-element elementor-element-50fspqx elementor-col-50 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-widget elementor-element elementor-element-8fbh3ka elementor-widget-heading animated fadeIn" data-animation="fadeIn" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <span class="elementor-heading-title elementor-size-default none">
                                                                        <span><?php echo $main["seccion2_title"]; ?></span>
                                                                    </span>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-6mttcff elementor-widget-heading animated fadeIn" data-animation="fadeIn" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <h1 class="elementor-heading-title elementor-size-default none">
                                                                        <span><?php echo $main["seccion2_subtitle"]; ?></span>
                                                                    </h1>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-nv6y1yx elementor-widget-text-editor animated elementor-hidden-tablet elementor-hidden-phone fadeIn" data-animation="fadeIn" data-element_type="text-editor">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor rte-content">
                                                                        <p><?php echo $main["seccion2_text"]; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="elementor-widget elementor-element elementor-element-r8bx179 elementor-widget-button elementor-mobile-align-center animated fadeIn" data-animation="fadeIn" data-element_type="button">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-button-wrapper">
                                                                        <a href="<?php echo $helper->url("Designer","index"); ?>" class="elementor-button-link elementor-button btn elementor-size-medium btn-secondary btn-traditional">
                                                                            <span class="elementor-button-content-wrapper">
                                                                                <span class="elementor-button-text"><?php echo $main["seccion2_button"]; ?></span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Video-->
                                                <div class="elementor-column elementor-element elementor-element-tpp7yhp elementor-col-50 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-widget elementor-element elementor-element-9p63ghj elementor-widget-video elementor-aspect-ratio-auto animated fadeIn" data-animation="fadeIn" data-element_type="video">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-video-wrapper">
                                                                        <video class="elementor-video" src="<?php echo $pathVideo.$vVideoSeccion2; ?>" autoplay="" muted="" loop="" playsinline=""></video>            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--SECCION 3-->
                                    <div class="elementor-section elementor-element elementor-element-q0z075y elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-full elementor-section-height-default elementor-section-items-bottom animated fadeIn" data-animation="fadeIn" data-element_type="section">
                                        <div class="elementor-background-video-container">
                                            <video class="elementor-background-video elementor-html5-video" src="<?php echo $pathVideo.$vVideoSeccion3; ?>" autoplay="autoplay" loop="loop" muted defaultMuted playsinline  oncontextmenu="return false;"  preload="auto" style="width: 1440px; height: 810px;"></video>
                                        </div>
                                        <div class="elementor-background-overlay"></div>
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-element elementor-element-b2uvu1a elementor-col-100 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap" style="text-align: center;">
                                                            <div class="elementor-widget elementor-element elementor-element-lr3urwu elementor-widget-heading" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default none">
                                                                        <a href="<?php echo $helper->url("Catalog","index"); ?>"><?php echo $main["seccion3_title"]; ?></a>
                                                                    </h2>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-pwiergt elementor-widget-icon elementor-view-default" data-element_type="icon">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-icon-wrapper">
                                                                        <a class="elementor-icon" href="<?php echo $helper->url("Catalog","index"); ?>">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--SECCION 4-->
                                    <div class="elementor-section elementor-element elementor-element-qp5fa3v elementor-top-section elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section-content-middle" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-element elementor-element-50fspqx elementor-col-50 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-widget elementor-element elementor-element-8fbh3ka elementor-widget-heading animated fadeIn" data-animation="fadeIn" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <span class="elementor-heading-title elementor-size-default none">
                                                                        <span><?php echo $main["seccion4_title"]; ?></span>
                                                                    </span>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-6mttcff elementor-widget-heading animated fadeIn" data-animation="fadeIn" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <h1 class="elementor-heading-title elementor-size-default none">
                                                                        <span><?php echo $main["seccion4_subtitle"]; ?></span>
                                                                    </h1>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-nv6y1yx elementor-widget-text-editor animated elementor-hidden-tablet elementor-hidden-phone fadeIn" data-animation="fadeIn" data-element_type="text-editor">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor rte-content">
                                                                        <p><?php echo $main["seccion4_text"]; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="elementor-widget elementor-element elementor-element-r8bx179 elementor-widget-button elementor-mobile-align-center animated fadeIn" data-animation="fadeIn" data-element_type="button">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-button-wrapper">
                                                                        <a href="<?php echo $helper->url("Contact","index"); ?>" class="elementor-button-link elementor-button btn elementor-size-medium btn-secondary btn-traditional">
                                                                            <span class="elementor-button-content-wrapper">
                                                                                <span class="elementor-button-text"><?php echo $main["seccion4_button"]; ?></span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Video-->
                                                <div class="elementor-column elementor-element elementor-element-tpp7yhp elementor-col-50 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-widget elementor-element elementor-element-9p63ghj elementor-widget-video elementor-aspect-ratio-auto animated fadeIn" data-animation="fadeIn" data-element_type="video">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-video-wrapper">
                                                                        <video class="elementor-video" src="<?php echo $pathVideo.$vVideoSeccion4; ?>" autoplay="" muted="" loop="" playsinline=""></video>            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--SECCION 5-->
                                    <div class="elementor-section elementor-element elementor-element-q0z075y elementor-top-section elementor-section-stretched elementor-section-full_width elementor-section-height-full elementor-section-height-default elementor-section-items-bottom animated fadeIn" data-animation="fadeIn" data-element_type="section">
                                        <div class="elementor-background-video-container">
                                            <video class="elementor-background-video elementor-html5-video" src="<?php echo $pathVideo.$vVideoSeccion5; ?>" autoplay="autoplay" loop="loop" muted defaultMuted playsinline  oncontextmenu="return false;"  preload="auto" style="width: 1440px; height: 810px;"></video>
                                        </div>
                                        <div class="elementor-background-overlay"></div>
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-element elementor-element-b2uvu1a elementor-col-100 elementor-top-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap" style="text-align: center;">
                                                            <div class="elementor-widget elementor-element elementor-element-lr3urwu elementor-widget-heading" data-element_type="heading">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default none">
                                                                        <a href="<?php echo $helper->url("Schedule","index"); ?>"><?php echo $main["seccion5_title"]; ?></a>
                                                                    </h2>        
                                                                </div>
                                                            </div>
                                                            <div class="elementor-widget elementor-element elementor-element-pwiergt elementor-widget-icon elementor-view-default" data-element_type="icon">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-icon-wrapper">
                                                                        <a class="elementor-icon" href="<?php echo $helper->url("Schedule","index"); ?>">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
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