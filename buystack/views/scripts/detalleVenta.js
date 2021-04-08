let table;

const init = () => {
  listar();
  $("#main-body").css("padding", "0");
}

const listar = () => {
  table = $("#tbllistado").dataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../ajax/detalle_venta.php?op=listar",
      type: "get",
      dataType: "json",
      error: (e) => {
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 10,
    "order": [[0, "desc"]]
  }).DataTable();
  $("#main-body").css("padding", "0");
}

init();
