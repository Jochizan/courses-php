"use strict";
let table;

const init = () => {
  mostrarform(false);
  listar();
  $("#formulario").on("submit", (e) => {
    guardaryeditar(e);
  })
}

const limpiar = () => {
  $("#idpermiso").val("");
  $("#nombre").val("");
};

const mostrarform = (flag) => {
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
  } else {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
  }
};

const cancelarform = () => {
  limpiar();
  mostrarform(false);
};

const listar = () => {
  table = $("#tbllistado").dataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../ajax/permiso.php?op=listar",
      type: "get",
      dataType: "json",
      error: (e) => {
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 5, // Paginación
    "order": [[0, "desc"]] // Orden columna orden
  }).DataTable();
};

const guardaryeditar = (e) => {
  e.preventDefault();
  $("#btnGuardar").prop("disabled", true);
  let formData = new FormData($("#formulario")[0]);
  $.ajax({
    url: '../ajax/permiso.php?op=guardaryeditar',
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      bootbox.alert(datos);
      mostrarform(false);
      table.ajax.reload();
    }
  });
  limpiar();
}

const mostrar = (idcategoria) => {
  $.post("../ajax/permiso.php?op=mostrar",
    {idcategoria: idcategoria},
    (data) => {
      data = JSON.parse(data);
      mostrarform(true);
      $("#nombre").val(data.nombre);
      $("#idpermiso").val(data.idpermiso);
    })
}

init();