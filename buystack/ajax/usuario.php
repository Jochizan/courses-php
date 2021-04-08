<?php
session_start();
require_once "../models/Usuario.php";
$usuario = new Usuario();
$idUsuario = isset($_POST["idusuario"]) ? limpiarCadena($_POST["idusuario"]) : "";
$codigo_postal = isset($_POST["codigo_postal"]) ? limpiarCadena($_POST["codigo_postal"]) : "";
$apellidos = isset($_POST["apellidos"]) ? limpiarCadena($_POST["apellidos"]) : "";
$direccion = isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]) : "";
$telefono = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$imagen = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";
$ciudad = isset($_POST["ciudad"]) ? limpiarCadena($_POST["ciudad"]) : "";
$email = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";
$cargo = isset($_POST["cargo"]) ? limpiarCadena($_POST["cargo"]) : "";
$login = isset($_POST["login"]) ? limpiarCadena($_POST["login"]) : $nombre;
$clave = isset($_POST["clave"]) ? limpiarCadena($_POST["clave"]) : "";
$pais = isset($_POST["pais"]) ? limpiarCadena($_POST["pais"]) : "";

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if ($imagen != "default.jpg") {
      if (!file_exists($_FILES["imagen"]["tmp_name"]) || !is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
        $imagen = $_POST["imagenactual"];
      } else {
        $ext = explode(".", $_FILES["imagen"]["name"]);
        if ($_FILES["imagen"]["type"] == "image/jpg" || $_FILES["imagen"]["type"] == "image/jpeg" || $_FILES["imagen"]["type"] == "image/png") {
          $imagen = round(microtime(true)) . '.' . end($ext);
          move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/usuarios/" . $imagen);
        }
      }
    }
    $clavehash = hash("SHA256", $clave);
    if (empty($idUsuario)) {
      $rspta = $usuario->insertar($nombre, $direccion, $telefono, $email, $cargo, $login, $clavehash, $imagen, $apellidos, $pais, $codigo_postal, $ciudad);
      echo $rspta
        ? "Ususario registrado"
        : "Ususario no se pudo registrar";
    } else {
      $rspta = $usuario->editar($idUsuario, $nombre, $direccion, $telefono, $email, $cargo, $login, $clavehash, $imagen, $apellidos, $pais, $codigo_postal, $ciudad);
      echo $rspta
        ? "Usuario actualizado"
        : "Usuario no se pudo actualizar";
    }
    break;
  case 'desactivar':
    $rspta = $usuario->desactivar($idUsuario);
    echo $rspta
      ? "Usuario desactivado"
      : "Usuario no se pudo desactivar";
    break;
  case 'activar':
    $rspta = $usuario->activar($idUsuario);
    echo $rspta
      ? "Usuario activado"
      : "Usuario no se pudo activar";
    break;
  case 'mostrar':
    $rspta = $usuario->mostrar($idUsuario);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $usuario->listar();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $data[] = array(
        "0" => ($reg->condicion)
          ? '<button class="btn btn-warning" onclick="mostrar(' . $reg->idusuario . ')">
            <i class="fa fa-pencil"></i>
          </button>' .
          '<button class="btn btn-danger" onclick="desactivar(' . $reg->idusuario . ')">
            <i class="fa fa-close"></i>
          </button>'
          : '<button class="btn btn-warning" onclick="mostrar(' . $reg->idusuario . ')">
            <i class="fa fa-pencil"></i>
          </button>' .
          '<button class="btn btn-primary" onclick="activar(' . $reg->idusuario . ')">
          <i class="fa fa-check"></i>
          </button>',
        "1" => $reg->nombre,
        "2" => $reg->telefono,
        "3" => $reg->email,
        "4" => $reg->cargo,
        "5" => $reg->login,
        "6" => "<img src='../img/usuarios/" . $reg->imagen . "' height='50px' width='50px'>",
        "7" => ($reg->condicion)
          ? '<span class="label bg-green">Activado</span>'
          : '<span class="label bg-red">Desactivado</span>'
      );
    }
    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData" => $data
    );
    echo json_encode($results);
    break;
  case 'verificar':
    $logina = $_POST['logina'];
    $clavea = $_POST['clavea'];
    $clavehash = hash("SHA256", $clavea);
    $rspta = $usuario->verificar($logina, $clavehash);
    $fetch = $rspta->fetch_object();
    if (isset($fetch)) {
      $_SESSION['idusuario'] = $fetch->idusuario;
      $_SESSION['nombre'] = $fetch->nombre;
      $_SESSION['apellidos'] = $fetch->apellidos;
      $_SESSION['pais'] = $fetch->pais;
      $_SESSION['ciudad'] = $fetch->ciudad;
      $_SESSION['codigo_postal'] = $fetch->codigo_postal;
      $_SESSION['telefono'] = $fetch->telefono;
      $_SESSION['email'] = $fetch->email;
      $_SESSION['direccion'] = $fetch->direccion;
      $_SESSION['imagen'] = $fetch->imagen;
      $_SESSION['login'] = $fetch->login;
      $_SESSION['cargo'] = $fetch->cargo;
    }
    echo json_encode($fetch);
    break;
  case 'salir':
    session_unset();
    session_destroy();
    header("Location: ../views/index.php");
    break;
  default:
    echo "statuscode 404";
    break;
}