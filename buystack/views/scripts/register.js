$("#frmAcceso").on('submit', (e) => {
  e.preventDefault();
  let formData = new FormData($("#frmAcceso")[0]);
  console.log(formData);
  $.ajax({
    url: '../ajax/usuario.php?op=guardaryeditar',
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: (datos) => {
      bootbox.alert(datos);
    }
  })
})
