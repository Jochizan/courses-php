<?php
require_once "../models/Articulo.php";
require_once "../models/Categoria.php";

if (isset($_GET['categoria'])) {
  $categoria = $_GET['categoria'];
  if ($categoria == '') {
    echo json_encode(['statuscode' => 400, 'response' => 'No existe esa categoria']);
  } else {
    $productos = new Categoria();
    $items = $productos->mostrar($categoria);
    echo json_encode(['statuscode' => 200, 'items' => $items]);
  }
} else if (isset($_GET['get-item'])) {
  $id = $_GET['get-item'];
  if ($id == '') {
    echo json_encode(['statuscode' => 400, 'response' => 'No hay valor para id']);
  } else {
    $productos = new Articulo();
    $item = $productos->mostrar($id);
    echo json_encode(['statuscode' => 200, 'item' => $item]);
  }
} else {
  echo json_encode(['statuscode' => 400, 'response' => 'No hay acción']);
}