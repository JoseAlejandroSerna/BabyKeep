<?php if($view != "Catalog" && $view != "CatalogRent" && $view != "ProductRent" && $view != "Product" && $view != "Schedule"){ ?>
<script src="js/eventsSite.js"></script>
<?php } ?>
<?php if($view == "Catalog"){ ?>
    <script src="js/eventsCatalog.js"></script>
    <script src="js/catalog.js"></script>
<?php } ?>
<?php if($view == "CatalogRent"){ ?>
    <script src="js/eventsCatalog.js"></script>
    <script src="js/catalogRent.js"></script>
<?php } ?>
<?php if($view == "Product"){ ?>
    <script src="js/eventsCatalog.js"></script>
    <script src="js/product.js"></script>
<?php } ?>
<?php if($view == "ProductRent"){ ?>
    <script src="js/eventsCatalog.js"></script>
    <script src="js/productRent.js"></script>
    <script src="js/pay.js"></script>
<?php } ?>
<?php if($view == "Contact"){ ?>
    <script src="js/contact.js"></script>
<?php } ?>
<?php if($view == "Account"){ ?>
    <script src="js/account.js"></script>
<?php } ?>
<?php if($view == "Login"){ ?>
    <script src="js/login.js"></script>
<?php } ?>
<?php if($view == "Schedule"){ ?>
    <script src="js/eventsCatalog.js"></script>
    <script src="js/schedule.js"></script>
    <script src="js/pay.js"></script>
<?php } ?>
<?php if($view == "Pay"){ ?>
    <script src="js/pay.js"></script>
<?php } ?>
<?php if($view == "User"){ ?>
    <script src="js/user.js"></script>
<?php } ?>

<script src="js/cart.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;700&amp;display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;700&amp;display=swap" media="all" onload="this.media='all'">