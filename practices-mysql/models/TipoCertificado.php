<?php

require_once "../config/connection.php";

class TipoCertificado
{
  public function __construct()
  {
  }

  public function insertar($tipoDescripcion)
  {
    $sql = "INSERT INTO tipocertificado (tipodescripcion) VALUES ('$tipoDescripcion')";
    return ejecutarConsulta($sql);
  }

  public function editar($tipoDescripcion, $tipoCertificado)
  {
    $sql = "UPDATE tipocertificado SET tipodescripcion='$tipoDescripcion' WHERE tipocertificado='$tipoCertificado'";
    return ejecutarConsulta($sql);
  }

  public function mostrar($tipoCertificado)
  {
    $sql = "SELECT * FROM tipocertificado WHERE tipocertificado='$tipoCertificado'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function getTipoDescripcion($tipoCertificado)
  {
    $sql = "SELECT tipodescripcion FROM tipocertificado WHERE tipocertificado='$tipoCertificado'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM tipocertificado";
    return ejecutarConsulta($sql);
  }
}