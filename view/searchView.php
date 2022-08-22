<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>

            <section id="wrapper" class="paddingHeaderCatalog" style="min-height: 600px;">
                <div id="inner-wrapper" class="container">
                    <aside id="notifications"> </aside>
                    <div id="content-wrapper" class="js-content-wrapper">
                        <section id="main">
                            <section id="products">

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h3><?php echo $search["filter"]; ?></h3>
                                        <select id="search" name="search" class="form-control" onchange="location = this.value;">
                                            <option value="0">Selecciona una opción</option>
                                            <option value="<?php echo $helper->url("Catalog","index"); ?>"><?php echo $search["sale"]; ?></option>
                                            <option value="<?php echo $helper->url("CatalogRent","index"); ?>"><?php echo $search["rent"]; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                            </section>
                        </section>
                     </div>
                </div>
            </section>


            <?php include('footer.php') ?>
        </main>
        
        <?php include('linksFooter.php') ?>
    </body>
</html>