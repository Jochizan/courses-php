<?php
require_once("cylinder.php");
require_once("circle.php");
$enviado = "";
$errores = "";
$resultados = "";
if (isset($_POST['submit'])) {
	$radio1 = $_POST['radio1'];
	$radio2 = $_POST['radio2'];
	$altura = $_POST['altura'];
	if (!empty($radio1)) {
		if ($radio1 == null) {
			$errores .= '<div class="d-block" align=center><p>Por favor ingrese el radio del c&iacuterculo.</p>';
		} else {
			$circulo = new Circle($radio1);
			$resultados .= '<div class="d-block" align=center><p>El área del círculo es: ' . $circulo->surface() . '</p>';
		}
	} else {
		$errores .= '<div class="d-block" align=center><p>Por favor ingrese el radio del c&iacuterculo.</p>';
	}

	if (!empty($radio2)) {
		if ($radio2 == null) {
			$errores .= "<p>Por favor ingrese el radio del cilindro.</p>";
		}
	} else {
		$errores .= '<p>Por favor ingrese el radio del cilindro.</p>';
	}

	if (!empty($altura)) {
		if ($altura == null) {
			$errores .= "<p>Por ingrese la altura del cilindro.</p></div>";
		} else {
			$cilindro = new Cylinder($radio2, $altura);
			$resultados .= '<p>El área del cilindro es: ' . $cilindro->surface() . '</p></div>';
		}
	} else {
		$errores .= '<p>Por favor ingrese la altura del cilindro.</p></div>';
	}
}

require 'view.php';
if ($errores == "") {
	echo $resultados;
} else {
	echo $errores;
}
?>
