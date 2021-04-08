const pedidoBuyStack = () => {
  let codigo_postal = $("#codigo_postal").val();
  let direccion = $("#direccion").val();
  let apellidos = $("#apellidos").val();
  let telefono = $("#telefono").val();
  let nombre = $("#nombre").val();
  let ciudad = $("#ciudad").val();
  let pais = $("#pais").val();
  let email = $("#email").val();
  let clave = $("#clave").val();
  let SID = $("#SID").val();
  if (clave) {
    $.post("../ajax/usuario.php?op=guardaryeditar",
      {
        nombre: nombre, apellidos: apellidos,
        telefono: telefono, direccion: direccion,
        codigo_postal: codigo_postal, ciudad: ciudad,
        pais: pais, email: email, clave: clave,
        imagen: "default.jpg", login: nombre,
        cargo: "cliente"
      },
      (data) => {
        console.log(data);
        bootbox.alert(data);
      })
    $.post("../ajax/usuario.php?op=verificar",
      {clavea: clave, logina: nombre},
      (data) => {
        console.log(data);
        bootbox.alert(data);
      })
  }
  $.post("../ajax/venta.php?op=newVenta",
    {clavetransaccion: SID, condicion: "pendiente"},
    (data) => {
      data = JSON.parse(data);
      (data)
        ? bootbox.alert("Se pudo crear su pedido")
        : bootbox.alert("No se pudo crear su pedido")
    }
  )
}


$("#frmAcceso").on('submit', (e) => {
  e.preventDefault();
  pedidoBuyStack();
  $(location).attr("href", "pago.php");
})
