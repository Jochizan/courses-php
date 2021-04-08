<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<title>Surfaces</title>
	</head>
	<body>
		<div class="">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<div class="d-block" align=center>
					<h2>Cálculo de área de un Círculo</h2>
					<input type="number" class="form-control w-25" name="radio1" placeholder="Radio: " value="<?php if (!$enviado && isset($radio1)) echo $radio1; ?>">
				</div>
				<br />
				<div class="d-block" align=center>
					<h2>Cálculo de área de un Cilindro</h2>
					<input type="number" class="form-control w-25" name="radio2" placeholder="Radio: " value="<?php if (!$enviado && isset($radio2)) echo $radio2; ?>">
					<input type="number" class="form-control w-25" name="altura" placeholder="Altura: " value="<?php if (!$enviado && isset($altura)) echo $altura; ?>">
				</div>
				<br />
				<div align=center>
					<button type="submit" name="submit" class="btn btn-success">Ingresar</button>
				</div>
			</form>
		</div>
	</body>
</html>
