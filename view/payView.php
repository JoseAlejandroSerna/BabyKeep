
<?php

    if (isset($_POST['btn_cart_products'])) 
    {
        $name = $_POST["name"];
        $paterno = "";
        $materno = "";
        $tel = $_SESSION['vPhone'];
        $email= $_SESSION['vEmail'];

        $monto = $_POST["hdnTotal"];
        $descripcion = 'Cargo de prueba';
        $token = $_POST["token_id"];
        $use_points = $_POST["use_card_points"];
        $device_session_id = $_POST["deviceIdHiddenFieldName"];
        $openpay = Openpay::getInstance('malfh4hxezobdf1dwgoo', 'pk_7237629f0c0744638989cd72b3965ee5');
        //Guardar cliente
        $correo =$email;
        $nombre = $name;
        $ape_paterno = $paterno;
        $ape_materno = $materno;
        $telefono = $tel;
        $cliente = array('correo' => $correo, 'nombre' => $nombre, 'ape_paterno' => $ape_paterno, 'ape_materno' => $ape_materno, 'telefono' => $telefono, 'fecha_creado' => date('Y-m-d H:i:s'));
        $customer = array('name' => $nombre, 'last_name' => $ape_paterno, 'phone_number' => $telefono, 'email' => $correo);
        $cod_cliente = $this->cliente_m->guardarCliente($cliente);

        if ($cod_cliente) {
            //Guardar Cabecero
            $orden_cab = array('cod_cliente' => $cod_cliente, 'total' => $total, 'fecha_orden' => date('Y-m-d H:i:s'));
            $cod_orden = $this->orden_m->guardarCabOrden($orden_cab);
            if ($cod_orden) {
                //Guardar Detalle
                $caracteres = array('-e', '-m', '-a', '-', 'e', 'm', 'a');
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $item) {
                        if ($this->cart->has_options($item['rowid']) == TRUE) {
                            foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value) {
                                if ($option_name == 'Tarifa') {
                                    $tipo_tarifa = $option_value;
                                }
                                if ($option_name == 'Tipo') {
                                    $tipo_orden = $option_value;
                                }
                                if ($option_name == 'Fecha Reservación') {
                                    $fecha_reservacion = $option_value;
                                }
                            }
                        }
                        $id = str_replace($caracteres, "", $item['id']);
                        $orden_det = array('cod_cab' => $cod_orden, 'cod_paquete' => $id, 'tipo_orden' => $tipo_orden, 'tipo_tarifa' => $tipo_tarifa, 'cantidad' => $item['qty'], 'subtotal' => $item['subtotal'], 'fecha_reservacion' => $fecha_reservacion, 'fecha_orden' => date('Y-m-d H:i:s'));
                        $cod_det = $this->orden_m->guardarDetOrden($orden_det);
                    }
                }
                if ($cod_det) {
                    $chargeData = array('method' => 'card', 'source_id' => $token, 'amount' => (double) $monto, 'description' => $descripcion, 'use_card_points' => $use_points, 'device_session_id' => $device_session_id, 'customer' => $customer, 'currency' => 'MXN', 'order_id' => $cod_orden);
                    //$this->cart->destroy();
                    try {
                        $charge = $openpay->charges->create($chargeData);
                        if ($charge) {
                            $id_respuesta = $charge->id;
                            $status_respuesta = $charge->status;
                            $autorizacion_respuesta = $charge->authorization;
                            $error_message = $charge->error_message;
                            $this->actualizar_orden($cod_orden, $id_respuesta, $status_respuesta, $autorizacion_respuesta);
                            if ($status_respuesta == 'completed') {
                                if (!$this->mensaje->EnviarCorreoConfirmacionTransaccion($nombre, $correo, $id_respuesta)) {
                                    echo "Error al enviar correo de transaccion";
                                    //$this->session->set_userdata('danger', 'Error al enviar correo de transaccion.');
                                }
                                //$this->cart->destroy();
                                //$this->session->set_userdata('success', 'Gracias por su preferencia.');
                                //redirect('carrito');
                                echo "Gracias por su preferencia.";
                            }
                            //$this->cart->destroy();
                            //$this->session->set_userdata('danger', 'No se pudo realizar la transaccion.');
                            //redirect('carrito');
                            echo "No se pudo realizar la transaccion.";
                        } else {
                            //$this->session->set_userdata('danger', 'No se pudo realizar el pago, intentelo de nuevo.');
                            //redirect('carrito');
                            //$this->cart->destroy();
                            echo "No se pudo realizar el pago, intentelo de nuevo.";
                        }
                    } catch (Exception $e) {
                        //var_dump($e);
                        //$this->session->set_userdata('danger', 'No se pudo realizar la transaccion, intentelo de nuevo.');
                        //redirect('carrito');
                        echo "No se pudo realizar la transaccion, intentelo de nuevo.";
                    }
                } else {
                    //$this->session->set_userdata('danger', 'No se pudo guardar el detalle del pedido, intentelo de nuevo.');
                    //redirect('carrito');
                    echo "No se pudo guardar el detalle del pedido, intentelo de nuevo.";
                }
            } else {
                //$this->session->set_userdata('danger', 'No se pudo guardar el cabecero del pedido, intentelo de nuevo.');
                //redirect('carrito');
                echo "No se pudo guardar el cabecero del pedido, intentelo de nuevo.";
            }
        } else {
            //$this->session->set_userdata('danger', 'No se pudo guardar el cliente, intentelo de nuevo.');
            //redirect('carrito');
            echo "No se pudo guardar el cliente, intentelo de nuevo.";
        }
        //Realizar Transaccion
    }
