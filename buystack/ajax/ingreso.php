<?php
require_once "../models/Ingreso.php";

$ingreso = new Ingreso();
$idIngreso = $_POST['idingreso'] ? limpiarCadena($_POST['idingreso']) : "";
$idProveedor = $_POST['idproveedor'] ? limpiarCadena($_POST['idproveedor']) : "";
$tipo_comprobante = $_POST['tipo_comprobante'] ? limpiarCadena($_POST['tipo_comprobante']) : "";
$num_comprobante = $_POST['num_comprobante'] ? limpiarCadena($_POST['num_comprobante']) : "";
$total_compra = $_POST['total_compra'] ? limpiarCadena($_POST['total_compra']) : "";
$fecha_hora = $_POST['fecha_hora'] ? limpiarCadena($_POST['fecha_hora']) : "";
$idUsuario = $_POST['idusuario'] ? limpiarCadena($_POST['idusuario']) : "";
$impuesto = $_POST['impuesto'] ? limpiarCadena($_POST['impuesto']) : "";
$estado = $_POST['estado'] ? limpiarCadena($_POST['estado']) : "";

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if (empty($idIngreso)) {
      $rspta = $ingreso->insert($idProveedor, $idUsuario, $tipo_comprobante, $num_comprobante, $fecha_hora, $impuesto, $total_compra, $estado);
      echo $rspta
        ? "Compra realizada"
        : "Compra no se pudo realizar";
    } else {
      $rspta = $ingreso->editar($idIngreso, $idProveedor, $idUsuario, $tipo_comprobante, $num_comprobante, $fecha_hora, $impuesto, $total_compra, $estado);
      echo $rspta
        ? "Compra realizada"
        : "Compra no se pudo actualizar";
    }
    break;
  case 'mostrar':
    $rspta = $ingreso->mostrar($idIngreso);
    echo json_encode($rspta);
    break;
}
