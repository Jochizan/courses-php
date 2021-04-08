<?php

require_once "../models/Venta.php";
require_once "../models/Usuario.php";
require_once "../models/Articulo.php";
require_once "../models/Detalle_Venta.php";
require_once "../api/Carrito.php";

$venta = new Venta();
$idVenta = isset($_POST["idventa"]) ? limpiarCadena($_POST["idventa"]) : "";
$clavetransaccion = isset($_POST["clavetransaccion"]) ? limpiarCadena($_POST["clavetransaccion"]) : "";
$paypaldatos = isset($_POST["paypaldatos"]) ? limpiarCadena($_POST["paypaldatos"]) : "";
$condicion = isset($_POST["condicion"]) ? limpiarCadena($_POST["condicion"]) : "";

switch ($_GET["op"]) {
  case 'newVenta':
    if (empty($idVenta)) {
      $usuario = new Usuario();
      $carrito = new Carrito();
      $articulo = new Articulo();
      $detalle_venta = new Detalle_Venta();
      $itemsCarrito = json_decode($carrito->load(), 1);
      $fullItems = [];
      $total = 0;
      $totalItems = 0;
      $data = [];
      foreach ($itemsCarrito as $itemCarrito) {
        $httpRequest = file_get_contents('http://localhost/cursoPHP/BuyStack/api/api-productos.php?get-item=' . $itemCarrito['id']);
        $itemProducto = json_decode($httpRequest, 1)['item'];
        $itemProducto['cantidad'] = $itemCarrito['cantidad'];
        $itemProducto['subtotal'] = $itemProducto['cantidad'] * $itemProducto['precio'];
        $total += $itemProducto['subtotal'];
        $totalItems += $itemProducto['cantidad'];
        array_push($fullItems, $itemProducto);
        $data[] = array(
          "0" => $itemProducto['idarticulo'],
          "1" => $itemProducto['cantidad'],
          "2" => round($itemProducto['subtotal'], 2),
        );
      }
      $idUsuario = isset($_SESSION['idusuario']) ? $_SESSION['idusuario'] : "6";
      date_default_timezone_set('America/Lima');
      $fecha_hora = date("Y-m-d H:i:s");
      $total_compra = $total;
      $rspta = $venta->insertar($idUsuario, $clavetransaccion, $paypaldatos, $fecha_hora, $total_compra, $condicion);
      $total = round($total, 2);
      $id = $venta->getId($fecha_hora);
      foreach ($data as $d) {
        $reg = $detalle_venta->insertar($id['idventa'], $d[0], $d[1], $d[2]);
        $cantidadArticulo = $articulo->getStock($d[0])['stock'];
        $cantidadArticulo -= $d[1];
        $articulo->updateStock($d[0], $cantidadArticulo);
      }
      $results = array(
        "infoDetalleVenta" => $data,
        "infoVenta" => [
          'total' => $total,
          'items' => $fullItems,
          'idVenta' => $id['idventa'],
          'date' => $fecha_hora
        ]
      );
      echo json_encode($results);
    }
    break;
  case 'mostrar':
    $rspta = $venta->mostrar($idVenta);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $venta->listar();
    $usuario = new Usuario();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $nombre = $usuario->getNombre($reg->idusuario);
      $data[] = array(
        "0" => $reg->idusuario,
        "1" => $reg->clavetransaccion,
        "2" => $reg->fecha_hora,
        "3" => $reg->total_compra,
        "4" => $reg->condicion
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
