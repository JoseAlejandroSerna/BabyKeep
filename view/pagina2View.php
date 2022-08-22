<!DOCTYPE HTML>
<html lang="es">
    <head>
        <?php include('header.php') ?>
    </head>
    <body>
        <?php include('menu.php') ?>
        <?php if(isset($allprueba) && count($allprueba)>=1) {?>
		<div class="col-lg-12">
            <h3><?php echo $allinfo["title"]; ?></h3>
            <hr/>
            <p>
                View: <?php echo $view;?> <br>
                Idioma: <?php echo $_SESSION['idLanguage']; ?> <br>
                title: <?php echo $car["title"]; ?> <br>
                shipping: <?php echo $car["shipping"]; ?> <br>
                pay: <?php echo $car["pay"]; ?> <br>
            </p>
        </div>
		 <section class="col-lg-12 producto" style="height:400px;overflow-y:scroll;">
            <?php foreach($allprueba as $prueba) {?>
                <?php echo $prueba->id; ?> -
                <?php echo $prueba->text; ?>
                <hr/>
            <?php } ?>
        </section>
		 <?php } ?>
        <?php include('footer.php') ?>
    </body>
</html>