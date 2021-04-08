<?php
require "header.php";
?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title"> Tipos Certificados
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
                  <th>Tipo Certificado</th>
                  <th>Descripción</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Tipo Certificado</th>
                  <th>Descripción</th>
                </tfoot>
              </table>
            </div>
            <div class="panel-body" id="formularioregistros">
              <form name="formulario" id="formulario" method="post">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div align="left">
                    <label for="descripción">Descripción</label>
                  </div>
                  <input type="hidden" class="form-control" name="tipocertificado" id="tipocertificado">
                  <input type="text" class="form-control" name="tipodescripcion" id="tipodescripcion" maxlength="256"
                         placeholder="Descripción" required>
                </div>
                <div align="right" style="margin-right: 4.0%;">
                  <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar" style="margin-right: 1.0%;">
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
      </div>
    </div>
  </section>
</div>
<?php
require "footer.php";
?>
<script type="text/javascript" src="./scripts/tipoCertificado.js"></script>
