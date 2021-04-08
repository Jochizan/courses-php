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
                <h1 class="box-title"> Categorias
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
                      <th>Descripcion</th>
                      <th>Estado</th>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Estado</th>
                    </tfoot>
                  </table>
                </div>
                <div class="panel-body" id="formularioregistros">
                  <form name="formulario" id="formulario" method="post">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div align="left">
                        <label for="nombre" align="left">Nombre</label>
                      </div>
                      <input type="hidden" name="idcategoria" id="idcategoria">
                      <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50"
                             placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div align="left">
                        <label for="descripcion">Descripción</label>
                      </div>
                      <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256"
                             placeholder="Descripción">
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
  <script type="text/javascript" src="./scripts/categoria.js"></script>
  <?php
}
ob_end_flush();

