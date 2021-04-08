<?php

require_once "../models/Certificado.php";
require_once "../models/TipoCertificado.php";

$certificado = new Certificado();
$tipocertificado = new TipoCertificado();
$tipoCertificado = isset($_POST["tipocertificado"]) ? limpiarCadena($_POST["tipocertificado"]) : "";
$certificado2 = isset($_POST["certificado"]) ? limpiarCadena($_POST["certificado"]) : "";
$registro = isset($_POST["registro"]) ? limpiarCadena($_POST["registro"]) : "";
$evento = isset($_POST["evento"]) ? limpiarCadena($_POST["evento"]) : "";
$anio = isset($_POST["anio"]) ? limpiarCadena($_POST["anio"]) : "";
$dni = isset($_POST["dni"]) ? limpiarCadena($_POST["dni"]) : "";

switch ($_GET["op"]) {
  case 'create':
      $rspta = $certificado->insertar($certificado2, $dni, $evento, $anio, $registro, $tipoCertificado);
      echo $rspta
        ? "Certificado se pudo crear"
        : "Certificado no se pudo crear";
    break;
  case 'mostrar':
    $rspta = $certificado->mostrar($certificado2);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $certificado->listar();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $tipo = $tipocertificado->getTipoDescripcion($reg->tipocertificado);
      $data[] = array(
        "0" => $reg->certificado,
        "1" => $reg->dni,
        "2" => $reg->evento,
        "3" => $reg->anio,
        "4" => $reg->registro,
        "5" => $tipo['tipodescripcion']
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
  case 'selectTipoCertificado':
    $rspta = $tipocertificado->listar();
    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' . $reg->tipocertificado. '>' . $reg->tipodescripcion . '</option>';
    }
    break;
  default:
    echo 'statuscode 404';
    break;
}

