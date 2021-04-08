<?php
require_once "./config/global.php";
  $usuario = isset($_POST['user']) ? $_POST["user"] : "";
  $contraseña = isset($_POST['password']) ? $_POST["password"] : "";
  session_start();
  $_SESSION['usuario'] = $usuario;
  $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  $consulta = "SELECT * FROM usuario WHERE nombre_usuario='$usuario' and contraseña='$contraseña'";
  $results = mysqli_query($connection, $consulta);
  $rows = mysqli_num_rows($results);

  if ($rows) {
    ?>
    <?php
    require "login.php";
    ?>
    <h4 style="color: #46f74c; font-size: 40px" align="center"> SESIÓN INICIADA CORRECTAMENTE </h4>
    <?php
  } else {
    ?>
    <?php
    require "login.php";
    ?>
    <h4 style="color: #ff3d41; font-size: 40px;" align="center"> USUARIO NO ENCONTRADO </h4>
    <?php
  }
  mysqli_free_result($results);
  mysqli_close($connection);
