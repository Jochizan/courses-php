<?php
require "header.php";
$SID = session_id();
?>
<div id="breadcrumb" class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="breadcrumb-header">Detalles de Compra</h3>
        <ul class="breadcrumb-tree">
          <li><a href="index.php">Inicio</a></li>
          <li class="active">Detalles de Compra</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="section">
  <div class="container">
    <div class="row">
      <form method="post" id="frmAcceso">
        <div class="col-md-7">
          <div class="billing-details">
            <div class="section-title">
              <h3 class="title">Dirección de Envio</h3>
            </div>
            <div class="form-group">
              <input class="input" type="hidden" name="cargo" id="cargo" value="cliente">
              <input class="input" type="text" name="nombre" placeholder="Nombres"
                     value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ""; ?>" required>
            </div>
            <div class="form-group">
              <input class="input" type="text" name="apellidos" placeholder="Apellidos"
                     value="<?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ""; ?>" required>
            </div>
            <div class="form-group">
              <input class="input" type="email" name="email" placeholder="Correo"
                     value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>" required>
            </div>
            <div class="form-group">
              <input class="input" type="text" name="direccion" placeholder="Dirección"
                     value="<?php echo isset($_SESSION['direccion']) ? $_SESSION['direccion'] : ""; ?>" required>
            </div>
            <div class="form-group">
              <input class="input" type="text" name="ciudad" placeholder="Ciudad"
                     value="<?php echo isset($_SESSION['ciudad']) ? $_SESSION['ciudad'] : ""; ?>" required>
            </div>
            <div class="form-group">
              <input class="input" type="text" name="pais" placeholder="País"
                     value="<?php echo isset($_SESSION['pais']) ? $_SESSION['pais'] : ""; ?>" required>
            </div>
            <div class="form-group">
              <input class="input" type="text" name="codigo_postal" placeholder="Codigo Postal"
                     value="<?php echo isset($_SESSION['codigo_postal']) ? $_SESSION['codigo_postal'] : ""; ?>"
                     required>
            </div>
            <div class="form-group">
              <input class="input" type="tel" name="telefono" placeholder="Teléfono"
                     value="<?php echo isset($_SESSION['telefono']) ? $_SESSION['telefono'] : ""; ?>" required>
              <input class="input" type="hidden" name="imagen" id="imagen" value="default.jpg">
              <input class="input" type="hidden" name="SID" id="SID" value="<?php echo $SID; ?>">
            </div>
            <?php
            if (!isset($_SESSION['nombre'])) {
              echo '<div class="form-group">
              <div class="input-checkbox">
                <input type="checkbox" id="create-account">
                <label for="create-account">
                  <span></span>
                  Crear Cuenta?
                </label>
                <div class="caption">
                  <div align="left">
                    <label for="contraseña">Contraseña</label>
                  </div>
                  <input class="input" type="password" name="clave" id="clave" placeholder="Ingrese su Contraseña">
                </div>
              </div>
            </div>';
            }
            ?>
          </div>
          <div class="order-notes">
            <textarea class="input" placeholder="Notas del Pedido"></textarea>
          </div>
        </div>
        <div class="col-md-5 order-details">
          <div class="section-title text-center">
            <h3 class="title">SU ORDEN</h3>
          </div>
          <div class="order-summary">
            <div class="order-col">
              <div><strong>PRODUCTO</strong></div>
              <div><strong>TOTAL</strong></div>
            </div>
            <div id="orders">
            </div>
            <div class="order-col">
              <div>Envío</div>
              <div><strong>GRATIS</strong></div>
            </div>
            <div class="order-col">
              <div><strong>TOTAL</strong></div>
              <div><strong class="order-total" id="buyToTal">S/. 0.00</strong></div>
            </div>
          </div>
          <div class="payment-method">
            <div class="input-radio">
              <input type="radio" name="payment" id="payment-2">
              <label for="payment-2">
                <span></span>
                Pago con cheque
              </label>
              <div class="caption">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et
                  dolore magna aliqua.</p>
              </div>
            </div>
            <div class="input-radio">
              <input type="radio" name="payment" id="payment-3">
              <label for="payment-3">
                <span></span>
                Sistema de PayPal
              </label>
              <div class="caption">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et
                  dolore magna aliqua.</p>
              </div>
            </div>
          </div>
          <div class="input-checkbox">
            <input type="checkbox" id="terms" required>
            <label for="terms">
              <span></span>
              He leído y acepto los <a href="#" style="color: #D10024;">términos y condiciones</a>
            </label>
          </div>
          <div align="center">
            <button type="submit" class="primary-btn order-submit">Realizar Pedido</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
require "footer.php";
?>
<script type="text/javascript" src="scripts/checkout.js"></script>
