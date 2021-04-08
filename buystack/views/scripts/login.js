$("#formulario").on('submit', (e) => {
  e.preventDefault();
  let formData = new FormData($("#formulario")[0]);
  $.ajax({
    url: '../ajax/usuario.php?op=verificar',
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: (datos) => {
      if (datos === "null") {
        bootbox.alert("NO se pudo verificar el usuario intentelo de nuevo")
      } else {
        bootbox.alert(datos);
        datos = JSON.parse(datos);
        if (datos.cargo === "administrador") {
          $(location).attr('href', 'categoria.php');
        } else {
          $(location).attr('href', 'index.php');
        }
      }
    }
  })
})
