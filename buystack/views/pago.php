<script src="//www.paypalobjects.com/api/checkout.js"></script>
<?php
require_once "../api/Carrito.php";
require_once "../models/Venta.php";
require_once "../config/global.php";
require "header.php";
$venta = new Venta();
$rspta = $venta->getRecentId();
while ($reg = $rspta->fetch_object()) {
  $data = array(
    "idventa" => $reg->idventa,
    "fecha_hora" => $reg->fecha_hora,
    "idusuario" => $reg->idusuario,
    "clavetransaccion" => $reg->clavetransaccion,
    "total_compra" => $reg->total_compra
  );
}
$SID = $data['clavetransaccion'];
$idVenta = $data['idventa'];
$total_compra = $data['total_compra'];
?>
<div class="container">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="jumbotron text-center">
            <h1 class="display-4">¡ Paso Final !</h1>
            <hr class="my-4">
            <p class="lead"> Estas a punto de pagar la cantidad de:</p>
            <h4 id="total-pago"
                style="font-size: 28px;"><?php echo "S/. " . $total_compra . " o $ " . number_format($total_compra * 0.27, 2); ?></h4>
            <div id="paypal-button-container"></div>
            <p>
              Los productos llegaran a su destino dependiendo de los datos ingresados.
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
?>
<script type="text/javascript">
  paypal.Button.render({

    env: 'sandbox',  // sandbox | production
    locale: 'es_PA',

    style: {
      size: 'medium',
      color: 'gold',
      shape: 'pill',
      label: 'pay',
      layout: 'horizontal',
      tagline: false,
      height: 50
    },

    client: {
      sandbox: 'Af-kCO0Z2xarPwT_mLY2r562VimqOvhpErOcc7gSlUSg6AdeRjVfFcyoyRvXtz1fo51nJNTOw3Lyllo2'
    },

    payment: function (data, actions) {
      return actions.payment.create({
        payment: {
          transactions: [
            {
              amount: {total: <?php echo round($total_compra * 0.27); ?>, currency: 'USD'},
              description: "Compra de productos a BuyStack: <?php echo number_format($total_compra * 0.27, 2);?>",
              custom: "<?php echo $SID; ?>#<?php echo openssl_encrypt($idVenta, COD, KEY); ?>"
            }
          ]
        }
      })
    },

    onAuthorize: function (data, actions) {
      return actions.payment.execute().then(function () {
        console.log(data);
        window.location = 'verificador.php?paymentToken=' + data.paymentToken + "&paymentID=" + data.paymentID;
      })
    },

    onCancel: function (data, actions) {
      $(location).attr("href", "checkout.php");
    }
  }, '#paypal-button-container');
</script>