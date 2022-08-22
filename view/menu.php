<?php
if (isset($_POST['btn_cart_products'])) {
    $cart_products = $_POST['cart_products'];

    session_start();
    $_SESSION['cart_products'] = $cart_products;
    header("Location: ".$helper->url($view,'index'));
}

if (!isset($_SESSION['idUser'])) {          $_SESSION['idUser'] = "0";          }
if (!isset($_SESSION['idPermissions'])) {   $_SESSION['idPermissions'] = "0";   }
if (!isset($_SESSION['vUser'])) {           $_SESSION['vUser'] = "";            }
if (!isset($_SESSION['vEmail'])) {          $_SESSION['vEmail'] = "";           }
if (!isset($_SESSION['vPassword'])) {       $_SESSION['vPassword'] = "";        }
if (!isset($_SESSION['vPhone'])) {          $_SESSION['vPhone'] = "";           }
if (!isset($_SESSION['vAddress'])) {        $_SESSION['vAddress'] = "";         }
if (!isset($_SESSION['vCP'])) {             $_SESSION['vCP'] = "";              }
if (!isset($_SESSION['vComent'])) {         $_SESSION['vComent'] = "";          }
if (!isset($_SESSION['iStatus'])) {         $_SESSION['iStatus'] = "";          }

if (!isset($_SESSION['vSending'])) {        $_SESSION['vSending'] = "0";        }
if (!isset($_SESSION['vCommission'])) {     $_SESSION['vCommission'] = "0";     }

if (!isset($_SESSION['cart_products'])) {   $_SESSION['cart_products'] = "[]";}
if (!isset($_SESSION['hdn_cart'])) {        $_SESSION['hdn_cart'] = "[]";}
?>
<script>
    var varView = '<?php echo $view; ?>';
    var strBranch = 'Sucursal';
    var strSize = '<?php echo $menu["size"]; ?>';
    var strColor = '<?php echo $menu["color"]; ?>';
    var strPieces = '<?php echo $menu["pieces"]; ?>';
    var info_lenguages = '<?php echo json_encode($alllenguages); ?>';

    /// Session User
    var session_idUser = '<?php echo json_encode($_SESSION['idUser']); ?>';
    var JSON_session_idUser = JSON.parse(session_idUser);
    var session_idPermissions = '<?php echo json_encode($_SESSION['idPermissions']); ?>';
    var JSON_session_idPermissions = JSON.parse(session_idPermissions);
    var session_vUser = '<?php echo json_encode($_SESSION['vUser']); ?>';
    var JSON_session_vUser = JSON.parse(session_vUser);
    var session_vEmail = '<?php echo json_encode($_SESSION['vEmail']); ?>';
    var JSON_session_vEmail = JSON.parse(session_vEmail);
    var session_vPassword = '<?php echo json_encode($_SESSION['vPassword']); ?>';
    var JSON_session_vPassword = JSON.parse(session_vPassword);
    var session_vPhone = '<?php echo json_encode($_SESSION['vPhone']); ?>';
    var JSON_session_vPhone = JSON.parse(session_vPhone);
    var session_vAddress = '<?php echo json_encode($_SESSION['vAddress']); ?>';
    var JSON_session_vAddress = JSON.parse(session_vAddress);
    var session_vCP = '<?php echo json_encode($_SESSION['vCP']); ?>';
    var JSON_session_vCP = JSON.parse(session_vCP);
    var session_vComent = '<?php echo json_encode($_SESSION['vComent']); ?>';
    var JSON_session_vComent = JSON.parse(session_vComent);
    var session_iStatus = '<?php echo json_encode($_SESSION['iStatus']); ?>';
    var JSON_session_iStatus = JSON.parse(session_iStatus);

    /// Session Cart
    var session_cart_products = '<?php echo json_encode($_SESSION['cart_products']); ?>';
    var JSON_Cart = <?php echo $_SESSION['cart_products']; ?>;
    
    var session_hdn_cart = '<?php echo json_encode($_SESSION['hdn_cart']); ?>';
    var JSON_hdn_cart = <?php echo $_SESSION['hdn_cart']; ?>;
    
    var todayDate = new Date().toISOString().slice(0, 10);
    var idAdmin = '<?php echo $_SESSION['idUser'] ?>';
    // Send
    var strComission = '<?php echo $_SESSION['vCommission'] ?>';
    var strSending = '<?php echo $_SESSION['vSending'] ?>';

    var commission = 0;
    var commission_percentage = parseFloat(strComission);
    var sending = parseFloat(strSending);

    var idTypePayment = "2";
    var vDateCreation = todayDate;

