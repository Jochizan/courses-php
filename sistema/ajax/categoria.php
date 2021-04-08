<?php
require_once "../models/Categoria.php";
$categoria = new Categoria();
$idCategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$direccion = isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if (empty($idCategoria)) {
      $rspta = $categoria->insertar($nombre, $descripcion);
      echo $rspta
        ? "Categoria registrada"
        : "La categoria no se pudo registrar";
    } else {
      $rspta = $categoria->editar($idCategoria, $nombre, $descripcion);
      echo $rspta
        ? "Categoria actualizada"
        : "La categoria no se pudo actualizar";
    }
    break;
  case 'activar':
    $rspta = $categoria->activar($idCategoria);
    echo $rspta
      ? "Categoria activada"
      : "Categoria no se pudo activar";
    break;
  case 'desactivar':
    $rspta = $categoria->desactivar($idCategoria);
    echo $rspta
      ? "Categoria desactivada"
      : "Categoria no se pudo desactivar";
    break;
  case 'mostrar':
    $rspta = $categoria->mostrar($idCategoria);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $categoria->listar();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $data[] = array(
        "0" => ($reg->condicion)
          ? '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcategoria . ')">
              <i class="fa fa-pencil"></i>
             </button>' .
          '<button class="btn btn-danger" onclick="desactivar(' . $reg->idcategoria . ')">
              <i class="fa fa-close"></i>
             </button>'
          : '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcategoria . ')">
              <i class="fa fa-pencil"></i>
             </button>' .
          '<button class="btn btn-primary" onclick="activar(' . $reg->idcategoria . ')">
             <i class="fa fa-check"></i>
             </button>',
        "1" => $reg->nombre,
        "2" => $reg->descripcion,
        "3" => ($reg->condicion)
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
}