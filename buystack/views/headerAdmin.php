<?php
if (strlen(session_id()) < 1) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buystack Ventas</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dataTables/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dataTables/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
  </head>
  <body style="background-color: #E4E7ED;" class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper" style="overflow: visible;">
      <header class="main-header" style="overflow: visible;">
        <a href="#" class="logo">
          <span class="logo-mini"><b>BuyStack</b>...</span>
          <span class="logo-lg"><b>BuyStack</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation" style="overflow: visible;">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <div class="navbar-custom-menu" style="overflow: visible;">
            <ul class="nav navbar-nav" style="overflow: visible;">
              <li class="dropdown user user-menu" style="overflow: visible;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="overflow: visible;">
                  <img
                    src="../img/usuarios/<?php echo isset($_SESSION['imagen']) ? $_SESSION['imagen'] : "default.png"; ?>"
                    class="user-image" alt="User Image">
                  <span
                    class="hidden-xs"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "User"; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img
                      src="../img/usuarios/<?php echo isset($_SESSION['imagen']) ? $_SESSION['imagen'] : "default.png"; ?>"
                      class="img-circle" alt="User Image">
                    <p style="color: black;">
                      Desarollo de Software
                      <small>Joan Roca Hormaza</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="" align="center">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat" style="color: black;">Cerrar
                        Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li>
              <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Escritorio</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="articulo.php"><i class="fa fa-circle-o"></i> Artículos</a></li>
                <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Categorías</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="venta.php"><i class="fa fa-circle-o"></i> Ventas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Consulta Ventas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultaVentas.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
          </ul>
        </section>
      </aside>
    </div>
