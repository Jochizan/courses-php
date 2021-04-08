<?php
	$edad = 18;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1><?php echo
	($edad < 18) 
		? "Eres menor de edad no puedes pasar" 
		: "Bienvenido";
	?>
	</h1>
</body>
</html>
