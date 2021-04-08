let table;

const init = () => {
  mostrarform(false);
  listar();
  $("#formulario").on("submit", (e) => {
    guardaryeditar(e);
  });
}

const limpiar = () => {
  $("#nombre").val("");
  $("#num_documento").val("");
  $("#direccion").val("");
  $("#telefono").val("");
  $("#email").val("");
  $("#idpersona").val("");
}

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
      url: '../ajax/persona.php?op=listarp',
      type: "get",
      dataType: "json",
      error: (e) => {
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 5,
    "order": [[0, "desc"]]
  }).DataTable();
}

const guardaryeditar = (e) => {
  e.preventDefault();
  $("#btnGuardar").prop("disabled", true);
  let formData = new FormData($("#formulario")[0]);
  $.ajax({
    url: '../ajax/persona.php?op=guardaryeditar',
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

const mostrar = (idpersona) => {
  $.post("../ajax/persona.php?op=mostrar",
    {idpersona: idpersona},
    (data) => {
      data = JSON.parse(data);
      mostrarform(true);
      $("#nombre").val(data.nombre);
      $("#tipo_documento").val(data.tipo_documento);
      $("#tipo_documento").selectpicker('refresh');
      $("#num_documento").val(data.num_documento);
      $("#direccion").val(data.direccion);
      $("#telefono").val(data.telefono);
      $("#email").val(data.email);
      $("#idpersona").val(data.idpersona);
    })
}

const eliminar = (idpersona) => {
  bootbox.confirm("¿Esta seguro de eliminar el proveedor?", (result) => {
    if (result) {
      $.post("../ajax/persona.php?op=eliminar",
        {idpersona: idpersona},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
}

init();