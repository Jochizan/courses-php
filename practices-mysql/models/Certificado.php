<?php

require '../config/connection.php';

class Certificado
{

  public function __construct()
  {
  }

  public function insertar($certificado, $dni, $evento, $anio, $registro, $tipoCertificado)
  {
    $sql = "INSERT INTO certificado (certificado,dni,evento,anio,registro,tipocertificado) VALUES ('$certificado','$dni','$evento','$anio','$registro','$tipoCertificado')";
    return ejecutarConsulta($sql);
  }

  public function mostrar($certificado)
  {
    $sql = "SELECT * FROM certificado WHERE certificado='$certificado'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM certificado";
    return ejecutarConsulta($sql);
  }
}