</script>

<?php if($view == "Catalog" || $view == "Product" || $view == "CatalogRent" || $view == "ProductRent" || $view == "Schedule"){ ?>
<script>
    var info_admin_product = '<?php echo json_encode($info_admin_product); ?>';
    var info_admin_stock_product = '<?php echo json_encode($info_admin_stock_product); ?>';
    var info_admin_branch = '<?php echo json_encode($info_admin_branch); ?>';
    var info_admin_type_product = '<?php echo json_encode($info_admin_type_product); ?>';
    var info_admin_type_purchase = '<?php echo json_encode($info_admin_type_purchase); ?>';
    var info_admin_color = '<?php echo json_encode($info_admin_color); ?>';
    var info_admin_size = '<?php echo json_encode($info_admin_size); ?>';

    var JSON_products = JSON.parse(info_admin_product);
    var JSON_stock_products = JSON.parse(info_admin_stock_product);
    var JSON_branch = JSON.parse(info_admin_branch);
    var JSON_type_products = JSON.parse(info_admin_type_product);
    var JSON_type_purchase = JSON.parse(info_admin_type_purchase);
    var JSON_color = JSON.parse(info_admin_color);
    var JSON_size = JSON.parse(info_admin_size);
</script>
<?php } ?>

<?php if($view == "Login" || $view == "Account"){ ?>
<script>
    var all_user = '<?php echo json_encode($all_user); ?>';
    var JSON_all_user = JSON.parse(all_user);
</script>
<?php } ?>

