<!DOCTYPE html>
<html>
  <head>
    <title>Pagination</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald:400,300,700">
    <link rel="stylesheet" type="text/css" href="estilos.css">
  </head>
  <body>
    <div class="contenedor">
      <h1>Articulos</h1>
      <section class="articulos">
        <ul>
          <?php foreach ($articulos as $articulo): ?>
            <li><?php echo $articulo['id'] . '.-' . $articulo['articulo'] ?></li>
          <?php endforeach; ?>
        </ul>
      </section>
      <section class="paginacion">
        <ul>
          <?php if ($pagina == 1): ?>
            <li class="disabled">&laquo;</li>
          <?php else: ?>
            <li><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
          <?php endif; ?>
          <?php
          for ($i = 1; $i <= $numeroPaginas; $i++) {
            if ($pagina == $i) {
              echo " <li class='active'><a href='?pagina=$i'>$i</a></li>";
            } else {
              echo " <li><a href='?pagina=$i'>$i</a></li>";
            }
          }
          ?>
          <?php if ($pagina == $numeroPaginas): ?>
            <li class="disabled">&raquo;</li>
          <?php else: ?>
            <li><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
          <?php endif; ?>
        </ul>
      </section>
    </div>
  </body>
</html>