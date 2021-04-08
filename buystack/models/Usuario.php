<?php

require "../config/connection.php";

class Usuario
{
  public function __construct() {}

  public function insertar($nombre, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $apellidos, $pais, $codigo_postal, $ciudad)
  {
    $sql = "INSERT INTO usuario (nombre,direccion,telefono,email,cargo,login,clave,condicion,imagen,apellidos,pais,codigo_postal,ciudad) VALUES ('$nombre','$direccion','$telefono','$email','$cargo','$login','$clave','1','$imagen', '$apellidos', '$pais', '$codigo_postal', '$ciudad')";
    return ejecutarConsulta($sql);
  }

  public function editar($idUsuario, $nombre, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $apellidos, $pais, $codigo_postal, $ciudad)
  {
    $sql = "UPDATE usuario SET nombre='$nombre',direccion='$direccion',telefono='$telefono',email='$email',cargo='$cargo',login='$login',clave='$clave',imagen='$imagen',apellidos='$apellidos',pais='$pais',codigo_postal='$codigo_postal',ciudad='$ciudad' WHERE idusuario='$idUsuario'";
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

  public function getNombre($idUsuario)
  {
    $sql = "SELECT nombre FROM usuario WHERE idusuario='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function verificar($login, $clave)
  {
    $sql = "SELECT idusuario,nombre,telefono,email,cargo,imagen,login,ciudad,pais,apellidos,codigo_postal,direccion FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'";
    return ejecutarConsulta($sql);
  }
}