<?php

require '../config/connection.php';

class Ingreso
{

  public function __construct() {}

  public function insert($idProveedor=1, $idUsuario=1, $tipo_comprobante, $num_comprobante, $fecha_hora, $impuesto, $total_compra, $estado)
  {
    $sql = "INSERT INTO ingreso (idproveedor,idusuario,tipo_comprobante,num_comprobante,fecha_hora,impuesto,total_compra,estado) VALUES ('$idProveedor', '$idUsuario', '$tipo_comprobante', '$num_comprobante', '$fecha_hora', '$impuesto', '$total_compra', '$estado')";
    return ejecutarConsulta($sql);
  }

  public function editar($idIngreso, $idProveedor, $idUsuario, $tipo_comprobante, $num_comprobante, $fecha_hora, $impuesto, $total_compra, $estado)
  {
    $sql = "UPDATE ingreso SET idProveedor='$idProveedor', idusuario='$idUsuario', tipo_comprobante='$tipo_comprobante',descripcion='$descripcion' WHERE idingreso='$idIngreso'";
    return ejecutarConsulta($sql);
  }

  public function activar($idUsuario)
  {
    $sql = "UPDATE ingreso SET condicion='1' WHERE idcategoria='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function desactivar($idUsuario)
  {
    $sql = "UPDATE ingreso SET condicion='0' WHERE idcategoria='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function mostrar($idIngreso)
  {
    $sql = "SELECT * FROM usuario WHERE idingreso='$idIngreso'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function nombreCategoria($idUsuario)
  {
    $sql = "SELECT nombre FROM ingreso WHERE idcategoria='$idUsuario'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM ingreso";
    return ejecutarConsulta($sql);
  }

  public function select()
  {
    $sql = "SELECT * FROM ingreso WHERE condicion=1";
    return ejecutarConsulta($sql);
  }
}