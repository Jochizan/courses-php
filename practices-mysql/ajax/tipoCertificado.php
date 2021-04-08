<?php

require_once "../models/TipoCertificado.php";

$tipocertificado = new TipoCertificado();
$tipocertificado2 = isset($_POST["tipocertificado"]) ? limpiarCadena($_POST["tipocertificado"]) : "";
$tipodescripcion = isset($_POST["tipodescripcion"]) ? limpiarCadena($_POST["tipodescripcion"]) : "";

switch ($_GET["op"]) {
  case 'create':
    if (empty($tipocertificado2)) {
      $rspta = $tipocertificado->insertar($tipodescripcion);
      echo $rspta
        ? "Certificado se pudo crear"
        : "Certificado no se pudo crear";
    } else {
      $rspta = $tipocertificado->editar($tipocertificado2, $tipodescripcion);
      echo $rspta
        ? "El Certificado se pudo actualiar"
        : "El certificado no se pudo actualizar";
    }
    break;
  case 'mostrar':
    $rspta = $tipocertificado->mostrar($tipocertificado2);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $tipocertificado->listar();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $tipo = $tipocertificado->getTipoDescripcion($reg->tipocertificado);
      $data[] = array(
        "0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->tipocertificado . ')">
                <i class="fa fa-pencil"></i>
              </button>',
        "1" => $reg->tipocertificado,
        "2" => $reg->tipodescripcion
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
  default:
    echo 'statuscode 404';
    break;
}
