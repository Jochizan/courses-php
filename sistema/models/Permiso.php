<?php
require '../config/connection.php';

class Permiso {

  public function __construct(){}

  public function insertar($nombre) {
    $sql ="INSERT INTO permiso(nombre) VALUES ('$nombre')";
    return ejecutarConsulta($sql);
  }
  public function editar($idPermiso, $nombre) {
    $sql = "UPDATE permiso SET nombre='$nombre', WHERE idpermiso='$idPermiso'";
    return ejecutarConsulta($sql);
  }
  public function mostrar($idPermiso) {
    $sql = "SELECT * FROM permiso WHERE idpermiso='$idPermiso'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function listar() {
    $sql = "SELECT * FROM permiso";
    return ejecutarConsulta($sql);
  }

}