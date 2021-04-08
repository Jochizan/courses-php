<?php
require "register.php";
?>
<?php
require_once "./config/global.php";
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (isset($_POST["submit"])) {
  if (0 < strlen($_POST["name"]) && 0 < strlen($_POST["password1"]) && 0 < strlen($_POST["password2"]) && 0 < strlen($_POST["email"])) {
    $name = trim($_POST["name"]);
    $password1 = trim($_POST["password1"]);
    $password2 = trim($_POST["password2"]);
    $fechaRegistro = date("d/m/y");
    $email = trim($_POST["email"]);
    $consulta = "INSERT INTO usuario(nombre_usuario, contraseña, fecha_registro, correo) VALUES ('$name', '$password1', '$fechaRegistro', '$email')";
    $verificar = mysqli_query($connection, "SELECT * FROM usuario WHERE nombre_usuario='$name'");
    if (mysqli_num_rows($verificar) != 0) {
      ?>
      <h4 style="color: #ff3d41; font-family: Verdana; margin-top: 40px;" align="center"> EL NOMBRE DE USUARIO YA
        EXISTE</h4>
      <?php
      exit();
    }
    $results = mysqli_query($connection, $consulta);
    if ($results) {
      if ($password1 == $password2) {
        ?>
        <h4 style="color: #46f74c; font-family: Verdana; margin-top: 40px;" align="center">REGISTRO COMPLETADO</h4>
        <?php
      } else {
        ?>
        <h4 style="color: #ff3d41; font-family: Verdana; margin-top: 40px;" align="center">LAS CONTRASEÑAS NO
          COINCIDEN</h4>
        <?php
      }
    } else {
      ?>
      <h4 style="color: lightcoral; font-family: Verdana; margin-top: 40px;" align="center">NO SE PUDO REGISTRAR
        CORRECTAMENTE</h4>
      <?php
    }
  } else {
    ?>
    <h4 style="color: lightcoral; font-family: Verdana; margin-top: 40px;" align="center">COMPLETE TODOS LOS CAMPOS</h4>
    <?php
  }
}
