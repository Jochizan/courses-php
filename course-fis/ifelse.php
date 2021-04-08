<?php
$edad = 20;
if (isset($edad)) {
	$edad = $edad;
} else {
	$edad = 'El usuario no establecio su edad';
}
echo 'Edad: ' . $edad;
?>
