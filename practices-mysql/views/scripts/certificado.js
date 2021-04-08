let table;

const init = () => {
  mostrarform(false);
  listar();
  $("#formulario").on("submit", (e) => {
    crear(e);
  });
  $.post("../ajax/certificado.php?op=selectTipoCertificado", (r) => {
    $("#tipocertificado").html(r);
    $("#tipocertificado").selectpicker('refresh');
  });
}

const limpiar = () => {
  $("#certificado").val("");
  $("#dni").val("");
  $("#anio").val("");
  $("#registro").val("");
  $("#tipocertificado").val("");
  $("#evento").val("");
}

const mostrarform = (flag) => {
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("btnagregar").hide();
  } else {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("btnagregar").show();
  }
}

const cancelarform = () => {
  limpiar();
  mostrarform(false);
}

const listar = () => {
  table = $('#tbllistado').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: "Bfrtip",
    buttons: ['copyHtml5', "excelHtml5", "csvHtml5", "pdf"],
    "ajax": {
      url: '../ajax/certificado.php?op=listar',
      type: "get",
      dataType: "json",
      error: (e) => {
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 20,
    "order": [[0, "desc"]]
  }).DataTable();
}

const crear = (e) => {
  e.preventDefault();
  $("#btnGuardar").prop("disabled", true);
  let formData = new FormData($("#formulario")[0]);
  $.ajax({
    url: '../ajax/certificado.php?op=create',
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

const mostrar = (certificado) => {
  $.post("../ajax/certificado.php?op=mostrar",
    {certificado: certificado},
    (data) => {
      data = JSON.parse(data);
      mostrarform(true);
      $("#certificado").val(data.certificado);
      $("#dni").val(data.dni);
      $("#evento").val(data.evento);
      $("#anio").val(data.anio);
      $("#registro").val(data.registro);
      $("#tipocertificado").val(data.tipocertificado);
      $("#tipocertificado").selectpicker('refresh');
    })
}

init();