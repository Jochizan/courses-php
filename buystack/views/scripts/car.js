let table;

const init = () => {
  mostrarform(false);
  listar();
  $("#formulario").on("submit", (e) => {
    guardaryeditar(e);
  })
}

const limpiar = () => {
  $("#nombre").val("");
  $("#descripcion").val("");
  $("#codigo").val("");
};

const mostrarform = (flag) => {
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
  } else {
    $("#listadoregistros").show();
  }
};

const cancelarform = () => {
  limpiar();
  mostrarform(false);
};

const listar = () => {
  table = $("#tblistado").dataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../api/api-carrito.php?action=listarCarrito",
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
}


const mostrar = (idarticulo) => {
  $.post("../api/carrito/api-carrito.php?action=mostrar",
    {idarticulo: idarticulo},
    (data) => {
      data = JSON.parse(data);
      mostrarform(true);
      $("#nombre").val(data.nombre);
      $("#descripcion").val(data.descripcion);
      $("#idarticulo").val(data.idarticulo);
    })
}

const activar = (idarticulo) => {
  bootbox.confirm("¿Esta seguro que quiere activar la categoria?", (result) => {
    if (result) {
      $.post("../ajax/categoria.php?op=activar",
        {idarticulo: idarticulo},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
}

const desactivar = (idarticulo) => {
  bootbox.confirm("¿Esta seguro que quiere desactivar la categoria?", (result) => {
    if (result) {
      $.post("../ajax/categoria.php?op=desactivar",
        {idarticulo: idarticulo},
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        });
    }
  })
}

init();

