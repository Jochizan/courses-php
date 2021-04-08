<?php
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
} else {
  require "header.php";
  if ($_SESSION['compras'] == 1) {
    ?>
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h1 class="box-title"> Proveedor
                  <button class="btn btn-success" onclick="mostrarform(1)">
                    <i class="fa fa-plus-circle">Agregar</i>
                  </button>
                </h1>
                <div class="box-tools pull-right">
                </div>
                <div class="panel-body table-responsive" id="listadoregistros">
                  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Documento</th>
                      <th>Número</th>
                      <th>Telefono</th>
                      <th>Email</th>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Documento</th>
                      <th>Número</th>
                      <th>Telefono</th>
                      <th>Email</th>
                    </tfoot>
                  </table>
                </div>
                <div class="panel-body" id="formularioregistros">
                  <form name="formulario" id="formulario" method="post">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="nombre">Nombre</label>
                      <input type="hidden" name="idpersona" id="idpersona">
                      <input type="hidden" name="tipo_persona" id="tipo_persona" value="Proveedor">
                      <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100"
                             placeholder="Nombre del Proveedor" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Tipo_Documento">Tipo Documento</label>
                      <select name="tipo_documento" id="tipo_documento" class="form-control select-picker"
                              required>
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="CEDULA">CEDULA</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Numero_Documento">Número Documento</label>
                      <input type="text" name="num_documento" id="num_documento" class="form-control"
                             placeholder="Documento" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Dirección">Dirección</label>
                      <input type="text" class="form-control" name="direccion" id="direccion" maxlength="70"
                             placeholder="Dirección">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Telefono">Telefono</label>
                      <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20"
                             placeholder="Telefono">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Email">Email</label>
                      <input type="text" class="form-control" name="email" id="email" maxlength="50"
                             placeholder="Email">
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
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
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
  } else {
    require 'noacceso.php';
  }
  require "footer.php";
  ?>
  <script type="text/javascript" src="./scripts/proveedor.js"></script>
  <?php
}
ob_end_flush();

