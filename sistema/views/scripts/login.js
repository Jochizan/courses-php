$("#frmAcceso").on('submit', (e) => {
  e.preventDefault();
  let logina = $("#logina").val();
  let clavea = $("#clavea").val();
  $.post("../ajax/usuario.php?op=verificar",
    {"logina": logina, "clavea": clavea},
    (data) => {
      if (data) {
        $(location).attr("href", "categoria.php");
      } else {
        bootbox.alert("Usuario y/o Contraseñas incorrectos.")
      }
    });
})