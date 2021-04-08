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
                <h1 class="box-title"> Ventas </h1>
                <div class="box-tools pull-right">
                </div>
                <div class="panel-body table-responsive" id="listadoregistros">
                  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                      <th>Usuario</th>
                      <th>Clave de Trans.</th>
                      <th>Fecha Hora</th>
                      <th>Total</th>
                      <th>Condicion</th>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <th>Usuario</th>
                      <th>Clave de Trans.</th>
                      <th>Fecha Hora</th>
                      <th>Total</th>
                      <th>Condicion</th>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-body table-reponsive" style="height: 204px;" id="listadoRegistros">
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
  } else {
    require 'noacceso.php';
  }
  require "footerAdmin.php";
  ?>
  <script type="text/javascript" src="./scripts/venta.js"></script>
  <?php
}
ob_end_flush();
