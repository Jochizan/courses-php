<?php
require 'header.php';
?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title"> Certificado
              <button class="btn btn-success" id="btnagregar" onclick="mostrarform(1)">
                <i class="fa fa-plus-circle">Agregar</i>
              </button>
            </h1>
            <div class="box-tools pull-right">
            </div>
            <div class="panel-body table-responsive" id="listadoregistros">
              <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>Certificado</th>
                  <th>DNI</th>
                  <th>Evento</th>
                  <th>Año</th>
                  <th>Registro</th>
                  <th>Tipo Certificado</th>
                </thead>
                <tbody>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tbody>
                <tfoot>
                  <th>Certificado</th>
                  <th>DNI</th>
                  <th>Evento</th>
                  <th>Año</th>
                  <th>Registro</th>
                  <th>Tipo Certificado</th>
                </tfoot>
              </table>
            </div>
            <div class="panel-body" id="formularioregistros">
              <form name="formulario" id="formulario" method="post">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div align="left">
                    <label for="certificado" align="left">Certificado</label>
                  </div>
                  <input type="text" class="form-control" name="certificado" id="certificado" maxlength="50"
                         placeholder="Certificado" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div align="left">
                    <label for="dni">DNI</label>
                  </div>
                  <input type="text" class="form-control" name="dni" id="dni" maxlength="256"
                         placeholder="DNI">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div align="left">
                    <label for="evento">Evento</label>
                  </div>
                  <input type="text" class="form-control" name="evento" id="evento" maxlength="256"
                         placeholder="Evento">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div align="left">
                    <label for="año">Año</label>
                  </div>
                  <input type="text" class="form-control" name="anio" id="anio" maxlength="256"
                         placeholder="Año">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div align="left">
                    <label for="registro">Registro</label>
                  </div>
                  <input type="text" class="form-control" name="registro" id="registro" maxlength="256"
                         placeholder="Registro">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="tipoCertificado">TipoCertificado</label>
                  <select name="tipocertificado" id="tipocertificado" class="form-control select-picker"
                          data-live-search="true">
                  </select>
                </div>
                <div align="right" style="margin-right: 4.0%;">
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
require 'footer.php';
?>
<script type="text/javascript" src="./scripts/certificado.js"></script>