<header id="header" class="desktop-header-style-w-3">
	<div class="header-banner"> </div>
	<div id="desktop-header" class="desktop-header-style-3">
		<div class="header-top">
			<div id="desktop-header-container" class="container">
				<div class="row align-items-center">
                    <div class="col col-auto col-header-left">
                        <div id="desktop_logo">
                            
                            <!--Form account-->
                            <form method="post" class="row" action="<?php echo $helper->url("Account","create"); ?>" style="display:none;">

                                <input type="hidden" class="hdn_name" name="hdn_name" value=""/>
                                <input type="hidden" class="hdn_email" name="hdn_email" value=""/>
                                <input type="hidden" class="hdn_password" name="hdn_password" value=""/>
                                <input type="hidden" class="hdn_phone" name="hdn_phone" value=""/>
                                <input type="hidden" class="hdn_address" name="hdn_address" value=""/>
                                <input type="hidden" class="hdn_cp" name="hdn_cp" value=""/>
                                <input type="hidden" class="hdn_coment" name="hdn_coment" value=""/>

                                <button type="submit" class="btn-link btn_account" name="btn_account" style="display:none;">Cart</button>
                            </form>
                            <!--Form login-->
                            <form method="post" class="row" action="<?php echo $helper->url("Login","login"); ?>" style="display:none;">

                                <input type="hidden" class="hdn_idUser" name="hdn_idUser" value=""/>
                                <input type="hidden" class="hdn_idPermissions" name="hdn_idPermissions" value=""/>
                                <input type="hidden" class="hdn_vUser" name="hdn_vUser" value=""/>
                                <input type="hidden" class="hdn_vEmail" name="hdn_vEmail" value=""/>
                                <input type="hidden" class="hdn_vPassword" name="hdn_vPassword" value=""/>
                                <input type="hidden" class="hdn_vPhone" name="hdn_vPhone" value=""/>
                                <input type="hidden" class="hdn_vAddress" name="hdn_vAddress" value=""/>
                                <input type="hidden" class="hdn_vCP" name="hdn_vCP" value=""/>
                                <input type="hidden" class="hdn_vComent" name="hdn_vComent" value=""/>
                                <input type="hidden" class="hdn_iStatus" name="hdn_iStatus" value=""/>

                                <button type="submit" class="btn-link btn_login" name="btn_login" style="display:none;">Cart</button>
                            </form>
                            <!--Form cart-->
                            <form method="post" class="row" style="display:none;">
                                <input type="hidden" class="cart_products" name="cart_products" value=""/>
                                <button type="submit" class="btn-link btn_cart_products" name="btn_cart_products" style="display:none;">Cart</button>
                            </form>
                            <form method="post" class="row" action="<?php echo $helper->url("Catalog","pay"); ?>" style="display:none;">
                                
                                <input type="hidden" class="hdn_idUser" 		name="hdn_idUser" value=""/>
                                <input type="hidden" class="hdn_idAdmin" 		name="hdn_idAdmin" value=""/>
                                <input type="hidden" class="hdn_iCommission" 	name="hdn_iCommission" value=""/>
                                <input type="hidden" class="hdn_iSending" 		name="hdn_iSending" value=""/>
                                <input type="hidden" class="hdn_iSubtotal" 		name="hdn_iSubtotal" value=""/>
                                <input type="hidden" class="hdn_iTotal" 		name="hdn_iTotal" value=""/>
                                <input type="hidden" class="hdn_vDateCreation" 	name="hdn_vDateCreation" value=""/>
                                <input type="hidden" class="hdn_iStatus" 		name="hdn_iStatus" value="0"/>
                                <input type="hidden" class="hdn_idTypePayment" 	name="hdn_idTypePayment" value=""/>
                                <input type="hidden" class="hdn_cart" name="hdn_cart" value=""/>

                                <button type="submit" class="btn_pay" name="btn_pay" style="display:none;">User</button>
                            </form>
                            
                            <!--Lenguage-->
                            <form method="post" class="row" action="<?php echo $helper->url("Main","getLanguage"); ?>">
                                <select name="idLanguage_menu" class="form-control selMenu" onchange="this.form.submit()">
                                    <?php foreach($alllenguages as $language) {?>
                                    <option value="<?php echo $language->idLanguage; ?>" <?php if($_SESSION["idLanguage"] == $language->idLanguage){ echo " selected"; }?>>
                                        <?php echo $language->vLanguage; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
					<div class="col col-header-center">
						<div class="header-custom-html">
							<p style="text-align:center;"><?php echo $menu["title"]; ?></p>
						</div>
					</div>
					<div class="col col-auto col-header-right">
						<div class="row no-gutters justify-content-end">
                            <!--USER-->
                            <?php if($_SESSION['idUser'] != "0"){ ?>
                                
                                <?php if($_SESSION['idPermissions'] == "1"){ ?>
                                    <div class="col col-auto header-btn-w header-user-btn-w">
                                        <a href="<?php echo $helper->url("User","index"); ?>" title="Log in" rel="nofollow" class="header-btn header-user-btn"> 
                                            <span class="nameUser"><?php echo $_SESSION['vUser']; ?></span> 
                                        </a>
                                    </div>
                                <?php }else{ ?>
                                    <div class="col col-auto header-btn-w header-user-btn-w">
                                        <a href="<?php echo $helper->url("Admin","index"); ?>" title="Log in" rel="nofollow" class="header-btn header-user-btn"> 
                                            <span class="nameUser"><?php echo $_SESSION['vUser']; ?></span> 
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <!--Social -->
                            <div class="block-content">
                                <ul class="social-links _footer" itemscope="" itemtype="https://schema.org/Organization" itemid="#store-organization">
                                    <?php foreach($info_admin_socialNetworks as $socialNetworks) {?>

                                        <?php if($socialNetworks->vUrlFacebook != ""){?>
                                            <li class="facebook">
                                                <a itemprop="sameAs" href="<?php echo $socialNetworks->vUrlFacebook; ?>" target="_blank" rel="noreferrer noopener">
                                                    <i class="fa fa-facebook fa-fw" aria-hidden="true"></i>
                                                </a>
                                            </li>  
                                        <?php }?>
                                        <?php if($socialNetworks->vUrlInstagram != ""){?>
                                            <li class="instagram">
                                                <a itemprop="sameAs" href="<?php echo $socialNetworks->vUrlInstagram; ?>" target="_blank" rel="noreferrer noopener">
                                                    <i class="fa fa-instagram fa-fw" aria-hidden="true"></i>
                                                </a>
                                            </li>  
                                        <?php }?>
                                        <?php if($socialNetworks->vUrlTwitter != ""){?>
                                            <li class="twitter">
                                                <a itemprop="sameAs" href="<?php echo $socialNetworks->vUrlTwitter; ?>" target="_blank" rel="noreferrer noopener">
                                                    <i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
                                                </a>
                                            </li>  
                                        <?php }?>
                                        <?php if($socialNetworks->vUrlPinterest != ""){?>
                                            <li class="pinterest">
                                                <a itemprop="sameAs" href="<?php echo $socialNetworks->vUrlPinterest; ?>" target="_blank" rel="noreferrer noopener">
                                                    <i class="fa fa-pinterest fa-fw" aria-hidden="true"></i>
                                                </a>
                                            </li>  
                                        <?php }?>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!--SIGN IN-->
                            <?php if($_SESSION['idUser'] == "0"){ ?>
							<div id="header-user-btn" class="col col-auto header-btn-w header-user-btn-w">
								<a href="<?php echo $helper->url("Login","index"); ?>" title="Log in" rel="nofollow" class="header-btn header-user-btn"> 
                                    <i class="fa fa-user fa-fw icon" aria-hidden="true"></i> 
                                    <span class="title"><?php echo $menu["sign_in"]; ?></span> 
                                </a>
							</div>
                            <?php } ?>
                            <!--CART-->
							<div id="ps-shoppingcart-wrapper" class="col col-auto">
								<div id="ps-shoppingcart" class="header-btn-w header-cart-btn-w ps-shoppingcart side-cart">
									<div id="blockcart" class="blockcart cart-preview" data-refresh-url="//iqit-commerce.com/ps17/demo14/en/module/ps_shoppingcart/ajax">
										<a id="cart-toogle" class="cart-toogle header-btn header-cart-btn" data-toggle="dropdown" data-display="static"> 
                                            <i class="fa fa-shopping-bag fa-fw icon" aria-hidden="true">
                                                <span class="cart-products-count-btn "></span>
                                            </i>
										</a>
										<div id="_desktop_blockcart-content" class="dropdown-menu-custom dropdown-menu">
											<div id="blockcart-content" class="blockcart-content">
												<div class="cart-title"> 
                                                    <span class="modal-title"><?php echo $car["title"]; ?></span>
													<button type="button" id="js-cart-close" class="close"> <span>×</span> </button>
													<hr> 
                                                </div>
												<ul class="cart-products"></ul>

												<div class="cart-subtotals">
													<div class="cart-summary-line" id="cart-subtotal-products"> 
                                                        <span class="label js-subtotal"> Subtotal </span> 
                                                        <span class="value subtotal-product"> </span> 
                                                    </div>
													<div class="cart-summary-line" id="cart-subtotal-shipping"> 
                                                        <span class="label"> IVA</span> 
                                                        <span class="value iva-product"></span>
                                                    <div>
													<div class="cart-summary-line" id="cart-sending-products"> 
                                                        <span class="label js-subtotal"> Envio </span> 
                                                        <span class="value sending-product"> </span> 
                                                    </div>
                                                    <small class="value"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-totals">
                                            <div class="clearfix"> 
                                                <span class="label">Total</span> 
                                                <span class="value float-right total-product"></span> 
                                            </div>
                                        </div>
                                        <div class="cart-buttons text-center"> 
                                            <span class="btn btn-primary btn-block btn-lg mb-2" onclick="valCart()"><?php echo $car["pay"]; ?></span>
                                        </div>
                                        <div class="messaje-login text-center"> 
                                            <a href="<?php echo $helper->url("Login","index"); ?>" class="btn btn-primary btn-block btn-lg mb-2">Resgistrate para seguir con tu compra</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row"> </div>
            </div>
        </div>
    </div></div>

    <div class="container iqit-megamenu-container">
        <div class="sticky-desktop-wrapper">
            <div id="iqitmegamenu-wrapper" class="iqitmegamenu-wrapper iqitmegamenu-all">
                <div class="container container-iqitmegamenu">
                    <div id="iqitmegamenu-horizontal" class="iqitmegamenu  clearfix" role="navigation">
                        <nav id="cbp-hrmenu" class="cbp-hrmenu cbp-horizontal cbp-hrsub-narrow">
                            <ul>
                                <li id="cbp-hrmenu-tab-3" class="cbp-hrmenu-tab cbp-hrmenu-tab-3  cbp-has-submeu">
                                    <div class="col col-auto col-header-left">
                                        <div id="desktop_logo">
                                            <a href="<?php echo $helper->url("Main","index"); ?>"> 
                                                <img class="logo img-fluid logoMenu" src="/assets/images/branch/logo.png" alt="Baby Keep"> 
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li id="cbp-hrmenu-tab-3" class="cbp-hrmenu-tab cbp-hrmenu-tab-3  cbp-has-submeu">
                                    <a href="<?php echo $helper->url("Designer","index"); ?>" class="nav-link"> 
                                        <span class="cbp-tab-title">
                                            <?php echo $menu["designer"]; ?> 
                                            <i class="fa fa-angle-down cbp-submenu-aindicator"></i>
                                        </span> 
                                    </a>
                                </li>
                                <li id="cbp-hrmenu-tab-5" class="cbp-hrmenu-tab cbp-hrmenu-tab-5  cbp-has-submeu">
                                    <a href="<?php echo $helper->url("Search","index"); ?>" class="nav-link"> 
                                        <span class="cbp-tab-title">
                                            <?php echo $menu["catalog"]; ?>  
                                            <i class="fa fa-angle-down cbp-submenu-aindicator"></i>
                                        </span> 
                                    </a>
                                </li>
                                <li id="cbp-hrmenu-tab-50" class="cbp-hrmenu-tab cbp-hrmenu-tab-50  cbp-has-submeu">
                                    <a href="<?php echo $helper->url("Schedule","index"); ?>" class="nav-link"> 
                                        <span class="cbp-tab-title">
                                            <?php echo $menu["schedule"]; ?>  
                                            <i class="fa fa-angle-down cbp-submenu-aindicator"></i>
                                        </span> 
                                    </a>
                                </li>
                                <li id="cbp-hrmenu-tab-49" class="cbp-hrmenu-tab cbp-hrmenu-tab-49 pull-right cbp-pulled-right ">
                                    <a href="<?php echo $helper->url("Contact","index"); ?>" class="nav-link"> 
                                        <span class="cbp-tab-title">
                                            <?php echo $menu["contact"]; ?>  
                                        </span> 
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div id="sticky-cart-wrapper"></div>
            </div>
        </div>
        <div id="_desktop_iqitmegamenu-mobile">
            <div id="iqitmegamenu-mobile">
                <ul>
                    <li><a href="<?php echo $helper->url("Main","index"); ?>"><?php echo $menu["main"]; ?>  </a></li>
                    <li><a href="<?php echo $helper->url("Designer","index"); ?>"><?php echo $menu["designer"]; ?>  </a></li>
                    <li><a href="<?php echo $helper->url("Search","index"); ?>"><?php echo $menu["catalog"]; ?>  </a></li>
                    <li><a href="<?php echo $helper->url("Schedule","index"); ?>"><?php echo $menu["schedule"]; ?>  </a></li>
                    <li><a href="<?php echo $helper->url("Contact","index"); ?>"><?php echo $menu["contact"]; ?>  </a></li>
                    <li>
                        <form method="post" class="col">
                            <select name="idLanguage_menu" class="form-control selMenuMobil" onchange="this.form.submit()">
                                <?php foreach($alllenguages as $language) {?>
                                <option value="<?php echo $language->idLanguage; ?>" <?php if($_SESSION["idLanguage"] == $language->idLanguage){ echo " selected"; }?>>
                                    <?php echo $language->vLanguage; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	</div>
	<div id="mobile-header" class="mobile-header-style-3">
		<div class="container">
			<div class="mobile-main-bar">
				<div class="col-mobile-logo text-center">
					<a href="<?php echo $helper->url("Main","index"); ?>"> 
                        <img class="logo img-fluid logoMenu" src="/assets/images/branch/logo.png" alt="Baby Keep"> 
                    </a>
				</div>
			</div>
		</div>
		<div id="mobile-header-sticky">
			<div class="mobile-buttons-bar">
				<div class="container">
					<div class="row no-gutters align-items-center row-mobile-buttons">
						<div class="col  col-mobile-btn col-mobile-btn-menu text-center col-mobile-menu-push"> 
                            <a class="m-nav-btn" data-toggle="dropdown" data-display="static">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                                <span>Menu</span>
                            </a>
							<div id="mobile_menu_click_overlay"></div>
							<div id="_mobile_iqitmegamenu-mobile" class="text-left dropdown-menu-custom dropdown-menu"></div>
						</div>
                        <!--USER-->
                        <?php if($_SESSION['idUser'] != "0"){ ?>
                            
                            <?php if($_SESSION['idPermissions'] == "1"){ ?>
                            <div class="col col-mobile-btn col-mobile-btn-account text-center"> 
                                <a href="<?php echo $helper->url("User","index"); ?>" class="m-nav-btn">
                                    <span class="nameUser"><?php echo $_SESSION['vUser']; ?></span> 
                                </a> 
                            </div>
                            <?php }else{ ?>
                                <div class="col col-mobile-btn col-mobile-btn-account text-center"> 
                                    <a href="<?php echo $helper->url("Admin","index"); ?>" class="m-nav-btn">
                                        <span class="nameUser"><?php echo $_SESSION['vUser']; ?></span> 
                                    </a> 
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <?php if($_SESSION['idUser'] == "0"){ ?>
						<div class="col col-mobile-btn col-mobile-btn-account text-center"> 
                            <a href="<?php echo $helper->url("Login","index"); ?>" class="m-nav-btn">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span><?php echo $menu["sign_in"]; ?></span>
                            </a> 
                        </div>
                        <?php } ?>
						<div class="col col-mobile-btn col-mobile-btn-cart ps-shoppingcart text-center side-cart">
							<div id="mobile-cart-wrapper"> 
                                <a id="mobile-cart-toogle" class="m-nav-btn" data-display="static" data-toggle="dropdown">
                                    <i class="fa fa-shopping-bag mobile-bag-icon" aria-hidden="true">
                                        <span id="mobile-cart-products-count" class="cart-products-count cart-products-count-btn"> </span>
                                    </i>
                                    <span><?php echo $menu["cart"]; ?></span>
                                </a>
								<div id="_mobile_blockcart-content" class="dropdown-menu-custom dropdown-menu"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>