?>

<html lang="en" class="">
    <?php include('header.php') ?>
    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>

            <style>
                .heading{font-size: 40px;margin-top: 35px;margin-bottom: 30px;padding-left: 20px}.card{border-radius: 10px !important;margin-top: 60px;margin-bottom: 60px}.form-card{margin-left: 20px;margin-right: 20px}.form-card input, .form-card textarea, .btn-pay,.btn-pay-span{padding: 10px 15px 5px 15px;border: none;border: 1px solid lightgrey;border-radius: 6px;margin-bottom: 25px;margin-top: 2px;width: 100%;box-sizing: border-box;font-family: arial;color: #2C3E50;font-size: 14px;letter-spacing: 1px}.form-card input:focus, .form-card textarea:focus{-moz-box-shadow: 0px 0px 0px 1.5px #997c00 !important;-webkit-box-shadow: 0px 0px 0px 1.5px #997c00 !important;box-shadow: 0px 0px 0px 1.5px #997c00 !important;font-weight: bold;border: 1px solid #997c00;outline-width: 0}.input-group{position:relative;width:100%;overflow:hidden}.input-group input{position:relative;height:80px;margin-left: 1px;margin-right: 1px;border-radius:6px;padding-top: 30px;padding-left: 25px}.input-group label{position:absolute;height: 24px;background: none;border-radius: 6px;line-height: 48px;font-size: 15px;color: gray;width:100%;font-weight:100;padding-left: 25px}input:focus + label{color: #000}.btn-pay,.btn-pay-span{background-color: #997c00;height: 60px;color: #ffffff !important;font-weight: bold}.btn-pay:hover,.btn-pay-span:hover{background-color: #997c00}.fit-image{width: 100%;object-fit: cover}img{border-radius: 5px}.radio-group{position: relative;margin-bottom: 25px}.radio{display:inline-block;border-radius: 6px;box-sizing: border-box;border: 2px solid lightgrey;cursor:pointer;margin: 12px 25px 12px 0px}.radio:hover{box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.2)}.radio.selected{box-shadow: 0px 0px 0px 1px rgba(0, 0, 155, 0.4);border: 2px solid #997c00}.label-radio{font-weight: bold;color: #000000}
            </style>
            <script>
                var service_pay = "<?php echo $helper->url("Pay","pay"); ?>";
            </script>
            <section id="wrapper" class="paddingHeaderCatalog">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class=" col-lg-6 col-md-8">
                            <div class="card p-3">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <h2 class="heading text-center"><?php echo $pay["title"]; ?></h2>
                                    </div>
                                </div>

                                <!--<form id="payment-form" method="post" action="<?php echo $helper->url($view,"pay"); ?>" class="form-card">-->
                                <form action="#" method="POST" id="payment-form" class="form-card">    
                                    <input type="hidden" name="token_id" id="token_id">
                                    <input type="hidden" name="use_card_points" id="use_card_points" value="false">
                                    <input type="hidden" name="hdnTotal" id="hdnTotal" value="0">

                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="input-group"> 
                                                <input type="text" data-openpay-card="holder_name" id="name" placeholder="John Doe" autocomplete="off" data-openpay-card="holder_name" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)"> <label><?php echo $pay["name"]; ?></label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="input-group"> 
                                            <input type="text" autocomplete="off" data-openpay-card="card_number" id="c_number" placeholder="0000 0000 0000 0000" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" minlength="16" maxlength="16"><label><?php echo $pay["card"]; ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group"> 
                                                        <input type="text" placeholder="MM" data-openpay-card="expiration_month" id="c_month" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" minlength="2" maxlength="2" class="exp"> <label>Mes</label> 
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input type="text" placeholder="YY" data-openpay-card="expiration_year" id="c_year" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" minlength="2" maxlength="2"> <label>Año</label> 
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input type="text" placeholder="&#9679;&#9679;&#9679;" autocomplete="off" data-openpay-card="cvv2" id="c_cvv" minlength="3" maxlength="3"><label>CVV</label> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="input-group"> 
                                                <p><b>Comisión:</b> </p><p id="comission"></p> 
                                            </div>
                                            <div class="input-group"> 
                                                <p><b>Subotal:</b> </p><p id="subtotal"></p> 
                                            </div>
                                            <div class="input-group"> 
                                                <p><b>Envio:</b> </p><p id="sending"></p> 
                                            </div>
                                            <div class="input-group"> 
                                                <p><b>Total:</b> </p><p id="total"></p> 
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center">
                                        <div class="col-md-12"> 
                                            <span class="btn btn-pay-span placeicon" onclick="valCard()"><?php echo $pay["pay"]; ?></span>
                                            <input type="submit" value="<?php echo $pay["pay"]; ?>"name="btn_cart_products" class="btn btn-pay placeicon" style="display:none;"> 
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php include('footer.php') ?>
        </main>
        
        <?php include('linksFooter.php') ?>

    </body>
</html>