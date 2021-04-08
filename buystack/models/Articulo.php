<?php

require '../config/connection.php';

class Articulo
{

  public function __construct() {}

  public function insertar($idCategoria, $codigo, $nombre, $stock, $descripcion, $imagen, $precio)
  {
    $sql = "INSERT INTO articulo (idcategoria,codigo,nombre,stock,descripcion,imagen,condicion,precio) VALUES ('$idCategoria', '$codigo', '$nombre', '$stock', '$descripcion', '$imagen', '1', '$precio')";
    return ejecutarConsulta($sql);
  }

  public function editar($idArticulo, $idCategoria, $codigo, $nombre, $stock, $descripcion, $imagen, $precio)
  {
    $sql = "UPDATE articulo SET idcategoria='$idCategoria',codigo='$codigo',nombre='$nombre',stock='$stock',descripcion='$descripcion',imagen='$imagen',precio='$precio' WHERE idarticulo='$idArticulo'";
    return ejecutarConsulta($sql);
  }

  public function activar($idArticulo)
  {
    $sql = "UPDATE articulo SET condicion='1' WHERE idarticulo='$idArticulo'";
    return ejecutarConsulta($sql);
  }

  public function desactivar($idArticulo)
  {
    $sql = "UPDATE articulo SET condicion='0' WHERE idarticulo='$idArticulo'";
    return ejecutarConsulta($sql);
  }

  public function mostrar($idArticulo)
  {
    $sql = "SELECT * FROM articulo WHERE idarticulo='$idArticulo'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function getNombre($idArticulo)
  {
    $sql = "SELECT nombre FROM articulo WHERE idarticulo='$idArticulo'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function getStock($idArticulo)
  {
    $sql = "SELECT stock FROM articulo WHERE idarticulo='$idArticulo'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function updateStock($idArticulo, $quantity)
  {
    $sql = "UPDATE articulo SET stock='$quantity' WHERE idarticulo='$idArticulo'";
    ejecutarConsulta($sql);
  }

  public function listar()
  {
    $sql = "SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,a.descripcion,a.imagen,a.condicion,a.precio FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria";
    return ejecutarConsulta($sql);
  }
}