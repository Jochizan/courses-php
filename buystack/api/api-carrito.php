<?php
require_once "Carrito.php";

if (isset($_GET['action'])) {
  $accion = $_GET['action'];
  $carrito = new Carrito();
  switch ($accion) {
    case 'venta':
      infoCarrito($carrito);
      break;
    case 'mostrar':
      mostrar($carrito);
      break;
    case 'listarCarrito':
      listarCarrito($carrito);
      break;
    case 'add':
      add($carrito);
      break;
    case 'remove':
      remove($carrito);
      break;
    case 'addTheNumber':
      addTheNumber($carrito);
      break;
    case 'removeTheNumber':
      removeTheNumber($carrito);
      break;
    case 'emptyCar':
      emptyCarrito($carrito);
      break;
    default:
      echo "statuscode 404";
      break;
  }
} else {
  echo json_encode(['statuscode' => 404, 'response' => 'NO se puede procesar la solicitud']);
}

function infoCarrito($carrito)
{
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
  $results = array(
    'info' => ['count' => $totalItems, 'total' => $total],
    'items' => $fullItems
  );
  echo json_encode($results);
}

function listarCarrito($carrito)
{
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
      "0" => '<img src="../img/articulos/' . $itemProducto['imagen'] . '" height="40px" width="50px" style="max-width: 100%; max-height: auto;">',
      "1" => $itemProducto['nombre'],
      "2" => $itemProducto['descripcion'],
      "3" => 'S/. ' . round($itemProducto['precio'], 2),
      "4" => $itemProducto['cantidad'] . '&nbsp; &nbsp; &nbsp;' .
        '<button class="btn btn-warning" onclick="removeCar(' . $itemProducto['idarticulo'] . ')"><i class="fa fa-arrow-down"></i></button>' .
        '<button class="btn btn-warning" onclick="addCar(' . $itemProducto['idarticulo'] . ')"><i class="fa fa-arrow-up"></i></button>',
      "5" => 'S/. ' . round($itemProducto['subtotal'], 2)
    );
  }
  $results = array(
    "sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data
  );
  echo json_encode($results);
}

function mostrar($carrito)
{
  $itemsCarrito = json_decode($carrito->load(), 1);
  $fullItems = [];
  $total = 0;
  $totalItems = 0;
  $DOM = array();
  $i = 0;
  $DOMcarrito = array();
  if (!empty($itemsCarrito)) {
    foreach ($itemsCarrito as $itemCarrito) {
      $httpRequest = file_get_contents('http://localhost/cursoPHP/BuyStack/api/api-productos.php?get-item=' . $itemCarrito['id']);
      $itemProducto = json_decode($httpRequest, 1)['item'];
      $itemProducto['cantidad'] = $itemCarrito['cantidad'];
      $itemProducto['subtotal'] = $itemProducto['cantidad'] * $itemProducto['precio'];
      $total += $itemProducto['subtotal'];
      $total = round($total, 2);
      $totalItems += $itemProducto['cantidad'];
      array_push($fullItems, $itemProducto);
    }
    foreach ($fullItems as $itemDOM) {
      $DOM[$i] = '<div class="order-col">
                  <div>x' . $itemDOM['cantidad'] . ' ' . $itemDOM['nombre'] . '</div>
                  <div>S/. ' . round($itemDOM['subtotal'], 1) . '</div>
                </div>';
      $DOMcarrito[$i] = '<div class="product-widget">
                          <div class="product-img">
                            <img src="../img/articulos/' . $itemDOM['imagen'] . '" alt="">
                          </div>
                          <div class="product-body">
                            <h3 class="product-name"><a href="#">' . $itemDOM['nombre'] . '</a></h3>
                            <h4 class="product-price"><span class="qty">x' . $itemDOM['cantidad'] . '</span>' . $itemDOM['precio'] . '</h4>
                          </div>
                            <button class="delete" onclick="removeCar(' . $itemDOM['idarticulo'] . ')"><i class="fa fa-close"></i></button>
                          </div>
                        </div>';
      $i++;
    }
  }
  $resArray = array(
    'info' => ['count' => $totalItems, 'total' => $total],
    'items' => $fullItems,
    'DOM' => $DOM,
    'DOMheader' => $DOMcarrito
  );
  echo json_encode($resArray);
}

function add($carrito)
{
  if (isset($_GET['id'])) {
    $res = $carrito->add($_GET['id']);
    echo $res
      ? "Se pudo agregar al carrito el producto querido."
      : "NO se pudo agregar al carrito el producto querido.";
  } else {
    echo json_encode(['statuscode' => 404, 'response' => 'NO se puede procesar la solicitud, id vació']);
  }
}

function remove($carrito)
{
  if (isset($_GET['id'])) {
    $res = $carrito->remove($_GET['id']);
    echo $res
      ? "Se pudo quitar del carrito el producto."
      : "NO se pudo quitar del carrito el producto.";
  } else {
    echo json_encode(['statuscode' => 404, 'response' => 'NO se puede procesar la solicitud, id vació']);
  }
}

function addTheNumber($carrito)
{
  if (isset($_GET['id']) && isset($_GET['cantidad'])) {
    $cantidad = $_GET['cantidad'];
    $res = $carrito->addTheNumber($_GET['id'], $_GET['cantidad']);
    echo $res
      ? "Se pudo agregar al carrito $cantidad del producto querido."
      : "NO se pudo agregar al carrito $cantidad del producto querido.";
  } else {
    echo json_encode(['statuscode' => 404, 'response' => 'NO se puede procesar la solicitud, id vació']);
  }
}

function removeTheNumber($carrito)
{
  if (isset($_GET['id']) && isset($_GET['cantidad'])) {
    $cantidad = $_GET['cantidad'];
    $res = $carrito->removeTheNumber($_GET['id'], $_GET['cantidad']);
    echo $res
      ? "Se pudo quitar del carrito $cantidad del producto."
      : "NO se pudo quitar del carrito $cantidad del producto.";
  } else {
    echo json_encode(['statuscode' => 404, 'response' => 'NO se puede procesar la solicitud, id vació']);
  }
}

function emptyCarrito($carrito)
{
  $rspta = $carrito->emptyCarrito();
  echo $rspta == null
    ? "Se limpio el carrito"
    : "NO se pudo limpiar el carrito";
}

