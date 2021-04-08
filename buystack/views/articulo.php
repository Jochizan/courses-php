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
                <h1 class="box-title"> Articulo
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
                      <th>Categoria</th>
                      <th>Codigo</th>
                      <th>Stock</th>
                      <th>Imagen</th>
                      <th>Estado</th>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Categoria</th>
                      <th>Codigo</th>
                      <th>Stock</th>
                      <th>Imagen</th>
                      <th>Estado</th>
                    </tfoot>
                  </table>
                </div>
                <div class="panel-body" id="formularioregistros">
                  <form name="formulario" id="formulario" method="post">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="nombre">Nombre(*):</label>
                      <input type="hidden" name="idarticulo" id="idarticulo">
                      <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100"
                             placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="categoria">Categoria(*):</label>
                      <select name="idcategoria" id="idcategoria" class="form-control select-picker"
                              data-live-search="true">
                      </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="stock">Stock(*):</label>
                      <input type="number" class="form-control" name="stock" id="stock" required
                             placeholder="Stock">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="descripcion">Descripción</label>
                      <input type="text" class="form-control" name="descripcion" id="descripcion"
                             maxlength="256" placeholder="Descripción" maxlength="256" placeholder="Descripción">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="imagen">Imagen</label>
                      <input type="file" class="form-control" name="imagen" id="imagen">
                      <input type="hidden" name="imagenactual" id="imagenactual">
                      <img src="" width="150px" height="150px" id="imagenmuestra">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="codigo">Codigo</label>
                      <input type="text" class="form-control" name="codigo" id="codigo"
                             placeholder="Codigo Barras">
                      <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar
                      </button>
                      <button class="btn btn-info" type="button" onclick="imprimir()">Imprimir</button>
                      <div id="print">
                        <svg id="barcode"></svg>
                      </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="precio">Precio</label>
                      <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio">
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
            <div class="panel-body table-reponsive" style="height: 200px;" id="listadoRegistros">
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
  <script type="text/javascript" src="./scripts/articulo.js"></script>
  <?php
}
ob_end_flush();
