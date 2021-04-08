<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Formulario de contactos</title>
		<link rel="stylesheet" href="estilos.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	</head>
	<body>
		<div class="d-flex justify-content-center">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre:" value="<?php if (!$enviado && isset($nombre)) echo $nombre ?>">
				<input type="text" class="form-control" name="correo" id="correo" placeholder="Correo:" value="<?php if (!$enviado && isset($correo)) echo $correo ?>">
				<textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje"><?php if (!$enviado && isset($mensaje)) echo $mensaje ?></textarea>
				<?php if (!empty($errores)): ?>
				<div class="alert error" role="alert">
					<?php echo $errores; ?>
				</div>
				<div class="alert success" role="alert">
					<?php echo $mensajeCoro; ?>
				</div>
				<?php endif;?>
				<input type="submit" name="submit" class="btn btn-primary" value="Enviar Correo">
			</form>
		</div>
	</body>
</html>
