<?php
require "header.php";
?>
<div class="container">
  <section class="content">
    <div class="row" style="
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin-right: 0px;
  margin-left: 0px;
">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="section-title">
              <h2 class="title"> Carrito </h2>
            </div>
            <div class="panel-body table-responsive" id="listadoregistros" style="margin-top: 2.5%;">
              <table id="tblistado" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>Articulo</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>SubTotal</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th>Articulo</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>SubTotal</th>
                </tfoot>
              </table>
              <div align="right" style="color: #D10024; font-size: 18px; font-weight: bold; margin-top: 1.6%;">TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong class="order-total" id="buyToTal" style="font-size: 20px;"></strong>
              </div>
            </div>
            <div class="box-tools pull-right">
            </div>
          </div>
          <div class="panel-body table-reponsive" style="height: 400px;" id="listadoRegistros"></div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
require "footer.php";
?>
<script src="../public/dataTables/jquery.dataTables.min.js"></script>
<script src="../public/dataTables/dataTables.buttons.min.js"></script>
<script src="../public/dataTables/buttons.colVis.min.js"></script>
<script src="../public/dataTables/buttons.html5.min.js"></script>
<script src="../public/dataTables/jszip.min.js"></script>
<script src="../public/dataTables/pdfmake.min.js"></script>
<script src="../public/dataTables/vfs_fonts.js"></script>
<script src="./scripts/car.js"></script>