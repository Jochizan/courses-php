let table;

console.log("Hola mundo");

const init = () => {
  mostrarform(false);
  listar();
  $("#formulario").on("submit", (e) => {
    guardaryeditar(e);
  });
  $.post("../ajax/articulo.php?op=selectCategoria", (r) => {
    $("#idcategoria").html(r);
    $("#idcategoria").selectpicker('refresh');
  });
  $("#imagenmuestra").hide();
}

const limpiar = () => {
  $("#codigo").val("");
  $("#nombre").val("");
  $("#descripcion").val("");
  $("#stock").val("");
  $("#imagenmuestra").attr("src", "");
  $("#imagenactual").val("");
  $("#print").hide();
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
      url: '../ajax/articulo.php?op=listar',
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
    url: '../ajax/articulo.php?op=guardaryeditar',
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

const mostrar = (idarticulo) => {
  $.post("../ajax/articulo.php?op=mostrar",
    {idarticulo: idarticulo},
    (data) => {
      data = JSON.parse(data);
      mostrarform(true);
      $("#idcategoria").val(data.idcategoria);
      $("#idcategoria").selectpicker('refresh');
      $("#codigo").val(data.codigo);
      $("#nombre").val(data.nombre);
      $("#stock").val(data.stock);
      $("#descripcion").val(data.descripcion);
      $("#imagenmuestra").show();
      $("#imagenmuestra").attr("src", "../files/articulos/" + data.imagen);
      $("#imagenmuestra").val(data.imagen);
      $("#idarticulo").val(data.idarticulo);
      generarbarcode();
    })
}

const activar = (idarticulo) => {
  bootbox.confirm("¿Esta seguro de activar el articulo?", (result) => {
    if (result) {
      $.post("../ajax/articulo.php?op=activar",
        {idarticulo: idarticulo},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
}

const desactivar = (idarticulo) => {
  bootbox.confirm("¿Esta seguro de desactivar el articulo?", (result) => {
    if (result) {
      $.post("../ajax/articulo.php?op=desactivar",
        {idarticulo: idarticulo},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
}

const generarbarcode = () => {
  codigo = $("#codigo").val();
  JsBarcode("#barcode", codigo);
  $("#print").show();
}

const imprimir = () => {
  $("#print").printArea();
  $("#idarticulo").val("");
}

init();

