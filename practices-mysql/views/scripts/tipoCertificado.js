let table;

const init = () => {
  mostrarform(false);
  listar();
  $("#formulario").on("submit", (e) => {
    crear(e);
  });
}

const limpiar = () => {
  $("#tipocertificado").val("");
  $("#tipodescripcion").val("");

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
      url: '../ajax/tipoCertificado.php?op=listar',
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
    url: '../ajax/tipoCertificado.php?op=create',
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
  $.post("../ajax/tipoCertificado.php?op=mostrar",
    {tipocertificado: certificado},
    (data) => {
      data = JSON.parse(data);
      mostrarform(true);
      console.log(data);
      $("#tipocertificado").val(data.tipocertificado);
      $("#tipodescripcion").val(data.tipodescripcion);
    })
}

init();
