<?php

require "../config/connection.php";

class Venta
{
  function __construct() {}

  function insertar($idUsuario, $clavetransaccion, $paypaldatos, $fecha_hora, $total_compra, $condicion)
  {
    $sql = "INSERT INTO venta (idusuario,clavetransaccion,paypaldatos,fecha_hora,total_compra,condicion) VALUES ('$idUsuario', '$clavetransaccion', '$paypaldatos', '$fecha_hora', '$total_compra', '$condicion')";
    return ejecutarConsulta($sql);
  }

  function editarPaypal($idVenta, $paypaldatos, $condicion)
  {
    $sql = "UPDATE venta SET paypaldatos='$paypaldatos',condicion='$condicion' WHERE idventa='$idVenta'";
    return ejecutarConsulta($sql);
  }

  public function mostrar($idVenta)
  {
    $sql = "SELECT * FROM venta WHERE idventa='$idVenta'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function getId($fecha_hora)
  {
    $sql = "SELECT idventa FROM venta WHERE fecha_hora='$fecha_hora'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function getRecentId()
  {
    $sql = "SELECT idventa,fecha_hora,idusuario,clavetransaccion,total_compra FROM venta ORDER BY idventa DESC limit 1;";
    return ejecutarConsulta($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM venta";
    return ejecutarConsulta($sql);
  }

  public function listara()
  {
    $sql = "SELECT a.idventa,a.idusuario,c.nombre,c.apellidos,c.direccion,c.telefono,c.pais,c.codigo_postal,c.ciudad as usuario,a.fecha_hora,a.total_compra,a.paypaldatos,a.clavetransaccion,a.condicion FROM venta a INNER JOIN usuario c ON a.idusuario=c.idusuario";
    return ejecutarConsulta($sql);
  }
}