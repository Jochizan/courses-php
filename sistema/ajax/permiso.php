<?php
require_once "../models/Permiso.php";
$permiso = new Permiso();
$idPermiso = isset($_POST["idpermiso"]) ? limpiarCadena($_POST["idpermiso"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if (empty($idPermiso)) {
      $rspta = $permiso->insertar($nombre);
      echo $rspta
        ? "Permiso registrado"
        : "Permiso no se pudo registrar";
    } else {
      $rspta = $permiso->editar($idPermiso, $nombre);
      echo $rspta
        ? "Permiso actualizada"
        : "Permiso no se pudo actualizar";
    }
    break;
  case 'mostrar':
    $rspta = $permiso->mostrar($idPermiso);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $permiso->listar();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $data[] = array(
        '0' => $reg->nombre,
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
