<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>

            <script>
                var varView = '<?php echo $view; ?>';
                var varError = '<?php echo $schedule["seccion1_error"]; ?>';
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
                    <aside id="notifications"> </aside>
                    <div id="content-wrapper" class="js-content-wrapper">
                        <section id="main">
                            <section id="products">
                                <div id="">
                                    <div id="js-product-list-top" class="products-selection">
                                        <div class="row align-items-center justify-content-between small-gutters">
                                            <div class="col col-auto facated-toggler">
                                                <div class="filter-button">
                                                    <button id="search_center_filter_toggler" class="btn btn-secondary">
                                                        <i class="fa fa-filter" aria-hidden="true"></i> <?php echo $catalog["filter"]; ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

        
                                <div id="facets_search_center" style="display: none;">
                                    <div id="facets_search_wrapper">
                                        <div id="search_filters_wrapper">
                                            <div class="block block-facets">
                                                <div id="search_filters">
                                                    <aside class="facet clearfix">
                                                        <h4 class="block-title facet-title sasa"><span><?php echo $catalog["size"]; ?></span></h4>

                                                        <ul id="contSize" class="facet-type-checkbox"></ul>

                                                    </aside>
                                                    <aside class="facet clearfix">
                                                        <h4 class="block-title facet-title sasa"><span><?php echo $catalog["color"]; ?></span></h4>

                                                        <ul id="contColor" class="facet-type-checkbox facet_color"></ul>

                                                    </aside>
                                                    <aside class="facet clearfix">
                                                        <h4 class="block-title facet-title sasa"><span><?php echo $catalog["type"]; ?></span></h4>

                                                        <ul id="contTypeProduct" class="facet-type-checkbox"></ul>

                                                    </aside>
                                                    <aside class="facet clearfix">
                                                        <h4 class="block-title facet-title sasa"><span><?php echo $catalog["branch"]; ?></span></h4>
                                                        
                                                        <ul id="contBranch" class="facet-type-checkbox"></ul>

                                                    </aside>
                                                </div>
                                            </div>

                                        </div>
                                    </div>                    
                                </div>
                                                    
                                <div id="">
                                    <div id="facets-loader-icon"><i class="fa fa-circle-o-notch fa-spin"></i></div>
                                    <div id="js-product-list">
                                        <div class="products row products-grid">
                                            <!---->

                                            <form action="<?php echo $helper->url($view,"product_detail"); ?>" method="post">

                                                <input type="hidden" class="hdn-idProduct" name="idProduct" value=""/>
                                                <button type="submit" class="btn-link btnProductDetail">Product</button>
                                            </form>
                                            <!--Product-->
                                            <?php foreach($info_admin_product as $product) {
                                                $contStockProduct = 0;
                                                foreach($info_admin_stock_product as $stock) {
                                                    if($stock->idProduct == $product->idProduct)
                                                    {
                                                        $contStockProduct ++;
                                                    }
                                                }
                                                if($product->idTypePurchase == 1 && $contStockProduct >0) {?>
                                            <div class="js-product-miniature-wrapper js-product-miniature-wrapper-116 col-6 col-md-4 col-lg-3 col-xl-3 contProduct idProduct_<?php echo $product->idProduct; ?> typeProduct_<?php echo $product->idTypeProduct; ?> typePurchase_<?php echo $product->idTypePurchase; ?>">
                                                <article class="product-miniature product-miniature-default product-miniature-grid product-miniature-layout-2 js-product-miniature" data-id-product="116" data-id-product-attribute="0">
                                                    <div class="thumbnail-container">
                                                            <img src="/assets/images/products/<?php echo $product->vImage; ?>" 
                                                            data-src="/assets/images/products/<?php echo $product->vImage; ?>" 
                                                            height="452"
                                                            class="img-fluid js-lazy-product-image lazy-product-image product-thumbnail-first entered loaded" 
                                                            data-ll-status="loaded" 
                                                            data-full-size-image-url="/assets/images/products/<?php echo $product->vImage; ?>" 
                                                            alt="<?php echo $product->vProduct; ?>" 
                                                            data-id="<?php echo $product->idProduct; ?>" 
                                                            onclick="productDetail(this);">

                                                            <ul class="product-flags js-product-flags"> </ul>
                                                            <!--
                                                            <div class="product-functional-buttons product-functional-buttons-bottom">
                                                                <div class="product-functional-buttons-links">
                                                                    <a class="js-quick-view-iqit classEye-<?php echo $product->idProduct; ?>" href="#" data-id="<?php echo $product->idProduct; ?>" onclick="openDetail(this);" data-link-action="quickview" data-toggle="tooltip" title="" data-original-title="Detalle">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                -->
                                                            <div class="product-availability d-block"> </div>
                                                    </div>
                                                    <!--Description--->
                                                    <div class="product-description">
                                                        <div class="row extra-small-gutters justify-content-end">
                                                            <div class="col">
                                                                <div class="product-category-name text-muted">
                                                                    <?php foreach($info_admin_type_product as $type_product) {?>
                                                                        <?php if($type_product->idTypeProduct == $product->idTypeProduct){ echo $type_product->vTypeProduct; }?>
                                                                    <?php } ?>
                                                                </div> 
                                                                <h2 class="h3 product-title">
                                                                    <a href="<?php echo $helper->url("Product","index"); ?>?idProduct=<?php echo $product->idProduct; ?>"><?php echo $product->vProduct; ?></a>
                                                                </h2>
                                                            </div>
                                                            <div class="col col-auto product-miniature-right">
                                                                <div class="product-price-and-shipping">
                                                                    <span class="product-price" content="" aria-label="Price">
                                                                        <?php $valTemp = 0; ?>
                                                                        <?php foreach($info_admin_stock_product as $stock_product) {?>
                                                                            <?php 
                                                                                $cont = 1;
                                                                                if($stock_product->idProduct == $product->idProduct){ 

                                                                                    if($cont == 1){
                                                                                        $valTemp = intval($stock_product->iPrice);
                                                                                    }
                                                                                    
                                                                                    if($valTemp < intval($stock_product->iPrice))
                                                                                    {
                                                                                        $valTemp = intval($stock_product->iPrice);
                                                                                    }
                                                                                    
                                                                                    $cont++;
                                                                                }
                                                                            ?>
                                                                        <?php } ?>
                                                                        <?php echo "$".$valTemp; ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--BUTTON ADD A CAR--->
                                                        <div class="product-add-cart js-product-add-cart-116-0">
                                                            <div class="input-group-add-cart">
                                                                <button class="btn btn-product-list add-to-cart" data-idproduct="<?php echo $product->idProduct; ?>" data-button-action="add-to-cart" type="submit" onclick="buttonView(this);">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> 
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <?php } ?>
                                            <?php } ?>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <div id="infinity-loader-icon">
                                    <i class="fa fa-circle-o-notch fa-spin"></i>
                                </div>
                                <div>
                                <div id="js-product-list-bottom"></div>
                                </div>
                            </section>
                        </section>
                     </div>
                </div>
            </section>


            <?php include('footer.php') ?>
        </main>
        
        <?php include('linksFooter.php') ?>

        <button id="btn-detail-modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#quickview-modal" style="display:none;">Detail</button>

        <div id="quickview-modal" class="modal fade quickview" tabindex="-1" role="dialog" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div id="quickview-modal-product-content" class="row no-gutters">
                            <div class="col-md-6">
                                <div class="images-container js-images-container images-container-left images-container-d-leftd ">
                                    <div class="row no-gutters"></div>
                                    <div class="col-11 col-left-product-cover" style="padding:0;">
                                        <div class="product-cover">
                                            <img class="thumb js-thumb  selected js-thumb-selected  img-fluid swiper-lazy img-modal" src="" data-idproduct="" alt="Baby Keep" title="" width="452" height="584">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 align-self-center">
                                <div class="quickview-info">
                                    <div class="product_header_container">
                                        <h1 class="h1">
                                            <a href="<?php echo $helper->url("Catalog","product_detail"); ?>" class="name-modal"></a>
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
                                
                                    <div id="product-description-short">
                                        <p class="description-modal"></p>
                                    </div>
                                    <div class="product-actions js-product-actions">
                                        <!--<form action="<?php echo $helper->url("Catalog","product_detail"); ?>" method="post" id="add-to-cart-or-refresh">-->
                                            <div class="product-add-to-cart pt-3 js-product-add-to-cart">
                                                <!--Size and color-->
                                                <div class="product-variants js-product-variants">
                                                    <!--Branch-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3" style="display: inline-block;">
                                                        <span class="form-control-label"><?php echo $catalog["branch"]; ?></span>
                                                        <div class="custom-select2 col-6">
                                                            <select id="branch-modal" aria-label="Branch" data-product-attribute="1" name="branch-modal" class="form-control form-control-select">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--Color-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal  contColor">
                                                        <span class="form-control-label"><?php echo $catalog["color"]; ?></span>
                                                        <ul id="color">
                                                        </ul>
                                                    </div>
                                                    <!--Size-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contSize">
                                                        <span class="form-control-label"><?php echo $catalog["size"]; ?></span>
                                                        <div class="custom-select2 col-6">
                                                            <select id="size-modal" aria-label="Size" data-product-attribute="1" name="size-modal" class="form-control form-control-select">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--Date-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contCount">
                                                        <span class="form-control-label"><?php echo $schedule["seccion1_event_date"]; ?></span>
                                                        <div class="custom-select2 col-6">
                                                            <input type="date" id="date_sale" name="date_sale" class="form-control date_sale" value="">
                                                        </div>
                                                    </div>
                                                    <!--Date delivery-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contCount">
                                                        <span class="form-control-label"><?php echo $schedule["seccion1_date_delivery"]; ?></span>
                                                        <div class="custom-select2 col-6">
                                                            <input type="date" id="dateFin_rent" name="dateFin_rent" disabled class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <!--INE-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contCount">
                                                        <span class="form-control-label"><?php echo $schedule["seccion1_ine"]; ?></span>
                                                        <div class="custom-select2 col-6">
                                                            <input type="file" class="form-control-file" id="ine" name="ine">
                                                        </div>
                                                    </div>
                                                    <!--Address Proof-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contCount">
                                                        <span class="form-control-label"><?php echo $schedule["seccion1_address_proof"]; ?></span>
                                                        <div class="custom-select2 col-6">
                                                            <input type="file" class="form-control-file" id="address_proof" name="address_proof">
                                                        </div>
                                                    </div>
                                                    <!--Advance-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contCount">
                                                        <span class="form-control-label"><?php echo $schedule["seccion1_advance"]; ?></span>
                                                        <div class="custom-select2 col-6">
                                                            <input id="vAdvance" class="form-control" name="vAdvance" type="text" value="0" disabled >
                                                        </div>
                                                    </div>
                                                    <!--Count-->
                                                    <div class="col-5 clearfix product-variants-item product-variants-item-3 contModal contCount">
                                                        <span class="form-control-label"><?php echo $catalog["pieces"]; ?></span>
                                                        <div class="custom-select2 col-6">
                                                            <select id="count-modal" aria-label="Count" name="count-modal" class="form-control form-control-select">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--Button-->

                                                    <input type="hidden" class="hdn_dateFin_rent" name="hdn_dateFin_rent" value=""/>
                                                    <input type="hidden" class="hdn_date_schedule" name="hdn_date_schedule" value=""/>
                                                    <input type="hidden" class="hdn_price_rent" name="hdn_price_rent" value=""/>
                                                    <input type="hidden" class="hdn_advance_rent" name="hdn_advance_rent" value=""/>
                                                    
                                                    <div class="col-6 clearfix product-variants-item product-variants-item-3 contModal contButton">
                                                        <span class="form-control-label"><br></span>
                                                        <div class="add">
                                                            <span class="viewShedule btn btn-primary form-control-submit" onclick="valSchedule()"><?php echo $schedule["seccion1_button"]; ?></span>
                                                            <input class="btn btn-primary form-control-submit btnSend" type="submit" value="<?php echo $schedule["seccion1_button"]; ?>" style="display:none">
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="product-minimal-quantity js-product-minimal-quantity"></p>
                                            </div>
                                        <!--</form>-->
                                    </div>
                                    <div class="quickview-product-additional-info js-product-additional-info"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>