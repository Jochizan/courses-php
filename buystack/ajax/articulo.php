<?php
require_once "../models/Articulo.php";
require_once "../models/Categoria.php";

$articulo = new Articulo();
$idArticulo = isset($_POST["idarticulo"]) ? limpiarCadena($_POST["idarticulo"]) : "";
$idCategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$imagen = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";
$codigo = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$precio = isset($_POST["precio"]) ? limpiarCadena($_POST["precio"]) : "";
$stock = isset($_POST["stock"]) ? limpiarCadena($_POST["stock"]) : "";

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if (!file_exists($_FILES["imagen"]["tmp_name"]) || !is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
      $imagen = $_POST["imagenactual"];
    } else {
      $ext = explode(".", $_FILES["imagen"]["name"]);
      if ($_FILES["imagen"]["type"] == "image/jpg" || $_FILES["imagen"]["type"] == "image/jpeg" || $_FILES["imagen"]["tpye"] == "image/png") {
        $imagen = round(microtime(true)) . '.' . end($ext);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/articulos/" . $imagen);
      }
    }
    if (empty($idArticulo)) {
      $rspta = $articulo->insertar($idCategoria, $codigo, $nombre, $stock, $descripcion, $imagen, $precio);
      echo $rspta
        ? "Articulo registrado"
        : "Articulo no se pudo registrar";
    } else {
      $rspta = $articulo->editar($idArticulo, $idCategoria, $codigo, $nombre, $stock, $descripcion, $imagen, $precio);
      echo $rspta
        ? "Articulo actualizado"
        : "Articulo no se pudo actualizar";
    }
    break;
  case 'desactivar':
    $rspta = $articulo->desactivar($idArticulo);
    echo $rspta
      ? "Articulo desactivado"
      : "Articulo no se pudo desactivar";
    break;
  case 'activar':
    $rspta = $articulo->activar($idArticulo);
    echo $rspta
      ? "Articulo activado"
      : "Articulo no se pudo activar";
    break;
  case 'mostrar':
    $rspta = $articulo->mostrar($idArticulo);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $articulo->listar();
    $categoria = new Categoria();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      if ($reg->condicion == 0) {
        continue;
      }
      $id = $reg->idcategoria;
      $name = $categoria->nombreCategoria($id);
      $data[] = array(
        "0" => '<div class="col-md-4 col-xs-6">
              <div class="product">
                <div class="product-img">
                  <img src="../img/articulos/' . $reg->imagen . '" alt="" width="100px" height="250px">
                </div>
                <div class="product-body">
                  <p class="product-category">' . $name['nombre'] . '</p>
                  <h3 class="product-name"><a href="#">' . $reg->nombre . '</a></h3>
                  <h4 class="product-price"> ' . $reg->precio . '
                    <del class="product-old-price">' . $reg->precio * 1.2 . '</del>
                  </h4>
                  <div class="product-rating">
                  </div>
                  <div class="product-btns">
                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i>
                    <span class="tooltipp">Añadir a deseos</span></button>
                    <button class="add-to-compare"><i class="fa fa-exchange"></i>
                    <span class="tooltipp">Añadir y Comparar</span></button>
                    <button class="quick-view"><i class="fa fa-eye"></i>
                    <span class="tooltipp">Vista Rápida</span>
                    </button>
                  </div>
                </div>
                <div class="add-to-cart">
                  <button class="add-to-cart-btn" onclick="addCarOne( ' . $reg->idarticulo . ')">
                  <i class="fa fa-shopping-cart"></i> Añadir al Carro
                  </button>
                </div>
              </div>
            </div>
            <div class="clearfix visible-sm visible-xs"></div>'
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

  case 'listarIndex':
    $rspta = $articulo->listar();
    $categoria = new Categoria();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      if ($reg->condicion == 0) {
        continue;
      }
      $id = $reg->idcategoria;
      $name = $categoria->nombreCategoria($id);
      $data[] = array(
        "0" => '
<div class="col-md-4 col-xs-6">
<div class="product">
                    <div class="product-img">
                      <img src="../img/articulos/' . $reg->imagen . '" class="img-responsive" alt="">
                    </div>
                    <div class="product-body">
                      <p class="product-category">' . $name['nombre'] . '</p>
                      <h3 class="product-name"><a href="#">' . $reg->nombre . '</a></h3>
                      <h4 class="product-price"> ' . $reg->precio . '
                        <del class="product-old-price">' . $reg->precio * rand(1, 5) . '</del>
                      </h4>
                      <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                      <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">añadir a deseos</span>
                        </button>
                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">añadir para comparar</span>
                        </button>
                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                        </button>
                      </div>
                    </div>
                    <div class="add-to-cart">
                      <button class="add-to-cart-btn" onclick="addCarOne(' . $reg->idarticulo . ')">
                      <i class="fa fa-shopping-cart"></i> añadir al carro
                      </button>
                    </div>
                  </div>
                  </div>
                   <div class="clearfix visible-sm visible-xs"></div>'
      );
    }
    $results = array(
      "DOM" => $data
    );
    echo json_encode($results);
    break;
  case 'listarAll':
    $rspta = $articulo->listar();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $data[] = array(
        "0" => ($reg->condicion)
          ? '<button class="btn btn-warning" onclick="mostrar(' . $reg->idarticulo . ')">
              <i class="fa fa-pencil"></i>
            </button>' .
          '<button class="btn btn-danger" onclick="desactivar(' . $reg->idarticulo . ')">
              <i class="fa fa-close"></i>
            </button>'
          : '<button class="btn btn-warning" onclick="mostrar(' . $reg->idarticulo . ')">
              <i class="fa fa-pencil"></i>
            </button>' .
          '<button class="btn btn-primary" onclick="activar(' . $reg->idarticulo . ')">
              <i class="fa fa-check"></i>
            </button>',
        "1" => ($reg->nombre),
        "2" => ($reg->categoria),
        "3" => ($reg->codigo),
        "4" => ($reg->stock),
        "5" => '<img src="../img/articulos/' . $reg->imagen . '" height="50px" width="50px">',
        "6" => ($reg->condicion)
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
  case "selectCategoria":
    require_once "../models/Categoria.php";
    $categoria = new Categoria();
    $rspta = $categoria->select();
    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre . '</option>';
    }
    break;
}