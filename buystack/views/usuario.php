<?php
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
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
                <h1 class="box-title"> Usuario
                  <button class="btn btn-success" id="btnagregar" onclick="mostrarform(1)">
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
                      <th>Telefono</th>
                      <th>Email</th>
                      <th>Cargo</th>
                      <th>Login</th>
                      <th>Foto</th>
                      <th>Estado</th>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Telefono</th>
                      <th>Email</th>
                      <th>Cargo</th>
                      <th>Login</th>
                      <th>Foto</th>
                      <th>Estado</th>
                    </tfoot>
                  </table>
                </div>
                <div class="panel-body" id="formularioregistros">
                  <form name="formulario" id="formulario" method="post">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="nombre">Nombre(*):</label>
                      <input type="hidden" name="idusuario" id="idusuario">
                      <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100"
                             placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Tipo_Documento">Tipo Documento(*):</label>
                      <select name="tipo_documento" id="tipo_documento" class="form-control select-picker"
                              required>
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="CEDULA">CEDULA</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Numero">Número(*):</label>
                      <input type="text" name="num_documento" id="num_documento" class="form-control"
                             maxlength="20" placeholder="Documento" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Dirección">Dirección:</label>
                      <input type="text" class="form-control" name="direccion" id="direccion" maxlength="70"
                             placeholder="Dirección">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Telefono">Teléfono:</label>
                      <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20"
                             placeholder="Telefono">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Cargo">Email:</label>
                      <input type="text" class="form-control" name="email" id="email" maxlength="50"
                             placeholder="Email">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Cargo">Cargo:</label>
                      <input type="text" class="form-control" name="cargo" id="cargo" maxlength="20"
                             placeholder="Cargo">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Login">Login(*):</label>
                      <input type="text" class="form-control" name="login" id="login" maxlength="20" placeholder="Login"
                             required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Clave">Clave(*):</label>
                      <input type="password" class="form-control" name="clave" id="clave" maxlength="64"
                             placeholder="Clave"
                             required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="Imagen">Imagen</label>
                      <input type="file" class="form-control" name="imagen" id="imagen">
                      <input type="hidden" name="imagenactual" id="imagenactual">
                      <img src="" width="150px" height="120px" id="imagenmuestra" alt="Imagen del usuario">
                    </div>
                    <div align="right">
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary" type="submit" id="btnGuardar">
                          <i class="fa fa-save"></i>Guardar
                        </button>
                        <button class="btn btn-danger" onclick="cancelarform()" type="button">
                          <i class="fa fa-arrow-circle-left"></i>Cancelar
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel-body table-reponsive" style="height: 300px;" id="listadoRegistros">
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
  <script type="text/javascript" src="./scripts/usuario.js"></script>
  <?php
}
ob_end_flush();
