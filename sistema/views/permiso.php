<?php
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
} else {
  require 'header.php';
  if ($_SESSION['acceso'] == 1) {
    ?>
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h1 class="box-title"> Permiso
                  <button class="btn btn-success" onclick="mostrarform(1)"><i class="fa fa-plus-circle">Agregar</i>
                  </button>
                </h1>
                <div style="" align="right">
                  <div class="panel-body" id="formularioregistros">
                    <form name="formulario" id="formulario" method="post">
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div align="left">
                          <label for="nombre" align="left">Nombre</label>
                        </div>
                        <input type="hidden" name="idpermiso" id="idpermiso">
                        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50"
                               placeholder="Nombre" required>
                      </div>
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary" type="submit" id="btnGuardar">
                          <i class="fa fa-save"></i>Guardar
                        </button>
                        <button class="btn btn-danger" onclick="cancelarform()" type="button">
                          <i class="fa fa-arrow-circle-left"></i>Cancelar
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="panel-body table-responsive" id="listadoregistros">
                  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover"
                         style="">
                    <thead>
                      <th>Nombre</th>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <th>Nombre</th>
                    </tfoot>
                  </table>
                </div>
                <div class="box-tools pull-right">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
  } else {
    require 'noacceso.php';
  }
  require 'footer.php';
  ?>
  <script type="text/javascript" src="./scripts/permiso.js"></script>
  <?php
}
ob_end_flush();
