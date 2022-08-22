<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>

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
                                                        
                                                        <!--Size and color-->
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
                                                            <!--Count-->
                                                            <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contCount">
                                                                <span class="form-control-label"><?php echo $product["pieces"]; ?></span>
                                                                <div class="custom-select2 col-6">
                                                                    <select id="count-modal" aria-label="Count" name="count-modal" class="form-control form-control-select">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--Button-->
                                                            <div class="col-6 clearfix product-variants-item product-variants-item-3 contModal contButton">
                                                                <span class="form-control-label"><br></span>
                                                                <div class="add">
                                                                    <button class="btn btn-primary btn-lg add-to-cart" data-button-action="add-to-cart" type="submit" onclick="addProduct();">
                                                                        <i class="fa fa-shopping-bag fa-fw bag-icon" aria-hidden="true"></i>
                                                                        <i class="fa fa-circle-o-notch fa-spin fa-fw spinner-icon" aria-hidden="true"></i>
                                                                        <?php echo $product["add_cart"]; ?>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
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