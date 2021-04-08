<?php
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$telefono = $_POST['telefono'];
$consulta = $_POST['consulta'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Envio</title>
</head>
<body>
	<table style="background: #3EC1E3; color: #FCEFEF;" border="2", width="320" align="center">
		<tr>
			<td>Apellido:
			<td><?php echo "$apellido" ;?></td>
			<tr></tr>
			<td>Nombre:
			<td><?php echo "$nombre" ;?></td>
			<tr></tr>
			<td>Correo:
			<td><?php echo "$correo" ;?></td>
			<tr></tr>
			<td>Asunto:
			<td><?php echo "$asunto" ;?></td>
			<tr></tr>
			<td>Telefono:
			<td><?php echo "$telefono" ;?></td>
			<tr></tr>
			<td>Consulta:
			<td><?php echo "$consulta" ;?></td>
		</tr>
	</table>
</body>
</html>
