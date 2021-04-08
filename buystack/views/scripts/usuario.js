let table;

const init = () => {
  mostrarform(false);
  listar();
  $("#formulario").on("submit", (e) => {
    guardaryeditar(e);
  });
  $("#imagenmuestra").hide();
}

const limpiar = () => {
  $("#nombre").val("");
  $("#num_documento").val("");
  $("#direccion").val("");
  $("#telefono").val("");
  $("#email").val("");
  $("#cargo").val("");
  $("#login").val("");
  $("#clave").val("");
  $("#imagenmuestra").attr("src", "");
  $("#imagenactual").val("");
  $("#idusuario").val("");
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
      url: '../ajax/usuario.php?op=listar',
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
    url: '../ajax/usuario.php?op=guardaryeditar',
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

const mostrar = (idusuario) => {
  $.post("../ajax/usuario.php?op=mostrar",
    {idusuario: idusuario},
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
      $("#cargo").val(data.cargo);
      $("#login").val(data.login);
      $("#clave").val(data.clave);
      $("#imagenmuestra").show();
      $("#imagenmuestra").attr("src", "../img/usuarios/" + data.imagen);
      $("#imagenactual").val(data.imagen);
      $("#idusuario").val(data.idusuario);
    })
}

const activar = (idusuario) => {
  bootbox.confirm("¿Esta seguro de activar el usuario?", (result) => {
    if (result) {
      $.post("../ajax/usuario.php?op=activar",
        {idusuario: idusuario},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
}

const desactivar = (idusuario) => {
  bootbox.confirm("¿Esta seguro de desactivar el usuario?", (result) => {
    if (result) {
      $.post("../ajax/usuario.php?op=desactivar",
        {idusuario: idusuario},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
}

init();