<?php

require_once "../config/global.php";
require_once "../models/Venta.php";
require "header.php";

$ventaChange = new Venta();

$ClientID = "Af-kCO0Z2xarPwT_mLY2r562VimqOvhpErOcc7gSlUSg6AdeRjVfFcyoyRvXtz1fo51nJNTOw3Lyllo2";
$Secret = "EKmI47hjUXPtuXf7ybp5ylXuBXpYLmmDNBitqeOmBg5knu6qP-KygbfwaHKdue9RcFDm17kYY2ITSFUn";
$Login = curl_init('https://api-m.sandbox.paypal.com/v1/oauth2/token');

curl_setopt($Login, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($Login, CURLOPT_USERPWD, $ClientID . ":" . $Secret);
curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$rspta = curl_exec($Login);
$objRespuesta = json_decode($rspta);
$AccessToken = $objRespuesta->access_token;

$venta = curl_init('https://api-m.sandbox.paypal.com/v1/payments/payment/' . $_GET['paymentID']);
curl_setopt($venta, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $AccessToken));
curl_setopt($venta, CURLOPT_RETURNTRANSFER, TRUE);
$rsptaVenta = curl_exec($venta);
$objDatosTransaccion = json_decode($rsptaVenta);

$state = $objDatosTransaccion->state;
$email = $objDatosTransaccion->payer->payer_info->email;
$total = $objDatosTransaccion->transactions[0]->amount->total;
$currency = $objDatosTransaccion->transactions[0]->amount->currency;
$custom = $objDatosTransaccion->transactions[0]->custom;

$clave = explode('#', $custom);
$SID = $clave[0];
$claveVenta = openssl_decrypt($clave[1], COD, KEY);
$rsptaVenta = str_replace("John Doe's", "John Doe", $rsptaVenta);

if ($state == "approved") {
  $mensajePaypal = "<h2 class='display-4' style='font-size: 30px;'>Pago aprovado</h2>";
  $ans = $ventaChange->editarPaypal($claveVenta, $rsptaVenta, "aprovado");
} else {
  $mensajePaypal = "<h3 class='display-4'>Hay un problema con el pago de paypal</h3>";
}
?>
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="jumbotron text-center">
              <?php echo $mensajePaypal;
              echo "Se limpio su carrito";
              ?>
              <hr class="my-4">
              <div id="paypal-button-container"></div>
              <p style="font-size: 18px;">
                Si se pudo hacer la transaccion.
                <br/>
                <strong>(Para aclaraciones: remnyachizot2015@gmail.com)</strong>
              </p>
            </div>
          </div>
        </div>
    </section>
  </div>
<?php
require "footer.php";
