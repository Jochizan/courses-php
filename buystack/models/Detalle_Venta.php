<?php

require "../config/connection.php";

class Detalle_Venta
{
  function __construct() {}

  function insertar($idVenta, $idArticulo, $cantidad, $precio_venta)
  {
    $sql = "INSERT INTO detalle_venta (idventa,idarticulo,cantidad,precio_venta) VALUES ('$idVenta', '$idArticulo', '$cantidad', '$precio_venta')";
    return ejecutarConsulta($sql);
  }

  function mostrar($idDetalle_Venta)
  {
    $sql = "SELECT * FROM detalle_venta WHERE iddetalle_venta='$idDetalle_Venta'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM detalle_venta";
    return ejecutarConsulta($sql);
  }

  public function listarv()
  {
    $sql = "SELECT a.iddetalle_venta,a.idventa,c.tipo_comprobante,c.serie_comprobante,c.num_comprobante,c.fecha_hora,c.impuesto,c.total_compra as venta,a.cantidad,a.precio_venta FROM detalle_venta a INNER JOIN venta c ON a.idventa=c.idventa";
    return ejecutarConsulta($sql);
  }

  public function listara()
  {
    $sql = "SELECT a.iddetalle_venta,a.idarticulo,tipo_comprobante,c.serie_comprobante,c.num_comprobante,c.fecha_hora,c.impuesto,c.total_compra as articulo,a.cantidad,a.precio_venta FROM detalle_venta a INNER JOIN articulo c ON a.idarticulo=c.idarticulo";
    return ejecutarConsulta($sql);
  }
}