<?php

require "../config/connection.php";

class Usuario
{
  public function __construct()
  {
  }

  public function insertar($nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen)
  {
    $sql = "INSERT INTO usuario (nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,condicion,imagen) VALUES ('$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','1','$imagen')";
    return ejecutarConsulta($sql);
  }

  public function editar($idUsuario, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen)
  {
    $sql = "UPDATE usuario SET nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email',cargo='$cargo',login='$login',clave='$clave',imagen='$imagen' WHERE idusuario='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function activar($idUsuario)
  {
    $sql = "UPDATE usuario SET condicion='1' WHERE idusuario='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function desactivar($idUsuario)
  {
    $sql = "UPDATE usuario SET condicion='0' WHERE idusuario='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function mostrar($idUsuario)
  {
    $sql = "SELECT * FROM usuario WHERE idusuario='$idUsuario'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM usuario";
    return ejecutarConsulta($sql);
  }

  public function listarmarcados($idUsuario)
  {
    $sql = "SELECT * FROM usuario_permiso WHERE idusuario='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function verificar($login, $clave)
  {
    $sql = "SELECT idusuario,nombre,tipo_documento,num_documento,telefono,email,cargo,imagen,login FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'";
    return ejecutarConsulta($sql);
  }
}