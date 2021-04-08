<?php
require '../config/connection.php';

class Articulo
{

  public function __construct()
  {
  }

  public function insertar($idCategoria, $codigo, $nombre, $stock, $descripcion, $imagen)
  {
    $sql = "INSERT INTO articulo (idcategoria,codigo,nombre,stock,descripcion,imagen,condicion) VALUES ('$idCategoria', '$codigo', '$nombre', '$stock', '$descripcion', '$imagen', '1')";
    return ejecutarConsulta($sql);
  }

  public function editar($idArticulo, $idCategoria, $codigo, $nombre, $stock, $descripcion, $imagen)
  {
    $sql = "UPDATE articulo SET idcategoria='$idCategoria',codigo='$codigo',nombre='$nombre',stock='$stock',descripcion='$descripcion',imagen='$imagen' WHERE idarticulo='$idArticulo'";
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

  public function listar()
  {
    $sql = "SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria";
    return ejecutarConsulta($sql);
  }
}