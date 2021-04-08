"use strict";
let table;

const init = () => {
  mostrarform(false);
  listar();
  $("#formulario").on("submit", (e) => {
    guardaryeditar(e);
  })
  $("#main-body").css("padding", "0");
}

const limpiar = () => {
  $("#nombre").val("");
  $("#descripcion").val("");
  $("#codigo")
  $("#main-body").css("padding", "0");
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
  $("#main-body").css("padding", "0");
};

const cancelarform = () => {
  limpiar();
  mostrarform(false);
  $("#main-body").css("padding", "0");
};

const listar = () => {
  table = $("#tbllistado").dataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../ajax/categoria.php?op=listar",
      type: "get",
      dataType: "json",
      error: (e) => {
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 10, // Paginación
    "order": [[0, "desc"]] // Orden columna orden
  }).DataTable();
  $("#main-body").css("padding", "0");
};

const guardaryeditar = (e) => {
  e.preventDefault();
  $("#btnGuardar").prop("disabled", true);
  let formData = new FormData($("#formulario")[0]);
  $.ajax({
    url: '../ajax/categoria.php?op=guardaryeditar',
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
  $("#main-body").css("padding", "0");
}


const mostrar = (idcategoria) => {
  $.post("../ajax/categoria.php?op=mostrar",
    {idcategoria: idcategoria},
    (data) => {
      data = JSON.parse(data);
      mostrarform(true);
      $("#nombre").val(data.nombre);
      $("#descripcion").val(data.descripcion);
      $("#idcategoria").val(data.idcategoria);
    })
  $("#main-body").css("padding", "0");
}

const activar = (idcategoria) => {
  bootbox.confirm("¿Esta seguro que quiere activar la categoria?", (result) => {
    if (result) {
      $.post("../ajax/categoria.php?op=activar",
        {idcategoria: idcategoria},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
  $("#main-body").css("padding", "0");
}

const desactivar = (idcategoria) => {
  bootbox.confirm("¿Esta seguro que quiere desactivar la categoria?", (result) => {
    if (result) {
      $.post("../ajax/categoria.php?op=desactivar",
        {idcategoria: idcategoria},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
  $("#main-body").css("padding", "0");
}

init();

