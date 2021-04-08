<?php
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: login.php');
} else {
  require "headerAdmin.php";
  if ($_SESSION['cargo'] == 'administrador') {
    ?>
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h1 class="box-title"> Detalles de Ventas </h1>
                <div class="box-tools pull-right">
                </div>
                <div class="panel-body table-responsive" id="listadoregistros">
                  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                      <th>Num. Venta</th>
                      <th>Articulo</th>
                      <th>Cantidad</th>
                      <th>SubTotal</th>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <th>Num. Venta</th>
                      <th>Articulo</th>
                      <th>Cantidad</th>
                      <th>SubTotal</th>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-body table-reponsive" style="height: 350px;" id="listadoRegistros">
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
  } else {
    require "noacceso.php";
  }
  require "footerAdmin.php";
  ?>
  <script type="text/javascript" src="./scripts/detalleVenta.js"></script>
  <?php
}
ob_end_flush();
